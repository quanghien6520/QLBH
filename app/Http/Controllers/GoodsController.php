<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\goods;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GoodsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'subtitle' => 'required|string|max:255',
            'period' => 'required|numeric',
            'provider' => 'required|numeric',
        ]);
        $datas = $request->all();
        $goods = new goods();
        $goods->name = $datas['name'];
        $goods->barcode = Str::uuid()->toString();
        $goods->price = $datas['price'];
        $goods->unit = $datas['subtitle'];
        $goods->Image = $datas['image'];
        $goods->period = $datas['period'];
        $goods->provider = $datas['provider'];
        $goods->type = $datas['type'];
        $goods->save();
        return response()->json([
            'success' => $goods->id
        ]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required',
            'subtitle' => 'required|string|max:255',
            'period' => 'required|numeric',
            'provider' => 'required|numeric',
        ]);
        $datas = $request->all();
        $goods = goods::find($id);
        $goods->name = $datas['name'];
        $goods->price = strpos($datas['price'],',') !== false?str_replace(',','',$datas['price']):strpos($datas['price'],',');
        $goods->unit = $datas['subtitle'];
        $goods->Image = $datas['image'];
        $goods->period = $datas['period'];
        $goods->provider = $datas['provider'];
        $goods->type = $datas['type'];
        $goods->save();
        return response()->json([
            'success' => $goods->id
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
                'price' => number_format($goods->price),
                'avatarUrl' => empty($goods->Image)?url('image/default.png'):url($goods->Image)
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
            $Amount= DB::table('totalamount')->where('id',$goods->id)->value('Amount');
            $nestData = [
                'id' => $goods->id,
                'name' => $goods->name,
                'subtitle' => $goods->unit,
                'price' => number_format($goods->price),
                'amount' => $Amount,
                'avatarUrl' => empty($goods->Image)?url('image/default.png'):url($goods->Image)
            ];
            $resArray[] = $nestData;
        }
        return response()->json([
            'allGoods' => $resArray
        ]);
    }

    public function show(Request $request) {
        $datas = $request->all();
        $goods = goods::find($datas['id']);
        $Amount= DB::table('totalamount')->where('id',$goods->id)->value('Amount');
        $nestData = [
            'id' => $goods->id,
            'name' => $goods->name,
            'subtitle' => $goods->unit,
            'price' => number_format($goods->price),
            'amount' => $Amount,
            'period' => (string)$goods->period,
            'image' => empty($goods->Image)?url('image/default.png'):url($goods->Image),
            'type' => $goods->type,
            'provider' => $goods->provider,
        ];
        return $nestData;
    }

    public function test() {
        dd(DB::table('totalamount')->where('id',11)->first());
    }
}
