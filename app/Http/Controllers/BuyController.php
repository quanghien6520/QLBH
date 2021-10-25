<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buy;
use App\Models\goods;
use Illuminate\Support\Facades\Redis;

class BuyController extends Controller
{
    public function store(Request $request)
    {
        $datas = $request->all();
        $bill = '0';
        foreach ($datas as $value) {
            $buy = new buy();
            $buy->id_goods = $value['id_goods'];
            $buy->id_user = '1';
            $buy->amount = $value['number'];
            $buy->id_bill = $bill;
            $buy->date_made = $value['dateMade'];
            $buy->save();
        }
        return response()->json([
            'success' => '1'
        ]);
    }

    public function update(Request $request, $id)
    {
        $datas = $request->all();
        $buy = buy::find($id);
        $buy->id_goods = $datas['id_goods'];
        $buy->id_user = $datas['id_user'];
        $buy->amount = $datas['amount'];
        $buy->id_bill = $datas['id_bill'];
        $buy->date_made = $datas['date_made'];
        $buy->save();
        return response()->json([
            'success' => ($buy->save()) ? 1 : 0
        ]);
    }

    public function destroy(Request $request, $id)
    {
    }

    public function get(Request $request)
    {
        $allBuy = buy::all();
        return response()->json([
            'allBuy' => $allBuy
        ]);
    }

    public function search(Request $request)
    {
        $datas = $request->all();
        $item = goods::where('name', 'like', '%' . $datas['search'] . '%')->get();
        $allGoods = [];
        foreach ($item as $goods) {
            $goodsArr = [
                'id' => $item->id,
                'name' => $item->name,
                'subtitle' => $item->unit,
                'price' => number_format($item->price)
            ];
            $allGoods[] = $goodsArr;
        }
        return response()->json([
            'Goods' => $allGoods
        ]);
    }
}
