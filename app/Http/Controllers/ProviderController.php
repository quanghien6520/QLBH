<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\provider;
use Session;

class ProviderController extends Controller
{
    public function index()
    {
        $datas = provider::all();
        return view('pages.provider.dashboard')->with('all',$datas);
    }
    public function edit($id)
    {
        $datas = provider::find($id);
        return view('pages.provider.detail')->with('provider',$datas);
    }
    public function create()
    {
        return view('pages.provider.create');
    }
    public function store(Request $request)
    {
        $datas = $request->all();
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|numeric',
            'email' => 'required|email',
        ]);
        $provider = new provider();
        $provider->name = $datas['name'];
        $provider->phone_number = $datas['phone_number'];
        $provider->email = $datas['email'];
        $provider->save();
        Session::flash('message','SAVED');
        Session::flash('type','success');
        return redirect()->route('provider.index');
    }

    public function update(Request $request,$id)
    {
        $datas = $request->all();
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|numeric',
            'email' => 'required|email',
        ]);
        $provider = provider::find($id);
        $provider->name = $datas['name'];
        $provider->phone_number = $datas['phone_number'];
        $provider->email = $datas['email'];
        $provider->save();
        Session::flash('message','UPDATED');
        Session::flash('type','success');
        return redirect()->route('provider.index');
    }

    public function destroy(Request $request,$id)
    {
        provider::where('id',$id)->delete();
        Session::flash('message','REMOVED');
        Session::flash('type','success');
        return redirect()->route('provider.index');
    }

    public function get(Request $request)
    {
        $allProvider = provider::all();
        return $allProvider;
    }
}
