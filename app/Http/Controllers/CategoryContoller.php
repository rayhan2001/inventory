<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CategoryContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index',[
            'categories'=>Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'ctg_name' => 'required',

        ]);
        $category = new Category();
        $category->ctg_name = $request->ctg_name;
        $category->save();
        Toastr::success('Category Added Successfully !', '', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.category.edit',[
            'category'=>Category::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'ctg_name' => 'required',

        ]);
        $category = Category::find($id);
        $category->ctg_name = $request->ctg_name;
        $category->status = $request->status;
        $category->save();
        Toastr::success('Category Update Successfully !', '', ["positionClass" => "toast-top-right"]);
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        Toastr::success('Category Delete Successfully !', '', ["positionClass" => "toast-top-right"]);
        return back();
    }
    public function status($id){
        $category = Category::find($id);
        if ($category->status==1){
            $category->status=0;
        }else{
            $category->status=1;
        }
        $category->save();
        Toastr::success('Status Change Successfully !', '', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
