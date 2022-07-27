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
use DB;

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

        //body color new
        if($req->input('bodyColor')=='other'){  
            $order->body_color= $req->input('otherBodycolor');
            $color = new Body_color;
            $color->name = $req->input('otherBodycolor');  
            $color->save();
        }
        else{
            $order->body_color= $req->input('bodyColor');
        }

        //print quality new
        if($req->input('printQuality')=='other'){    
            $order->print_quality= $req->input('otherPrintquality');
            $color = new Print_quality;
            $color->name = $req->input('otherPrintquality');  
            $color->save();
        }
        else{
            $order->print_quality= $req->input('printQuality');
        }

        //parts name new
        if($req->input('partsName')=='other'){      
            $order->parts_name= $req->input('otherPartsname');
            $color = new Parts_name;
            $color->name = $req->input('otherPartsname');  
            $color->save();
        }
        else{
            $order->parts_name= $req->input('partsName');
        }



        $order->print_color= $req->input('printColor');
        $order->color_qty= $req->input('colorQty');
        $order->order_qty= $req->input('orderQty');
        $order->extra_qty= $req->input('extraQty');
        $order->total_qty= $req->input('totalQty');
        $order->delivery_date= $req->input('deliveryDate');

        //merchandiser new
        if($req->input('merchandiser')=='other'){
            $order->merchandiser= $req->input('otherMerchandiser');
            $color = new Merchandiser;
            $color->name = $req->input('otherMerchandiser');  
            $color->save();
        }
        else{
            $order->merchandiser= $req->input('merchandiser');
        }
        //supplier ner
        if($req->input('supplier')=='other'){
            $order->supplier= $req->input('otherSupplier');
            $color = new Supplier;
            $color->name = $req->input('otherSupplier');  
            $color->save();
        }
        else{
            $order->supplier= $req->input('supplier');
        }

        $order->price_dozen= $req->input('priceDozen');
        $order->save();

        $delivery = new Delivery;
        $delivery->order_id = $order->id;
        $delivery->receive_balance = $req->input('totalQty');
        $delivery->status = 0;
        $delivery->save();
        

        //save image file
        if($req->file('artwork')){
            $lastId = $order->id;
            $pictureInfo = $req->file('artwork');
            $picName = $pictureInfo->getClientOriginalName();
            $folder = "artwork";
            $pictureInfo->move($folder, $lastId.$picName);
            $picUrl = $folder .'/'.$lastId.$picName;
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

        $merchandiserlist = Merchandiser::all();
        $supplierlist = Supplier::all();
        $bodycolorlist = Body_color::all();
        $qualitylist = Print_quality::all();
        $partslist = Parts_name::all();
        
        $orderlist = Order::orderBy('id','DESC')
        ->get();

        return view('allOrder',['orderlist'=>$orderlist])
        ->with('supplierlist',$supplierlist)
        ->with('merchandiserlist',$merchandiserlist)
        ->with('bodycolorlist',$bodycolorlist)
        ->with('qualitylist',$qualitylist)
        ->with('partslist',$partslist);
    }

    function showReportData(Request $req){

        $merchandiserlist = Merchandiser::all();
        $supplierlist = Supplier::all();
        $bodycolorlist = Body_color::all();
        $qualitylist = Print_quality::all();
        $partslist = Parts_name::all();
        
        $orderlist = Order::orderBy('id','DESC')
        ->where('status',1)
        ->get();

        return view('report/orderReport',['orderlist'=>$orderlist])
        ->with('supplierlist',$supplierlist)
        ->with('merchandiserlist',$merchandiserlist)
        ->with('bodycolorlist',$bodycolorlist)
        ->with('qualitylist',$qualitylist)
        ->with('partslist',$partslist);
    }

    function showBodyColorReportData($slug){

        $merchandiserlist = Merchandiser::all();
        $supplierlist = Supplier::all();
        $bodycolorlist = Body_color::all();
        $qualitylist = Print_quality::all();
        $partslist = Parts_name::all();
        
        $orderlist = Order::orderBy('id','DESC')
        ->where('body_color', $slug)
        ->where('status',1)
        ->get();

        return view('report/orderReport',['orderlist'=>$orderlist])
        ->with('supplierlist',$supplierlist)
        ->with('merchandiserlist',$merchandiserlist)
        ->with('bodycolorlist',$bodycolorlist)
        ->with('qualitylist',$qualitylist)
        ->with('partslist',$partslist);
    }
    function showPrintQualityReportData($slug){

        $merchandiserlist = Merchandiser::all();
        $supplierlist = Supplier::all();
        $bodycolorlist = Body_color::all();
        $qualitylist = Print_quality::all();
        $partslist = Parts_name::all();
        
        $orderlist = Order::orderBy('id','DESC')
        ->where('print_quality', $slug)
        ->where('status',1)
        ->get();

        return view('report/orderReport',['orderlist'=>$orderlist])
        ->with('supplierlist',$supplierlist)
        ->with('merchandiserlist',$merchandiserlist)
        ->with('bodycolorlist',$bodycolorlist)
        ->with('qualitylist',$qualitylist)
        ->with('partslist',$partslist);
    }
    function showPartsReportData($slug){

        $merchandiserlist = Merchandiser::all();
        $supplierlist = Supplier::all();
        $bodycolorlist = Body_color::all();
        $qualitylist = Print_quality::all();
        $partslist = Parts_name::all();
        
        $orderlist = Order::orderBy('id','DESC')
        ->where('parts_name', $slug)
        ->where('status',1)
        ->get();

        return view('report/orderReport',['orderlist'=>$orderlist])
        ->with('supplierlist',$supplierlist)
        ->with('merchandiserlist',$merchandiserlist)
        ->with('bodycolorlist',$bodycolorlist)
        ->with('qualitylist',$qualitylist)
        ->with('partslist',$partslist);
    }

    


        function editData($id){
        // $plan=Plan::find($id);
        $order=Order::find($id);
        return response()->json([
            'status'=>200,
            'order'=>$order,
        ]);
    }

    function updateData(Request $req){
        $order_id_before = $req->input('order_id');
        
        $order=Order::find($order_id_before);
        $order->style= $req->input('style');
        $order->order_no= $req->input('orderNo');

        if($req->input('hide')=='1'){
            $order->status =1;
        }
        else{
            $order->status =0;
        }

        //body color new
        if($req->input('bodyColor')=='other'){  
            $order->body_color= $req->input('otherBodycolor');
            $color = new Body_color;
            $color->name = $req->input('otherBodycolor');  
            $color->save();
        }
        else{
            $order->body_color= $req->input('bodyColor');
        }
        //print quality new
        if($req->input('printQuality')=='other'){    
            $order->print_quality= $req->input('otherPrintquality');
            $color = new Print_quality;
            $color->name = $req->input('otherPrintquality');  
            $color->save();
        }
        else{
            $order->print_quality= $req->input('printQuality');
        }
        //parts name new
        if($req->input('partsName')=='other'){      
            $order->parts_name= $req->input('otherPartsname');
            $color = new Parts_name;
            $color->name = $req->input('otherPartsname');  
            $color->save();
        }
        else{
            $order->parts_name= $req->input('partsName');
        }
        $order->print_color= $req->input('printColor');
        $order->color_qty= $req->input('colorQty');
        $order->order_qty= $req->input('orderQty');
        $order->extra_qty= $req->input('extraQty');
        $order->total_qty= $req->input('totalQty');
        $order->delivery_date= $req->input('deliveryDate');
        //merchandiser new
        if($req->input('merchandiser')=='other'){
            $order->merchandiser= $req->input('otherMerchandiser');
            $color = new Merchandiser;
            $color->name = $req->input('otherMerchandiser');  
            $color->save();
        }
        else{
            $order->merchandiser= $req->input('merchandiser');
        }
        //supplier ner
        if($req->input('supplier')=='other'){
            $order->supplier= $req->input('otherSupplier');
            $color = new Supplier;
            $color->name = $req->input('otherSupplier');  
            $color->save();
        }
        else{
            $order->supplier= $req->input('supplier');
        }
        $order->price_dozen= $req->input('priceDozen');
        $order->update();

        //save image file
        if($req->file('artwork')){
            $lastId = $order->id;
            $pictureInfo = $req->file('artwork');
            $picName = $pictureInfo->getClientOriginalName();
            $folder = "artwork";
            $pictureInfo->move($folder, $lastId.$picName);
            $picUrl = $folder .'/'.$lastId.$picName;
            //database
            $staffPic = Order::find($lastId);
            $staffPic->artwork = $picUrl;
            $staffPic->update();
        }

        //update delivery table 
        $receiveYet = Delivery::where('order_id',$order_id_before)
                    ->get('total_receive')->first();

        DB::table('deliveries')
            ->where('order_id', $order_id_before)
            ->update(['receive_balance' => $req->input('totalQty')-$receiveYet['total_receive']]);

        return redirect()->back()->with('status','order information has been updated');
    }

    function deleteData(Request $req){
        $order_id = $req->input('order_id');

        DB::delete('DELETE FROM deliveries WHERE order_id = ?', [$order_id]);
        DB::delete('DELETE FROM orders WHERE id = ?', [$order_id]);
        
        

        return redirect()->back()->with('status','order information has been deleted');
    }
}