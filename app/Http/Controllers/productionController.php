<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Production;
use App\Models\Plan;
use App\Models\Order;
use App\Models\Delivery;
use App\Models\Daily_production;
use Illuminate\Support\Facades\DB;

class productionController extends Controller
{
    function showData(Request $req){
        $productionlist = Production::join('plans','plans.id','=','productions.plan_id')
                    ->join('orders','orders.id','=','plans.order_id')
                    ->orderBy('productions.id', 'DESC')
                    ->get(['productions.id as id','orders.id as orderId','orders.artwork',
                        'orders.style','orders.order_no','orders.body_color','orders.print_quality',
                        'orders.parts_name','orders.print_color','orders.total_qty','plans.target_perday',
                        'productions.inhand','productions.today_production',
                        'productions.total_production','productions.balance','productions.status as productionStatus']);
                    

        return view('allProduction',['productionlist'=>$productionlist]);
    }

    function showReportData(Request $req){
        $productionlist = Production::join('plans','plans.id','=','productions.plan_id')
                    ->join('orders','orders.id','=','plans.order_id')
                    ->orderBy('productions.id', 'DESC')
                    ->get(['productions.id as id','orders.id as orderId','orders.artwork',
                        'orders.style','orders.order_no','orders.body_color','orders.print_quality',
                        'orders.parts_name','orders.print_color','orders.total_qty','plans.target_perday',
                        'productions.inhand','productions.today_production',
                        'productions.total_production','productions.balance',
                        'productions.status as productionStatus','orders.status as hideStatus'])
                    ->where('hideStatus',1);
                    

        return view('report/productionReport',['productionlist'=>$productionlist]);
    }

     function editData($id){
        $production=Production::join('deliveries','productions.order_id','=','deliveries.order_id')
        ->find($id);
        return response()->json([
            'status'=>200,
            'production'=>$production,
        ]);
    }

     function editDailyDataFetch($id2){
        $production2=Daily_production::find($id2);
        return response()->json([
            'status'=>200,
            'production2'=>$production2,
        ]);
    }

    function editDailydata(Request $req){

        if($req->input('today_now')){
        $daily_id = $req->input('id');
        $production_id = $req->input('production_parent');
        $today = $req->input('today_now');
        $todayBefore = $req->input('today_before');
        $date = $req->input('production_date');
        $total = $req->input('total_now');

        $difference = $todayBefore - $today;
        }

        //update method

        $daily = Daily_production::find($daily_id);
        $daily->today_production=$req->input('today_now');
        $daily->total_production= $total;
        $daily->production_date =  $req->input('production_date');
        $daily->balance=$req->input('balance_now');
        $daily->update();
        
        // updating all production after the edited one

        Daily_production::where('production_id', $production_id)
        ->where('production_date','>=', $date)
        ->where('id','!=',$daily_id)
       ->update([
           'total_production' => DB::raw('total_production - '.$difference.''),
           'balance' => DB::raw('balance + '.$difference.''),
        ]);

        return redirect()->back();

    }

        function updateData(Request $req){
        $production_id = $req->input('id');
        $production=Production::find($production_id);
        $production->today_production=$req->input('today_production');
        $production->total_production+=$req->input('today_production');
        $production->balance=$req->input('balance');
        $production->status=1;
        $production->update();

        $production = new Daily_production;
        $production->production_id= $req->input('id');
        $production->today_production= $req->input('today_production');
        $production->balance= $req->input('balance');
        $production->save();

        $orderId = $req->input('order_id');

        $delivery = Delivery::where('order_id',$orderId)->update([
           'delivery_status' => 1
        ]);

        return redirect()->back()->with('status','production information has been updated');
    }

    //add daily data
    function addDailyData(Request $req){
        $production = new Daily_production;
        $production->production_id= $req->input('id');
        $production->production_date= $req->input('production_date');
        $production->today_production= $req->input('today_production');
        $production->total_production= $req->input('total_yet');
        $production->balance= $req->input('balance');
        $production->save();

        $production_id = $req->input('id');
        $production=Production::find($production_id);
        $production->today_production=$req->input('today_production');
        $production->total_production+=$req->input('today_production');
        $production->balance=$req->input('balance');
        $production->inhand=$req->input('inhand');
        $production->update();

        return redirect()->back()->with('status','Today production information has been updated');
    }

    //daily production table
    function showDailyData(Request $req){
        $dailylist = Daily_production::join('productions','productions.id','=','daily_productions.production_id')
                    ->join('plans','plans.id','=','productions.plan_id')
                    ->join('orders','orders.id','=','plans.order_id')
                    ->orderBy('daily_productions.id', 'DESC')
                    ->get(['daily_productions.id as id','orders.order_no','orders.total_qty as total',
                        'plans.target_perday as targetPerDay','orders.style','orders.body_color','orders.parts_name',
                        'daily_productions.today_production','daily_productions.total_production',
                        'daily_productions.balance','daily_productions.production_date']);
                    

        return view('dailyProduction',['dailylist'=>$dailylist]);
    }

    function showOrderNumber(Request $req){
        $orderlist = Production::join('orders','orders.id','=','productions.order_id')
                    ->select('order_no')->distinct()
                    ->get();

        return view('report/orderProdReport',['orderlist'=>$orderlist]);
    }

    function getOrderNumberData(Request $req){
        $slug = $req->input('order_no');
        $dailylist = Daily_production::join('productions','productions.id','=','daily_productions.production_id')
                    ->join('plans','plans.id','=','productions.plan_id')
                    ->join('orders','orders.id','=','plans.order_id')
                    ->orderBy('daily_productions.id', 'DESC')
                    ->where('orders.order_no',$slug)
                    ->get(['daily_productions.id as id','orders.order_no','orders.artwork','orders.total_qty as total',
                        'plans.target_perday as targetPerDay','orders.style','orders.body_color','orders.parts_name',
                        'daily_productions.today_production','daily_productions.total_production',
                        'daily_productions.balance','daily_productions.production_date']);
        
        //order number list for selection
        $orderlist = Production::join('orders','orders.id','=','productions.order_id')
                    ->select('order_no')->distinct()
                    ->get();

        return view('report/orderProdReportData',['dailylist'=>$dailylist])->with('orderlist',$orderlist);
    }

    function getDateWiseData(Request $req){
        
        $datefrom = $req->input('start');
        $dateto = $req->input('end');
        
        $dailylist = Daily_production::join('productions','productions.id','=','daily_productions.production_id')
                    ->join('plans','plans.id','=','productions.plan_id')
                    ->join('orders','orders.id','=','plans.order_id')
                    ->whereBetween('daily_productions.production_date',[$datefrom , $dateto])
                    ->orderBy('daily_productions.id', 'DESC')
                    ->get(['daily_productions.id as id','orders.order_no','orders.artwork','orders.total_qty as total',
                        'plans.target_perday as targetPerDay','orders.style','orders.body_color','orders.parts_name',
                        'daily_productions.today_production','daily_productions.total_production',
                        'daily_productions.balance','daily_productions.production_date']);
                   

        return view('report/dateProdReportData',['dailylist'=>$dailylist]);
    }
    
}