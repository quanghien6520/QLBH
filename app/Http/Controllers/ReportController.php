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
        $totalFee = DB::table('totalamount')->sum(DB::raw('price*sellAmount'));
        return response()->json(['buy'=>$totalBuy,'sell'=>$totalSell,'exist'=>$totalExist,'fee'=>number_format($totalFee)]);
    }
}
