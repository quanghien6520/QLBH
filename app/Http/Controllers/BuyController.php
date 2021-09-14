<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buy;

class BuyController extends Controller
{
    public function store(Request $request)
    {
        $datas = $request->all();
        $buy = new buy();
        $buy->id_goods = $datas['id_goods'];
        $buy->id_user = $datas['id_user'];
        $buy->amount = $datas['amount'];
        $buy->id_bill = $datas['id_bill'];
        $buy->date_made = $datas['date_made'];
        $buy->save();
        return response()->json([
            'success' => $buy->id
        ]);
    }

    public function update(Request $request,$id)
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
            'success' => ($provider->save())?1:0
        ]);
    }

    public function destroy(Request $request,$id)
    {
        
    }

    public function get(Request $request)
    {
        $allBuy= buy::all();
        return response()->json([
            'allBuy' => $allBuy
        ]);
    }
}
