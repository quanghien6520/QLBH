<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Hash;

class UserController extends Controller
{
	public function get() {
		$allUser = User::all();
		$result = [];
		foreach ($allUser as $user) {
			$nestedData = [
				'id' => $user->id,
				'name' => $user->name,
				'subtitle' => $user->email,
				'avatarUrl' => ''
			];
			$result[] = $nestedData;
		}
		return response()->json([
			'allUser' => $result,
		]);
	}

	public function getToken() {
		return response()->json([ 'token'=> csrf_token()]); 
	}

	public function login(Request $request) {
		$datas = $request->all();
		// if ($datas['email'] == 'admin@gmail.com' && $datas['password'] == '123456') {
		// 	return response()->json([
		// 		'login' => '1'
		// 	]);
		// } else {
		// 	return response()->json([
		// 		'login' => '0'
		// 	]);
		// }
		$validation = Validator::make($request->all(),[ 
			'email' => 'required|email',
			'password' => 'required|string',
		]);
		if($validation->fails()){
			return response()->json([
				'success' => 0,
				'message' => $validation->messages()
			]);
		}
		$credentials = $request->only(['email', 'password']);
		if (!$token = auth()->attempt($credentials)) {
			return response()->json(['error' => 'Unauthorized'], 401);
		}
		$user = $request->user();
		return response()->json([
			'login' => '1'
		]);
	}

	public function store(Request $request) {
		$validation = Validator::make($request->all(),[ 
			'email' => 'required|email|unique:users',
			'name' => 'required|string',
			'ic_no' => 'required|string',
			'is_admin' => 'required',
			'password' => 'required|string',
			'c_password' => 'required|string|same:password',
			'phone_number' => 'required|string|unique:users',
		]);
		if($validation->fails()){
			return response()->json([
				'success' => 0,
				'message' => $validation->messages()
			]);
		}
		$datas = $request->all();
		$user = new User();
		$user->name = $datas['name'];
		$user->email = $datas['email'];
		$user->ic_no = $datas['ic_no'];
		$user->is_admin = $datas['is_admin'];
		$user->password = bcrypt($datas['password']);
		$user->phone_number = $datas['phone_number'];
		$user->save();
		return response()->json([
			'success' => $user->id
		]);
	}

	public function update(Request $request, $id) {
		$validation = Validator::make($request->all(),[
			'email' => 'required|email|unique:users',
			'name' => 'required|string',
			'ic_no' => 'required|digits',
			'is_admin' => 'required',
			'phone_number' => 'required|string|unique:users',

		]);
		if($validation->fails()){
			return response()->json([
				'success' => 0,
				'message' => $validation->messages()
			]);
		}
		$datas = $request->all();
		$user->name = $datas['name'];
		$user->email = $datas['email'];
		$user->ic_no = $datas['ic_no'];
		$user->is_admin = $datas['is_admin'];
		$user->phone_number = $datas['phone_number'];
		$user->save();
		return response()->json([
			'success' => $user->id
		]);
	}

	public function updatePassword(Request $request, $id) {
		$validation = Validator::make($request->all(),[ 
			'current_password' =>'required|string',
			'password' => 'required|string',
			'c_password' => 'required|string|same:password'
		]);
		if($validation->fails()){
			return response()->json([
				'success' => 0,
				'message' => $validation->messages()
			]);
		}
		$datas = $request->all();
		$user = User::find($id);
		$success = 0;
		if (Hash::check($datas['current_password'], $user->password)) {
			$user->password = bcrypt($datas['password']);
			$success = 1;
		}
		$user->save();
		return response()->json([
			'success' => $success
		]);
	}

	public function allowUser(Request $request, $id) {
		$datas = $request->all();
		$user = User::find($id);
		$user->isActive = (isset($datas['allow']) &&  $datas['allow'] == 1)?1:0;
		$user->save();
		return response()->json([
			'success' => $user->id
		]);
	}
}
