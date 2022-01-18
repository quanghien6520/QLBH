<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\goods_type;
use Session;

class GoodsTypeController extends Controller
{
    public function index()
    {
        $datas = goods_type::all();
        return view('pages.type.dashboard')->with('all', $datas);
    }

    public function edit($id)
    {
        $datas = goods_type::find($id);
        return view('pages.type.detail')->with('type',$datas);
    }

    public function create()
    {
        return view('pages.type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $datas = $request->all();
        $type = new goods_type();
        $type->name = $datas['name'];
        $type->save();

        Session::flash('message','UPDATED');
        Session::flash('type','success');
        return redirect()->route('type.index');
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $datas = $request->all();
        $type = goods_type::find($id);
        $type->name = $datas['name'];
        $type->save();
        Session::flash('message','UPDATED');
        Session::flash('type','success');
        return redirect()->route('type.index');
    }

    public function destroy(Request $request,$id)
    {
        
    }

    public function get(Request $request)
    {
        return goods_type::all();
    }
}
