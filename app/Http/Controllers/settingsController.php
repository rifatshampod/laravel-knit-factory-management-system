<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchandiser;
use App\Models\Supplier;
use App\Models\Body_color;
use App\Models\Print_quality;
use App\Models\Parts_name;

class settingsController extends Controller
{

    //merchandiser functions start
    function showMerchandiserData(Request $req){
        $merchandiserlist = Merchandiser::get();                
        return view('settings.merchandiser',['merchandiserlist'=>$merchandiserlist]);
    }

    function addMerchandiser(Request $req){
        $merchandiser = new Merchandiser;
        $merchandiser->name= $req->input('name');
        $merchandiser->save();

        return redirect()->back()->with('status','New Merchandiser added successfully');
    }

    function getMerchandiserData($id){
        $merchandiser=Merchandiser::find($id);
        return response()->json([
            'status'=>200,
            'merchandiser'=>$merchandiser,
        ]);
    }

    function editMerchandiserData(Request $req){
        $merchandiser_id = $req->input('id');
        $merchandiser=Merchandiser::find($merchandiser_id);
        $merchandiser->name=$req->input('name');
        $merchandiser->update();

        return redirect()->back()->with('status','Merchandiser information has been updated');
    }

    function deleteMerchandiserData(Request $req){
        $merchandiser_id = $req->input('id');
        $merchandiser=Merchandiser::find($merchandiser_id);
        $merchandiser->delete();

        return redirect()->back()->with('status','Merchandiser information deleted');
    }
    //merchandiser functions start

    //supplier functions start
    function showSupplierData(Request $req){
        $supplierlist = Supplier::get();                
        return view('settings.supplier',['supplierlist'=>$supplierlist]);
    }

    function addSupplier(Request $req){
        $supplier = new Supplier;
        $supplier->name= $req->input('name');
        $supplier->save();

        return redirect()->back()->with('status','New Merchandiser added successfully');
    }

    function getSupplierData($id){
        $supplier=Supplier::find($id);
        return response()->json([
            'status'=>200,
            'supplier'=>$supplier,
        ]);
    }

    function editSupplierData(Request $req){
        $supplier_id = $req->input('id');
        $supplier=Supplier::find($supplier_id);
        $supplier->name=$req->input('name');
        $supplier->update();

        return redirect()->back()->with('status','Merchandiser information has been updated');
    }

    function deleteSupplierData(Request $req){
        $supplier_id = $req->input('id');
        $supplier=Supplier::find($supplier_id);
        $supplier->delete();

        return redirect()->back()->with('status','Merchandiser information deleted');
    }
    //merchandiser functions start
}