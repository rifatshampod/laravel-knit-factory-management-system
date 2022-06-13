<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Order;
use App\Models\Production;
use App\Models\Section;

class planController extends Controller
{
    function showData(Request $req){
        $planlist = Plan::join('orders','orders.id','=','plans.order_id')
                    ->orderBy('plans.id', 'DESC')
                    ->get(['plans.id as id','orders.id as orderId','orders.artwork',
                        'orders.style','orders.order_no','orders.body_color','orders.print_quality',
                        'orders.parts_name','orders.print_color','orders.color_qty','orders.order_qty',
                        'orders.extra_qty','orders.total_qty','orders.delivery_date','plans.target_day',
                        'plans.target_perday','plans.production_start','plans.production_end',
                        'plans.section','plans.status']);
        $sectionlist=Section::all();
                    

        return view('allPlan',['planlist'=>$planlist])->with('sectionlist',$sectionlist);
    }

    function showReportData(Request $req){
        $planlist = Plan::join('orders','orders.id','=','plans.order_id')
                    ->orderBy('plans.id', 'DESC')
                    ->get(['plans.id as id','orders.id as orderId','orders.artwork',
                        'orders.style','orders.order_no','orders.body_color','orders.print_quality',
                        'orders.parts_name','orders.print_color','orders.color_qty','orders.order_qty',
                        'orders.extra_qty','orders.total_qty','orders.delivery_date','plans.target_day',
                        'plans.target_perday','plans.production_start','plans.production_end',
                        'plans.section','plans.status']);
        $sectionlist=Section::all();
                    

        return view('report/allocationReport',['planlist'=>$planlist])->with('sectionlist',$sectionlist);
    }

    function editData($id){
        // $plan=Plan::find($id);
        $plan=Plan::join('orders','orders.id','=','plans.order_id')
        ->find($id);
        return response()->json([
            'status'=>200,
            'plan'=>$plan,
        ]);
    }

    function updateData(Request $req){
        $plan_id = $req->input('id');
        $plan=Plan::find($plan_id);
        $plan->target_day=$req->input('target_day');
        $plan->target_perday=$req->input('target_perday');
        $plan->production_start=$req->input('production_start');
        $plan->production_end=$req->input('production_end');
        $plan->section=$req->input('section');
        $plan->status=1;
        $plan->update();

        $production = new Production;
        $production->plan_id = $plan->id;
        $production->order_id = $req->input('order_id');
        $production->status = 0;
        $production->save();
        

        return redirect()->back()->with('status','plan information has been updated');
    }
}