@extends('master.admin_app')
@section('title')
    Edit Supplier
@endsection
@section('content')
    <div class="content">
        <div class="container">
            <!-- Form -->
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">Edit a Supplier</h3></div>
                    <div class="panel-body">
                        <form role="form" action="{{route('supplier.update',$supplier->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Name</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$supplier->name}}">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label><span class="text-danger">*</span>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$supplier->email}}">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone">Phone</label><span class="text-danger">*</span>
                                        <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{$supplier->phone}}">
                                        @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="shop_name">Shop Name</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('shop_name') is-invalid @enderror" name="shop_name" id="shop_name" value="{{$supplier->shop_name}}">
                                        @error('shop_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="account_holder">Account Holder</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('account_holder') is-invalid @enderror" name="account_holder" id="account_holder" value="{{$supplier->account_holder}}">
                                        @error('account_holder')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="account_number">Account Number</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('account_number') is-invalid @enderror" name="account_number" id="account_number" value="{{$supplier->account_number}}">
                                        @error('account_number')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="bank_name">Bank Name</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" id="bank_name" value="{{$supplier->bank_name}}">
                                        @error('bank_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="city">City</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city" value="{{$supplier->city}}">
                                        @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{$supplier->status==1? 'selected':''}}>Active</option>
                                            <option value="0" {{$supplier->status==0? 'selected':''}}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Image</label><span class="text-danger">*</span>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                                        <img src="{{asset($supplier->image)}}" alt="" width="40" height="50" class="img-thumbnail" style="margin-top: 5px;">
                                        @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Supplier Type</label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="1" {{$supplier->status==1? 'selected':''}}>Distributor</option>
                                            <option value="2" {{$supplier->status==2? 'selected':''}}>Whole Seller</option>
                                            <option value="3" {{$supplier->status==3? 'selected':''}}>Brochure</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" class="form-control" rows="2">{{$supplier->address}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
                        </form>
                    </div><!-- panel-body -->
                </div> <!-- panel -->
            </div>
        </div>
    </div>
@endsection
