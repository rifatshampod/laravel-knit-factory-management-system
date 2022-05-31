<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\Plan;
use App\Models\Receive;
use App\Models\Daily_delivery;

class deliveryController extends Controller
{
    function showData(Request $req){
        $deliverylist = Delivery::join('orders','orders.id','=','deliveries.order_id')
                    ->orderBy('deliveries.id', 'DESC')
                    ->get(['deliveries.id as id','orders.id as orderId',
                        'orders.style','orders.order_no','orders.body_color','orders.total_qty as total_order',
                        'deliveries.first_receive', 'deliveries.today_receive',
                        'deliveries.total_receive','deliveries.receive_balance',
                        'deliveries.today_delivery','deliveries.total_delivery',
                        'deliveries.delivery_balance','deliveries.status',
                        'deliveries.delivery_status']);
                    

        return view('allDelivery',['deliverylist'=>$deliverylist]);
    }

    function editData($id){
        $delivery=Delivery::find($id);
        return response()->json([
            'status'=>200,
            'delivery'=>$delivery,
        ]);
    }

    function editDeliveryData($id){
        $delivery=Delivery::join('productions','productions.order_id','=','deliveries.order_id')
        ->find($id);
        return response()->json([
            'status'=>200,
            'delivery'=>$delivery,
        ]);
    }

    function updateReceiveData(Request $req){
        $delivery_id = $req->input('id');
        $delivery=Delivery::find($delivery_id);
        $delivery->first_receive=$req->input('first_receive');
        $delivery->today_receive= $req->input('today_receive');
        $delivery->total_receive+= $req->input('today_receive');
        $delivery->status=1;
        $delivery->update();

        $receive = new Receive;
        $receive->delivery_id= $req->input('id');
        $receive->receive_today= $req->input('today_receive');
        // $receive->receive_total= $req->input('total_receive');
        // $receive->receive_balance= $req->input('receive_balance');
        $receive->save();



        $plan = new Plan;
        $plan->order_id = $req->input('order_id');
        $plan->status = 0;
        $plan->save();

        return redirect()->back()->with('status','delivery information has been updated');
    }

    function addReceiveData(Request $req){
        $receive = new Receive;
        $receive->delivery_id= $req->input('id');
        $receive->receive_today= $req->input('today_receive');
        $receive->receive_total= $req->input('total_receive');
        $receive->receive_balance= $req->input('receive_balance');
        $receive->save();

        $delivery_id = $req->input('id');
        $delivery=Delivery::find($delivery_id);
        $delivery->today_receive= $req->input('today_receive');
        $delivery->total_receive+= $req->input('today_receive');
        $delivery->update();

        return redirect()->back()->with('status','receive information has been updated');
    }

    function showReceiveData(Request $req){
        $deliverylist = Receive::join('deliveries','deliveries.id','=','receives.delivery_id')
                    ->join('orders','orders.id','=','deliveries.order_id')
                    ->orderBy('receives.id', 'DESC')
                    ->get(['receives.id as id','orders.id as orderId',
                        'orders.style','orders.order_no','orders.body_color',
                        'receives.receive_today','receives.receive_total',
                        'receives.receive_balance','receives.created_at']);
                    

        return view('allReceive',['deliverylist'=>$deliverylist]);
    }

    function addDeliveryData(Request $req){

        $delivery_id = $req->input('id');
        $deliveryTable = Delivery::find($delivery_id);
        $deliveryTable->delivery_today= $req->input('today_delivery');
        $deliveryTable->delivery_total= $req->input('total_delivery');
        $deliveryTable->delivery_balance= $req->input('delivery_balance');
        $deliveryTable->update();



        $delivery = new Daily_delivery;
        $delivery->delivery_id= $req->input('id');
        $delivery->delivery_today= $req->input('today_delivery');
        $delivery->delivery_total+= $req->input('total_delivery');
        $delivery->delivery_balance= $req->input('delivery_balance');
        $delivery->save();



        return redirect()->back()->with('status','delivery information has been updated');
    }

    function showDeliveryData(Request $req){
        $deliverylist = Daily_delivery::join('deliveries','deliveries.id','=','daily_deliveries.delivery_id')
                    ->join('orders','orders.id','=','deliveries.order_id')
                    ->orderBy('daily_deliveries.id', 'DESC')
                    ->get(['daily_deliveries.id as id','orders.id as orderId',
                        'orders.style','orders.order_no','orders.body_color',
                        'daily_deliveries.delivery_today','daily_deliveries.delivery_total',
                        'daily_deliveries.delivery_balance','daily_deliveries.created_at']);
                    

        return view('allDailyDelivery',['deliverylist'=>$deliverylist]);
    }

}