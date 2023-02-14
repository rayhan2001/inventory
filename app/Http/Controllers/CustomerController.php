<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.customer.index',[
            'customers'=>Customer::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
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
            'image' => 'required',

        ]);
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->shop_name = $request->shop_name;
        $customer->account_holder = $request->account_holder;
        $customer->account_number = $request->account_number;
        $customer->bank_name = $request->bank_name;
        $customer->city = $request->city;
        $customer->image = $this->saveImage($request);
        $customer->address = $request->address;
        $customer->save();
        Toastr::success('Customer Added Successfully !', '', ["positionClass" => "toast-top-right"]);
        return back();
    }
    public function saveImage($request){
        $image = $request->file('image');
        $imageName = rand().'.'.$image->getClientOriginalExtension();
        $directory = 'upload/customer/';
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
        return view('admin.customer.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.customer.edit',[
            'customer'=>Customer::find($id),
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
            'image' => 'required',

        ]);
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->shop_name = $request->shop_name;
        $customer->account_holder = $request->account_holder;
        $customer->account_number = $request->account_number;
        $customer->bank_name = $request->bank_name;
        $customer->city = $request->city;
        if ($request->file('image')){
            if ($customer->image !=null){
                unlink($customer->image);
            }
            $customer->image = $this->saveImage($request);
        }
        $customer->address = $request->address;
        $customer->status = $request->status;
        $customer->save();
        Toastr::success('Customer Update Successfully !', '', ["positionClass" => "toast-top-right"]);
        return redirect(route('customer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        if ($customer->image){
            unlink($customer->image);
        }
        $customer->delete();
        Toastr::success('Customer Delete Successfully !', '', ["positionClass" => "toast-top-right"]);
        return back();
    }
    public function status($id){
        $customer = Customer::find($id);
        if ($customer->status==1){
            $customer->status=0;
        }else{
            $customer->status=1;
        }
        $customer->save();
        Toastr::success('Status Change Successfully !', '', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
