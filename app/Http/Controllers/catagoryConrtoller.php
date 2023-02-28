<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoriPost;
use Illuminate\Http\Request;
use App\Models\catagory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class catagoryConrtoller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index() {
        $categorys = catagory::latest()->get();
        return view('admin.catagory.index', compact('categorys'));
    }
    function insart(categoriPost $request) {
    //     $request->validate([
    //         'category_name'=>'required',
    //     ],
    //     ['category_name.required'=>'category nam koi?']
    // );
        catagory::insert([
            'catagory_name'=>$request->category_name,
            'addad_by'=>Auth::id(),
            'created_at'=>Carbon::now()
        ]);
        return back()->with('success', 'catagory add successfull');
    }
    function delete($delete_catagory) {
       catagory::find($delete_catagory)->delete();
       return back()->with('deleted', "Catagory deleted successfull");
    }
    function edit($edit_catagory) {

        $edit_catagory_name = catagory::find($edit_catagory);

        return view('admin.catagory.edit', compact('edit_catagory_name'));

    }
    function update(categoriPost $request) {
        catagory::find($request->ctg_id)->update([
            'catagory_name'=>$request->category_name,
            'addad_by'=>Auth::id(),
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('update', 'Catagory updated successfull');
    }
}
