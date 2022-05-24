<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Production;
use App\Models\Plan;
use App\Models\Order;
use App\Models\Delivery;
use App\Models\Daily_production;

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

     function editData($id){
        $production=Production::find($id);
        return response()->json([
            'status'=>200,
            'production'=>$production,
        ]);
    }

        function updateData(Request $req){
        $production_id = $req->input('id');
        $production=Production::find($production_id);
        $production->inhand=$req->input('inhand');
        $production->today_production=$req->input('today_production');
        $production->total_production=$req->input('total_production');
        $production->balance=$req->input('balance');
        $production->status=1;
        $production->update();

        return redirect()->back()->with('status','production information has been updated');
    }

    //add daily data
    function addDailyData(Request $req){
        $production = new Daily_production;
        $production->production_id= $req->input('id');
        $production->today_production= $req->input('today_production');
        $production->total_production= $req->input('total_production');
        $production->balance= $req->input('balance');
        $production->save();

        return redirect()->back()->with('status','Today production information has been updated');
    }

    //daily production table
    function showDailyData(Request $req){
        $dailylist = Daily_production::join('productions','productions.id','=','daily_productions.production_id')
                    ->join('plans','plans.id','=','productions.plan_id')
                    ->join('orders','orders.id','=','plans.order_id')
                    ->orderBy('daily_productions.id', 'DESC')
                    ->get(['daily_productions.id as id','orders.order_no','orders.total_qty as total',
                        'plans.target_perday as targetPerDay',
                        'daily_productions.today_production','daily_productions.total_production',
                        'daily_productions.balance','daily_productions.created_at']);
                    

        return view('dailyProduction',['dailylist'=>$dailylist]);
    }
    
}