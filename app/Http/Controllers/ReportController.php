<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\goods;
use App\Models\buy;
use App\Models\sell;
use DB;
class ReportController extends Controller
{
    //
    public function index() {
        $year = date('Y');
        $month = date('m');
        $totalBuy = buy::whereYear('created_at',$year)->whereMonth('created_at',$month)->sum('amount');
        $totalSell =  sell::whereYear('created_at',$year)->whereMonth('created_at',$month)->sum('amount');
        $totalExist = DB::table('totalamount')->sum('Amount');
        $totalFee = DB::table('sell')->join('goods','sell.id_goods','=','goods.id')->whereYear('sell.created_at',$year)->whereMonth('sell.created_at',$month)->sum(DB::raw('goods.price*sell.amount'));
        return response()->json(['buy'=>$totalBuy,'sell'=>$totalSell,'exist'=>$totalExist,'fee'=>number_format($totalFee)]);
    }

    public function listBill() {
        //Lay thong tin tu DB show list hoa don
        $buyBill = buy::all()->groupBy('id_bill');
        $sellBill = sell::all()->groupBy(('id_bill'));
        return view('pages.list-bill',[
            'buyBill' => $buyBill,
            'sellBill' => $sellBill,
        ]);
    }

    public function buyBillDetail($id) {
        //lay thong tin san pham mua trong hoa don thong qua id
        $buyBill = buy::where('id_bill',$id)->get();
        return view('pages.bill-detail',[
            'type' => 'buy',
            'detail' => $buyBill
        ]);
    }

    public function sellBillDetail($id) {

        //
        $sellBill = sell::where('id_bill',$id)->get();
        return view('pages.bill-detail',[
            'type' => 'sell',
            'detail' => $sellBill
        ]);
    }
}
