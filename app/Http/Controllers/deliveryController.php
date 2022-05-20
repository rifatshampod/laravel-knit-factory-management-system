<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Models\Order;

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
}