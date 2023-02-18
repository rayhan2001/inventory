<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('products')
            ->join('categories','products.cat_id','=','categories.id')
            ->join('suppliers','products.sup_id','=','suppliers.id')
            ->select('products.*','categories.ctg_name','suppliers.name')
            ->where('categories.status',1)
            ->where('suppliers.status',1)
            ->get();

//        dd($product);
        return view('admin.product.index',[
            'products'=>$product,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create',[
            'categories'=>Category::where('status',1)->get(),
            'suppliers'=>Supplier::where('status',1)->get(),
        ]);
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
            'cat_id' => 'required',
            'sup_id' => 'required',
            'product_name' => 'required',
            'product_code' => 'required|max:5',
            'product_store' => 'required',
            'image' => 'required',
            'buy_date' => 'date',
            'exp_date' => 'required',
            'buying_price' => 'required|numeric|digits_between:1,12',
            'selling_price' => 'required|numeric|digits_between:1,12',

        ]);
        $product = new Product();
        $product->cat_id  = $request->cat_id;
        $product->sup_id = $request->sup_id;
        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->product_store = $request->product_store;
        $product->image = $this->saveImage($request);
        $product->buy_date = $request->buy_date;
        $product->exp_date = $request->exp_date;
        $product->buying_price = $request->buying_price;
        $product->selling_price = $request->selling_price;
        $product->description = $request->description;
        $product->save();
        Toastr::success('Product Added Successfully !', '', ["positionClass" => "toast-top-right"]);
        return back();
    }
    public function saveImage($request){
        $image = $request->file('image');
        $imageName = rand().'.'.$image->getClientOriginalExtension();
        $directory = 'upload/product/';
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
        return view('admin.product.edit',[
            'categories'=>Category::where('status',1)->get(),
            'suppliers'=>Supplier::where('status',1)->get(),
            'product'=>Product::find($id)
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
            'cat_id' => 'required',
            'sup_id' => 'required',
            'product_name' => 'required',
            'product_code' => 'required|max:5',
            'product_store' => 'required',
            'image' => 'required',
            'buy_date' => 'date',
            'exp_date' => 'required',
            'buying_price' => 'required|numeric|digits_between:1,12',
            'selling_price' => 'required|numeric|digits_between:1,12',

        ]);
        $product = Product::find($id);
        $product->cat_id  = $request->cat_id;
        $product->sup_id = $request->sup_id;
        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->product_store = $request->product_store;
        if ($request->file('image')){
            if ($product->image !=null){
                unlink($product->image);
            }
            $product->image = $this->saveImage($request);
        }
        $product->buy_date = $request->buy_date;
        $product->exp_date = $request->exp_date;
        $product->buying_price = $request->buying_price;
        $product->selling_price = $request->selling_price;
        $product->description = $request->description;
        $product->save();
        Toastr::success('Product Update Successfully !', '', ["positionClass" => "toast-top-right"]);
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->image){
            unlink($product->image);
        }
        $product->delete();
        Toastr::warning('Product Delete Successfully !', '', ["positionClass" => "toast-top-right"]);
        return back();
    }
    public function status($id){
        $product = Product::find($id);
        if ($product->status==1){
            $product->status=0;
        }else{
            $product->status=1;
        }
        $product->save();
        Toastr::info('Status Change Successfully !', '', ["positionClass" => "toast-top-right"]);
        return back();
    }
}





