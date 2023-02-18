@extends('master.admin_app')
@section('title')
    Product List
@endsection
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Product List</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Image</th>
                                            <th>Category Name</th>
                                            <th>Supplier Name</th>
                                            <th>Product Name</th>
                                            <th>Buy Date</th>
                                            <th>Expire Date</th>
                                            <th>Buying Price</th>
                                            <th>Selling Price</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    @if(!empty($product->image))
                                                    <img src="{{asset($product->image)}}" alt="" height="50" width="40" class="img-circle">
                                                    @else
                                                        <img src="{{asset('adminAsset')}}/images/no-img.png" alt="" height="50" width="40">
                                                    @endif
                                                </td>
                                                <td>{{$product->ctg_name}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->buy_date}}</td>
                                                <td>{{$product->exp_date}}</td>
                                                <td>{{$product->buying_price}}</td>
                                                <td>{{$product->selling_price}}</td>
                                                <td>{{substr($product->description,0,20)}}</td>
                                                <td>
                                                    <span class="{{$product->status==1? 'text-primary':'text-danger'}}">{{$product->status==1? 'Active':'Inactive'}}</span>
                                                </td>
                                                <td>
                                                    @if($product->status==1)
                                                        <a href="{{route('product.status',$product->id)}}" class="btn btn-info"><i class="md-thumb-up"></i></a>
                                                    @else
                                                        <a href="{{route('product.status',$product->id)}}" class="btn btn-warning"><i class="md-thumb-down"></i></a>
                                                    @endif
                                                    <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary"><i class="md-edit"></i></a>
                                                    <form action="{{route('product.destroy',$product->id)}}" method="post" style="display: inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')"><i class="md-delete"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- End Row -->


        </div> <!-- container -->

    </div>
@endsection
