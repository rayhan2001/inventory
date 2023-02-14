@extends('master.admin_app')
@section('title')
    Edit Customer
@endsection
@section('content')
    <div class="content">
        <div class="container">
            <!-- Form -->
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">Edit a Customer</h3></div>
                    <div class="panel-body">
                        <form role="form" action="{{route('customer.update',$customer->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Name</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$customer->name}}">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label><span class="text-danger">*</span>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$customer->email}}">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone">Phone</label><span class="text-danger">*</span>
                                        <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{$customer->phone}}">
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
                                        <input type="text" class="form-control @error('shop_name') is-invalid @enderror" name="shop_name" id="shop_name" value="{{$customer->shop_name}}">
                                        @error('shop_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="account_holder">Account Holder</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('account_holder') is-invalid @enderror" name="account_holder" id="account_holder" value="{{$customer->account_holder}}">
                                        @error('account_holder')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="account_number">Account Number</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('account_number') is-invalid @enderror" name="account_number" id="account_number" value="{{$customer->account_number}}">
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
                                        <input type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" id="bank_name" value="{{$customer->bank_name}}">
                                        @error('bank_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="city">City</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city" value="{{$customer->city}}">
                                        @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{$customer->status==1? 'selected':''}}>Active</option>
                                            <option value="0" {{$customer->status==0? 'selected':''}}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label><span class="text-danger">*</span>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                                <img src="{{asset($customer->image)}}" alt="" width="40" height="50" class="img-thumbnail" style="margin-top: 5px;">
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" class="form-control" rows="2">{{$customer->address}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
                        </form>
                    </div><!-- panel-body -->
                </div> <!-- panel -->
            </div>
        </div>
    </div>
@endsection
