<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\goods;
use App\Models\sell;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SellController extends Controller
{
    //
    public function store(Request $request) {
        $datas = $request->all();
        $bill = Str::uuid()->toString();
        foreach ($datas['list'] as $value) {
            $sell = new sell();
            $sell->id_goods = $value['id'];
            $sell->id_user = $datas['user'];
            $sell->amount = $value['number'];
            $sell->id_bill = $bill;
            $sell->save();
        }
        return response()->json([
            'success' => '1'
        ]);
    }

    public function get(Request $request) {
        $datas = $request->all();
        $allGoods= DB::table('totalamount')->get();
        $resArray = [];
        foreach($allGoods as $goods) {
            $nestData = [
                'id' => $goods->id,
                'name' => $goods->name,
                'subtitle' => $goods->unit,
                'price' => number_format($goods->price),
                'amount' => $goods->Amount,
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
        $allGoods= DB::table('totalamount')->where('name','like','%'.$datas['search'].'%')->get();
        $resArray = [];
        foreach($allGoods as $goods) {
            $nestData = [
                'id' => $goods->id,
                'name' => $goods->name,
                'subtitle' => $goods->unit,
                'price' => number_format($goods->price),
                'amount' => $goods->Amount
            ];
            $resArray[] = $nestData;
        }
        return response()->json([
            'allGoods' => $resArray
        ]);
    }
}