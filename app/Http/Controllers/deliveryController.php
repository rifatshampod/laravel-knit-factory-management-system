<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\Plan;
use App\Models\Receive;

class deliveryController extends Controller
{
    function showData(Request $req){
        $deliverylist = Delivery::join('orders','orders.id','=','deliveries.order_id')
                    ->orderBy('deliveries.id', 'DESC')
                    ->get(['deliveries.id as id','orders.id as orderId',
                        'orders.style','orders.order_no','orders.body_color',
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

    function updateReceiveData(Request $req){
        $delivery_id = $req->input('id');
        $delivery=Delivery::find($delivery_id);
        $delivery->first_receive=$req->input('first_receive');
        $delivery->status=1;
        $delivery->update();

        $receive = new Receive;
        $receive->delivery_id= $req->input('id');
        $receive->receive_today= $req->input('today_receive');
        $receive->receive_total= $req->input('total_receive');
        $receive->receive_balance= $req->input('receive_balance');
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

        return redirect()->back()->with('status','receive information has been updated');
    }

}