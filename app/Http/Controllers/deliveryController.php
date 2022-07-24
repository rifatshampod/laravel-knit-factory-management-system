<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\Plan;
use App\Models\Receive;
use App\Models\Daily_delivery;
use Illuminate\Support\Facades\DB;

class deliveryController extends Controller
{
    function showData(Request $req){
        $deliverylist = Delivery::join('orders','orders.id','=','deliveries.order_id')
                    ->orderBy('deliveries.id', 'DESC')
                    ->get(['deliveries.id as id','orders.id as orderId',
                        'orders.style','orders.order_no','orders.body_color','orders.total_qty as total_order','orders.print_quality','orders.parts_name','orders.print_color','orders.artwork',
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
        $delivery->receive_balance-=$req->input('today_receive');
        $delivery->status=1;
        $delivery->update();


        $receive = new Receive;
        $receive->delivery_id= $req->input('id');
        $receive->receive_date = $req->input('first_receive');
        $receive->receive_today= $req->input('today_receive');
        $receive->receive_total= $req->input('today_receive');
        $receive->receive_balance=  $delivery->receive_balance;
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
        $receive->receive_date= $req->input('receive_date');
        $receive->receive_today= $req->input('today_receive');
        $receive->receive_total= $req->input('total_receive');
        $receive->receive_balance= $req->input('receive_balance');
        $receive->save();

        $delivery_id = $req->input('id');
        $delivery=Delivery::find($delivery_id);
        $delivery->today_receive= $req->input('today_receive');
        $delivery->total_receive+= $req->input('today_receive');
        $delivery->receive_balance= $req->input('receive_balance');
        $delivery->update();

        return redirect()->back()->with('status','receive information has been updated');
    }

    function showReceiveData(Request $req){
        $deliverylist = Receive::join('deliveries','deliveries.id','=','receives.delivery_id')
                    ->join('orders','orders.id','=','deliveries.order_id')
                    ->orderBy('receives.id', 'desc')
                    ->get(['receives.id','orders.id as orderId',
                        'orders.style','orders.order_no','orders.body_color','orders.parts_name',
                        'receives.receive_today','receives.receive_total',
                        'receives.receive_balance','receives.receive_date']);
                    

        return view('allReceive',['deliverylist'=>$deliverylist]);
    }


    function addDeliveryData(Request $req){

        $delivery_id = $req->input('id');
        $deliveryTable = Delivery::find($delivery_id);
        $deliveryTable->today_delivery= $req->input('today_delivery');
        $deliveryTable->total_delivery= $req->input('total_delivery');
        $deliveryTable->delivery_balance= $req->input('delivery_balance');
        $deliveryTable->update();



        $delivery = new Daily_delivery;
        $delivery->delivery_id= $req->input('id');
        $delivery->delivery_date= $req->input('delivery_date');
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
                        'orders.style','orders.order_no','orders.body_color','orders.parts_name',
                        'daily_deliveries.delivery_today','daily_deliveries.delivery_total',
                        'daily_deliveries.delivery_balance','daily_deliveries.delivery_date']);
                    

        return view('allDailyDelivery',['deliverylist'=>$deliverylist]);
    }

    function showOrderDeliveryData(Request $req){
        // $deliverylist = Daily_delivery::join('deliveries','deliveries.id','=','daily_deliveries.delivery_id')
        //             ->join('orders','orders.id','=','deliveries.order_id')
        //             ->orderBy('daily_deliveries.id', 'DESC')
        //             ->groupBy('delivery_date')
        //             ->get();
        //             ->get(['daily_deliveries.id as id','orders.id as orderId','orders.artwork',
        //                 'orders.style','orders.order_no','orders.body_color','orders.print_quality','orders.parts_name',
        //                 'orders.print_color','orders.total_qty', 'deliveries.total_receive',
        //                 'daily_deliveries.delivery_today','daily_deliveries.delivery_total',
        //                 'daily_deliveries.delivery_balance','daily_deliveries.delivery_date']);

                    $deliverylist = Daily_delivery::join('deliveries','deliveries.id','=','daily_deliveries.delivery_id')
                    ->join('orders','orders.id','=','deliveries.order_id')
                    ->orderBy('daily_deliveries.id', 'DESC')
                    ->selectRaw("SUM(delivery_today) as total_debit, delivery_date")
                    ->groupBy('daily_deliveries.delivery_date')
                    ->get();
                   
                    

        return view('orderDelReport',['deliverylist'=>$deliverylist]);
    }

    // delivery report--------------------------------------------------------------

    function showOrderNumber(Request $req){
        $orderlist = Delivery::join('orders','orders.id','=','deliveries.order_id')
                    ->select('order_no')->distinct()
                    ->get();

        return view('report/orderDelReport',['orderlist'=>$orderlist]);
    }

    function getOrderNumberData(Request $req){
        $slug = $req->input('order_no');
       \DB::statement("SET SQL_MODE=''");
        $deliverylist = Order::select('orders.style','orders.order_no','orders.body_color','orders.print_quality','orders.parts_name', 'orders.print_color','orders.total_qty','orders.artwork','daily_deliveries.delivery_date','deliveries.total_receive','daily_deliveries.delivery_total',DB::raw('SUM(daily_deliveries.delivery_today) AS delivery_today',), DB::raw('max(daily_deliveries.delivery_total) as delivery_total',), DB::raw('min(daily_deliveries.delivery_balance) as delivery_balance',))
                        ->join('deliveries','deliveries.order_id','=','orders.id')
                        ->join('daily_deliveries','daily_deliveries.delivery_id','=','deliveries.id')
                        ->where('orders.order_no',$slug)
                        ->groupBy('daily_deliveries.delivery_date')
                        ->groupBy('daily_deliveries.delivery_id')
                        ->get();
        
        //order number list for selection
        $orderlist = Delivery::join('orders','orders.id','=','deliveries.order_id')
                    ->select('order_no')->distinct()
                    ->get();

        return view('report/orderDelReportData',['deliverylist'=>$deliverylist])->with('orderlist',$orderlist);
    }

    function getDateWiseData(Request $req){
        
        $datefrom = $req->input('start');
        $dateto = $req->input('end');
        
        \DB::statement("SET SQL_MODE=''");
        $deliverylist = Order::select('orders.style','orders.order_no','orders.body_color','orders.print_quality','orders.parts_name', 'orders.print_color','orders.total_qty','orders.artwork','daily_deliveries.delivery_date','deliveries.total_receive','daily_deliveries.delivery_total',DB::raw('SUM(daily_deliveries.delivery_today) AS delivery_today',), DB::raw('max(daily_deliveries.delivery_total) as delivery_total',), DB::raw('min(daily_deliveries.delivery_balance) as delivery_balance',))
                        ->join('deliveries','deliveries.order_id','=','orders.id')
                        ->join('daily_deliveries','daily_deliveries.delivery_id','=','deliveries.id')
                        ->whereBetween('daily_deliveries.delivery_date',[$datefrom , $dateto])
                        ->groupBy('daily_deliveries.delivery_date')
                        ->groupBy('daily_deliveries.delivery_id')
                        ->get();           

        return view('report/dateDelReportData',['deliverylist'=>$deliverylist]);
    }

    //receive report----------------------------------------------------------

    function showReceiveOrderNumber(Request $req){
        $orderlist = Delivery::join('orders','orders.id','=','deliveries.order_id')
                    ->select('order_no')->distinct()
                    ->get();

        return view('report/orderRecReport',['orderlist'=>$orderlist]);
    }

    function getReceiveOrderNumberData(Request $req){
        $slug = $req->input('order_no');
        $deliverylist = Receive::join('deliveries','deliveries.id','=','receives.delivery_id')
                    ->join('orders','orders.id','=','deliveries.order_id')
                    ->where('orders.order_no',$slug)
                    // ->groupBy('receives.delivery_date')
                    ->orderBy('receives.id', 'DESC')
                    ->get(['receives.id as id','orders.id as orderId','orders.artwork',
                        'orders.style','orders.order_no','orders.body_color','orders.print_quality','orders.parts_name',
                        'orders.print_color','orders.total_qty', 'deliveries.total_receive',
                        'receives.receive_today','receives.receive_total',
                        'receives.receive_balance','receives.receive_date']);
                   
                         $orderlist = Delivery::join('orders','orders.id','=','deliveries.order_id')
                    ->select('order_no')->distinct()
                    ->get();

        return view('report/orderRecReportData',['deliverylist'=>$deliverylist])->with('orderlist',$orderlist);
    }

    //daily receive edit --------------------------

    function editDailyReceiveDataFetch($id){
        $receive=Receive::find($id);
        return response()->json([
            'status'=>200,
            'receive'=>$receive,
        ]);
    }

    function editDailyReceiveData(Request $req){

        if($req->input('today_now')){
        $daily_id = $req->input('id');
        $delivery_id = $req->input('receive_parent');
        $today = $req->input('today_now');
        $todayBefore = $req->input('today_before');
        $date = $req->input('receive_date');
        $total = $req->input('total_now');

        $difference = $todayBefore - $today;
        }

        //update method

        $daily = Receive::find($daily_id);
        $daily->receive_today=$req->input('today_now');
        $daily->receive_total= $total;
        $daily->receive_date =  $req->input('receive_date');
        $daily->receive_balance=$req->input('balance_now');
        $daily->update();
        
        // updating all production after the edited one

        Receive::where('delivery_id', $delivery_id)
        ->where('receive_date','>=', $date)
        ->where('id','!=',$daily_id)
       ->update([
           'receive_total' => DB::raw('receive_total - '.$difference.''),
           'receive_balance' => DB::raw('receive_balance + '.$difference.''),
        ]);

        //updating balance in main delivery table
        
        Delivery::where('id', $delivery_id)
        ->update([
            'total_receive' => DB::raw('total_receive - '.$difference.''),
            'receive_balance' => DB::raw('receive_balance + '.$difference.''),
        ]);

        return redirect()->back();

    }
    //daily receive edit end--------------------------

    //daily delivery edit --------------------------

    function editDailyDeliveryDataFetch($id){
        $delivery=Daily_delivery::find($id);
        return response()->json([
            'status'=>200,
            'delivery'=>$delivery,
        ]);
    }

    function editDailyDeliveryData(Request $req){

        if($req->input('today_now')){
        $daily_id = $req->input('id');
        $delivery_id = $req->input('delivery_parent');
        $today = $req->input('today_now');
        $todayBefore = $req->input('today_before');
        $date = $req->input('delivery_date');
        $total = $req->input('total_now');

        $difference = $todayBefore - $today;
        }

        //update method

        $daily = Daily_delivery::find($daily_id);
        $daily->delivery_today=$req->input('today_now');
        $daily->delivery_total= $total;
        $daily->delivery_date =  $req->input('delivery_date');
        $daily->delivery_balance=$req->input('balance_now');
        $daily->update();
        
        // updating all production after the edited one

        Daily_delivery::where('delivery_id', $delivery_id)
        ->where('delivery_date','>=', $date)
        ->where('id','!=',$daily_id)
       ->update([
           'delivery_total' => DB::raw('delivery_total - '.$difference.''),
           'delivery_balance' => DB::raw('delivery_balance + '.$difference.''),
        ]);

        //updating balance in main delivery table
        
        Delivery::where('id', $delivery_id)
        ->update([
            'total_delivery' => DB::raw('total_delivery - '.$difference.''),
            'delivery_balance' => DB::raw('delivery_balance + '.$difference.''),
        ]);

        return redirect()->back();

    }

    //daily delivery edit end -------------------------

}