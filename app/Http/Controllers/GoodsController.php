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
            'success' => ($goods->save())?1:0
        ]);
    }

    public function destroy(Request $request,$id)
    {
        
    }

    public function get(Request $request)
    {
        $allGoods= goods::all();
        $resArray = [];
        foreach($allGoods as $goods) {
            $nestData = [
                'id' => $goods->id,
                'name' => $goods->name,
                'subtitle' => $goods->unit,
                'price' => number_format($goods->price)
            ];
            $resArray[] = $nestData;
        }
        return response()->json([
            'allGoods' => $resArray
        ]);
    }

    public function getSearch(Request $request) {
        $datas = $request->all();
        $allGoods= goods::where('name','like','%'.$datas['search'].'%')->get();
        $resArray = [];
        foreach($allGoods as $goods) {
            $nestData = [
                'id' => $goods->id,
                'name' => $goods->name,
                'subtitle' => $goods->unit,
                'price' => number_format($goods->price)
            ];
            $resArray[] = $nestData;
        }
        return response()->json([
            'allGoods' => $resArray
        ]);
    }

    public function show(Request $request, $id) {
        $datas = $request->all();
        $goods = goods::find($id);
        $nestData = [
            'id' => $goods->id,
            'name' => $goods->name,
            'subtitle' => $goods->unit,
            'price' => number_format($goods->price)
        ];
        return response()->json([
            'goods' => $nestData
        ]);
    }
}
