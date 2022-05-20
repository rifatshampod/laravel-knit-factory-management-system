<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Order;

class planController extends Controller
{
    function showData(Request $req){
        $planlist = Plan::join('orders','orders.id'=>'plans.order_id')
                    ->all();

        return view('allOrder',['orderlist'=>$orderlist]);
    }
}