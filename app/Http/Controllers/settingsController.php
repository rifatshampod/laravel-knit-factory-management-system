<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchandiser;
use App\Models\Supplier;
use App\Models\Body_color;
use App\Models\Print_quality;
use App\Models\Parts_name;
use App\Models\Section;
use App\Models\Order;
use App\Models\Plan;

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
    //supplier functions start

    //Bodycolor functions start
    function showBodycolorData(Request $req){
        $bodycolorlist = Body_color::get();                
        return view('settings.bodycolor',['bodycolorlist'=>$bodycolorlist]);
    }

    function addBodycolor(Request $req){
        $bodycolor = new Body_color;
        $bodycolor->name= $req->input('name');
        $bodycolor->save();

        return redirect()->back()->with('status','New bodycolor added successfully');
    }

    function getBodycolorData($id){
        $bodycolor=Body_color::find($id);
        return response()->json([
            'status'=>200,
            'bodycolor'=>$bodycolor,
        ]);
    }

    function editBodycolorData(Request $req){
        $bodycolor_id = $req->input('id');
        $bodycolor=Body_color::find($bodycolor_id);
        $bodycolor->name=$req->input('name');
        $bodycolor->update();

        //change in other table
        $oldName = $req->input('name_old');
        $newName = $req->input('name');
        $order = Order::where('body_color',$oldName)
        ->update([
           'body_color' => $newName,
        ]);

        return redirect()->back()->with('status','Body Color information has been updated');
    }

    function deleteBodycolorData(Request $req){
        $bodycolor_id = $req->input('id');
        $bodycolor=Body_color::find($bodycolor_id);
        $bodycolor->delete();

        return redirect()->back()->with('status','Merchandiser information deleted');
    }
    //Bodycolor functions start

    //Print_quality functions start
    function showPrintqualityData(Request $req){
        $printqualitylist = Print_quality::get();                
        return view('settings.printquality',['printqualitylist'=>$printqualitylist]);
    }

    function addPrintquality(Request $req){
        $printquality = new Print_quality;
        $printquality->name= $req->input('name');
        $printquality->save();

        return redirect()->back()->with('status','New printquality added successfully');
    }

    function getPrintqualityData($id){
        $printquality=Print_quality::find($id);
        return response()->json([
            'status'=>200,
            'printquality'=>$printquality,
        ]);
    }

    function editPrintqualityData(Request $req){
        $printquality_id = $req->input('id');
        $printquality=Print_quality::find($printquality_id);
        $printquality->name=$req->input('name');
        $printquality->update();

        return redirect()->back()->with('status','printquality information has been updated');
    }

    function deletePrintqualityData(Request $req){
        $printquality_id = $req->input('id');
        $printquality=Print_quality::find($printquality_id);
        $printquality->delete();

        return redirect()->back()->with('status','Merchandiser information deleted');
    }
    //Print_quality functions start

    //Parts functions start
    function showPartsData(Request $req){
        $partslist = Parts_name::get();                
        return view('settings.parts',['partslist'=>$partslist]);
    }

    function addParts(Request $req){
        $parts = new Parts_name;
        $parts->name= $req->input('name');
        $parts->save();

        return redirect()->back()->with('status','New printquality added successfully');
    }

    function getPartsData($id){
        $parts=Parts_name::find($id);
        return response()->json([
            'status'=>200,
            'parts'=>$parts,
        ]);
    }

    function editPartsData(Request $req){
        $parts_id = $req->input('id');
        $parts=Parts_name::find($parts_id);
        $parts->name=$req->input('name');
        $parts->update();

        return redirect()->back()->with('status','parts information has been updated');
    }

    function deletePartsData(Request $req){
        $parts_id = $req->input('id');
        $parts=Parts_name::find($parts_id);
        $parts->delete();

        return redirect()->back()->with('status','Merchandiser information deleted');
    }
    //Parts_name functions start

    //Sections functions start
    function showSectionsData(Request $req){
        $sectionslist = Section::get();                
        return view('settings.sections',['sectionslist'=>$sectionslist]);
    }

    function addSections(Request $req){
        $sections = new Section;
        $sections->name= $req->input('name');
        $sections->save();

        return redirect()->back()->with('status','New printquality added successfully');
    }

    function getSectionsData($id){
        $sections=Section::find($id);
        return response()->json([
            'status'=>200,
            'sections'=>$sections,
        ]);
    }

    function editSectionsData(Request $req){
        $sections_id = $req->input('id');
        $sections=Section::find($sections_id);
        $sections->name=$req->input('name');
        $sections->update();

        //change in other table
        $oldName = $req->input('name_old');
        $newName = $req->input('name');
        $order = Plan::where('section',$oldName)
        ->update([
           'section' => $newName,
        ]);

        return redirect()->back()->with('status','sections information has been updated');
    }

    function deleteSectionsData(Request $req){
        $sections_id = $req->input('id');
        $sections=Section::find($sections_id);
        $sections->delete();

        return redirect()->back()->with('status','sections information deleted');
    }
    //Section functions end
}