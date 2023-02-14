<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.supplier.index',[
            'suppliers'=>Supplier::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier.create');
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
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|max:11',
            'shop_name' => 'required',
            'account_holder' => 'required',
            'account_number' => 'required|max:8',
            'bank_name' => 'required',
            'city' => 'required',
            'type' => 'required',
            'image' => 'required',

        ]);
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->shop_name = $request->shop_name;
        $supplier->account_holder = $request->account_holder;
        $supplier->account_number = $request->account_number;
        $supplier->bank_name = $request->bank_name;
        $supplier->city = $request->city;
        $supplier->image = $this->saveImage($request);
        $supplier->type = $request->type;
        $supplier->address = $request->address;
        $supplier->save();
        Toastr::success('Supplier Added Successfully !', '', ["positionClass" => "toast-top-right"]);
        return back();
    }
    public function saveImage($request){
        $image = $request->file('image');
        $imageName = rand().'.'.$image->getClientOriginalExtension();
        $directory = 'upload/supplier/';
        $imageUrl = $directory.$imageName;
        $image->move($directory,$imageName);
        return $imageUrl;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.supplier.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.supplier.edit',[
            'supplier'=>Supplier::find($id),
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
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|max:11',
            'shop_name' => 'required',
            'account_holder' => 'required',
            'account_number' => 'required|max:8',
            'bank_name' => 'required',
            'city' => 'required',
            'type' => 'required',
            'image' => 'required',

        ]);
        $supplier = Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->shop_name = $request->shop_name;
        $supplier->account_holder = $request->account_holder;
        $supplier->account_number = $request->account_number;
        $supplier->bank_name = $request->bank_name;
        $supplier->city = $request->city;
        if ($request->file('image')){
            if ($supplier->image !=null){
                unlink($supplier->image);
            }
            $supplier->image = $this->saveImage($request);
        }
        $supplier->type = $request->type;
        $supplier->address = $request->address;
        $supplier->status = $request->status;
        $supplier->save();
        Toastr::success('Supplier Update Successfully !', '', ["positionClass" => "toast-top-right"]);
        return redirect(route('supplier.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        if ($supplier->image){
            unlink($supplier->image);
        }
        $supplier->delete();
        Toastr::success('Supplier Delete Successfully !', '', ["positionClass" => "toast-top-right"]);
        return back();
    }
    public function status($id){
        $supplier = Supplier::find($id);
        if ($supplier->status==1){
            $supplier->status=0;
        }else{
            $supplier->status=1;
        }
        $supplier->save();
        Toastr::success('Status Change Successfully !', '', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
