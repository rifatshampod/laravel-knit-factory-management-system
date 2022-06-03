<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Order;
use App\Models\Production;
use App\Models\Delivery;

class dashboardController extends Controller
{
    function getData(Request $req){
        $orderlist = Order::get();
        $orderCount = $orderlist->count();

        $planlist = Plan::where('status',1)->get();
        $planCount = $planlist->count();

        $productionlist = Production::where('status',1)->get();
        $productionCount = $productionlist->count();

        $deliverylist = Delivery::where('delivery_balance','>',0)->get();
        $deliveryCount = $deliverylist->count();

        $productionlist = Production::join('plans','plans.id','=','productions.plan_id')
                    ->join('orders','orders.id','=','plans.order_id')
                    ->orderBy('productions.id', 'DESC')
                    ->get(['productions.id as id','orders.id as orderId','orders.artwork',
                        'orders.style','orders.order_no','orders.body_color','orders.print_quality',
                        'orders.parts_name','orders.print_color','orders.total_qty','plans.target_perday',
                        'productions.inhand','productions.today_production',
                        'productions.total_production','productions.balance','productions.status as productionStatus']);

        return view('index',['orderCount'=>$orderCount])
        ->with('planCount',$planCount)
        ->with('productionCount',$productionCount)
        ->with('deliveryCount',$deliveryCount)
        ->with('productionlist',$productionlist);
    }
}