<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetail;
Use Cart;
use DB;

class BillDetailController extends Controller
{
    public function listbill()
    {
    	$cart = Cart::content();
        $bill = Bill::all();
        return view('backend.listBillDetail', compact('bill'));
    }
}
/*$users = DB::table('orders')
                ->select('department', DB::raw('SUM(price) as total_sales'))
                ->groupBy('department')
                ->havingRaw('SUM(price) > 2500')
                ->get();*/