<?php

namespace App\Http\Controllers;

use App\Http\Requests\subCategoryPost;
use App\Models\catagory;
use App\Models\subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class subCategoryControler extends Controller
{
    function index() {
        $categorys = catagory::all();
        $subcategory = subcategory::all();
        return view('admin.subcatagory.index', compact('categorys','subcategory'));
    }
    function insert(Request $request) {

        if(subcategory::where('category_id',$request->select_catagory)->where('subcategory_name', $request->subcategory_name)->exists()) {
            return back()->with('exist_subcategory', 'subcategory already taken..!');
        } else {
            subcategory::insert([
                'category_id' => $request->select_catagory,
                'subcategory_name' => $request->subcategory_name,
                'added_by' => Auth::id(),
                "created_at" => Carbon::now(),
            ]);
            return back()->with('success', 'subcategory added successfull');
        }
    }
    function delete($delete_subcatagory) {
        subcategory::find($delete_subcatagory)->delete();
        return back()->with('delete', 'Subcategory Deleted succesfull');
    }
    function edit($edit_subcatagory) {
       $subcategory = subcategory::find($edit_subcatagory);
       return view('admin.subcatagory.edit', compact('subcategory'));
    }
    function update(Request $request){
        subcategory::find($request->subctg_id)->update([
            'subcategory_name'=>$request->subcategory_name,
            'addad_by'=>Auth::id(),
            'updated_at'=>Carbon::now(),
        ]);
        return back();
    }
}
