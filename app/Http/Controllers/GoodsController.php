<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\goods;

class GoodsController extends Controller
{
    public function store(Request $request)
    {
        $datas = $request->all();
        $goods = new goods();
        $goods->barcode = $datas['barcode'];
        $goods->name = $datas['name'];
        $goods->price = $datas['price'];
        $goods->unit = $datas['unit'];
        $goods->type = $datas['type'];
        $goods->provider = $datas['provider'];
        $goods->period = $datas['period'];
        $goods->save();
        return response()->json([
            'success' => $goods->id
        ]);
    }

    public function update(Request $request,$id)
    {
        $datas = $request->all();
        $goods = goods::find($id);
        $goods->barcode = $datas['barcode'];
        $goods->name = $datas['name'];
        $goods->price = $datas['price'];
        $goods->unit = $datas['unit'];
        $goods->type = $datas['type'];
        $goods->provider = $datas['provider'];
        $goods->period = $datas['period'];
        $goods->save();
        return response()->json([
            'success' => ($provider->save())?1:0
        ]);
    }

    public function destroy(Request $request,$id)
    {
        
    }

    public function get(Request $request)
    {
        $allGoods= goods::all();
        return response()->json([
            'allGoods' => $allGoods
        ]);
    }
}
