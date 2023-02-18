@extends('master.admin_app')
@section('title')
    Add Category
@endsection
@section('content')
    <div class="content">
        <div class="container">
            <!-- Form -->
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">Create a Category</h3></div>
                    <div class="panel-body">
                        <form role="form" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ctg_name">Category Name</label><span class="text-danger">*</span>
                                        <select name="cat_id" id="ctg_name" class="form-control">
                                            <option value="">Select One</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->ctg_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('ctg_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sup_name">Supplier Name</label><span class="text-danger">*</span>
                                        <select name="sup_id" id="sup_name" class="form-control">
                                            <option value="">Select One</option>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('sup_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_name">Product Name</label><span class="text-danger">*</span>
                                        <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter Product Name">
                                        @error('product_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_code">Product Code</label><span class="text-danger">*</span>
                                        <input type="number" name="product_code" id="product_code" class="form-control" placeholder="Enter Product Number">
                                        @error('product_code')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_store">Product Store</label><span class="text-danger">*</span>
                                        <input type="text" name="product_store" id="product_store" class="form-control" placeholder="Enter Product Store">
                                        @error('product_store')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Product Image</label><span class="text-danger">*</span>
                                        <input type="file" name="image" id="image" class="form-control">
                                        @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="buy_date">Buy Date</label><span class="text-danger">*</span>
                                        <input type="date" name="buy_date" id="buy_date" class="form-control">
                                        @error('buy_date')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exp_date">Expire Date</label><span class="text-danger">*</span>
                                        <input type="date" name="exp_date" id="exp_date" class="form-control">
                                        @error('exp_date')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="buying_price">Buying Price</label><span class="text-danger">*</span>
                                        <input type="number" name="buying_price" id="buying_price" class="form-control" placeholder="Enter Amount">
                                        @error('buying_price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="selling_price">Selling Price</label><span class="text-danger">*</span>
                                        <input type="number" name="selling_price" id="buying_price" class="form-control" placeholder="Enter Amount">
                                        @error('selling_price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                        </form>
                    </div><!-- panel-body -->
                </div> <!-- panel -->
            </div>
        </div>
    </div>
@endsection
