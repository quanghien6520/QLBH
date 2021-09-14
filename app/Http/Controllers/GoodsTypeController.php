<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\goods_type;

class GoodsTypeController extends Controller
{
    //

    public function store(Request $request)
    {
        $datas = $request->all();
        $type = new goods_type();
        $type->name = $datas['name'];
        $type->save();
        return response()->json([
            'success' => $type->id
        ]);
    }

    public function update(Request $request,$id)
    {
        $datas = $request->all();
        $type = goods_type::find($id);
        $type->name = $datas['name'];
        return response()->json([
            'success' => ($type->save())?1:0
        ]);
    }

    public function destroy(Request $request,$id)
    {
        
    }

    public function get(Request $request)
    {
        $allType = goods_type::all();
        return response()->json([
            'allType' => $allType
        ]);
    }
}
