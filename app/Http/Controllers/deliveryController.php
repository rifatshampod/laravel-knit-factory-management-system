<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\Plan;

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
        $delivery->today_receive=$req->input('today_receive');
        $delivery->total_receive=$req->input('total_receive');
        $delivery->receive_balance=$req->input('receive_balance');
        $delivery->status=1;
        $delivery->update();



        $plan = new Plan;
        $plan->order_id = $req->input('order_id');
        $plan->status = 0;
        $plan->save();

        return redirect()->back()->with('status','delivery information has been updated');
    }

}