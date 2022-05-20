<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchandiser;
use App\Models\Order;
use App\Models\Supplier;
use App\Models\Body_color;
use App\Models\Print_quality;
use App\Models\Parts_name;
use App\Models\Plan;
use App\Models\Delivery;

class orderController extends Controller
{
     function retrieveData(Request $req)
    {
        $merchandiserlist = Merchandiser::all();
        $supplierlist = Supplier::all();
        $bodycolorlist = Body_color::all();
        $qualitylist = Print_quality::all();
        $partslist = Parts_name::all();

        return view('createOrder', ['merchandiserlist' => $merchandiserlist])
        ->with('supplierlist',$supplierlist)
        ->with('bodycolorlist',$bodycolorlist)
        ->with('qualitylist',$qualitylist)
        ->with('partslist',$partslist);
    }

    function addData(Request $req) //function to get the input data
    {

        $order = new Order;
        $order->style= $req->input('style');
        $order->order_no= $req->input('orderNo');
        $order->body_color= $req->input('bodyColor');
        $order->print_quality= $req->input('printQuality');
        $order->parts_name= $req->input('partsName');
        $order->print_color= $req->input('printColor');
        $order->color_qty= $req->input('colorQty');
        $order->order_qty= $req->input('orderQty');
        $order->extra_qty= $req->input('extraQty');
        $order->total_qty= $req->input('totalQty');
        $order->delivery_date= $req->input('deliveryDate');
        $order->merchandiser= $req->input('merchandiser');
        $order->supplier= $req->input('supplier');
        $order->price_dozen= $req->input('priceDozen');
        $order->save();

        $delivery = new Delivery;
        $delivery->order_id = $order->id;
        $delivery->status = 0;
        $delivery->save();
        

        //save image file
        if($req->file('artwork')){
            $lastId = $order->id;
            $pictureInfo = $req->file('artwork');
            $picName = $pictureInfo->getClientOriginalName();
            $folder = "artwork";
            $pictureInfo->move($folder, $picName);
            $picUrl = $folder .'/'. $picName;
            //database
            $staffPic = Order::find($lastId);
            $staffPic->artwork = $picUrl;
            $staffPic->save();
        }
        

        $req->session()->flash('status','Form submitted successfully');
        return redirect('order');

        //return $req->file('file')->store('cv');

    }

    function showData(Request $req){
        $orderlist = Order::all();

        return view('allOrder',['orderlist'=>$orderlist]);
    }
}