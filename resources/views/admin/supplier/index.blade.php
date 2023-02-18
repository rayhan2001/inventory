@extends('master.admin_app')
@section('title')
    Supplier List
@endsection
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Supplier List</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Shop Name</th>
                                            <th>Bank Name</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($suppliers as $supplier)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    @if(!empty($supplier->image))
                                                        <img src="{{asset($supplier->image)}}" alt="" height="50" width="40" class="img-circle">
                                                    @else
                                                        <img src="{{asset('adminAsset')}}/images/no-img.png" alt="" height="50" width="40">
                                                    @endif
                                                </td>
                                                <td>{{$supplier->name}}</td>
                                                <td>{{$supplier->email}}</td>
                                                <td>{{$supplier->phone}}</td>
                                                <td>{{$supplier->shop_name}}</td>
                                                <td>{{$supplier->bank_name}}</td>
                                                <td>{{substr($supplier->address,0,20)}}</td>
                                                <td>
                                                    <span class="{{$supplier->status==1? 'text-primary':'text-danger'}}">{{$supplier->status==1? 'Active':'Inactive'}}</span>
                                                </td>
                                                <td>
                                                    @if($supplier->status==1)
                                                        <a href="{{route('supplier.status',$supplier->id)}}" class="btn btn-info"><i class="md-thumb-up"></i></a>
                                                    @else
                                                        <a href="{{route('supplier.status',$supplier->id)}}" class="btn btn-warning"><i class="md-thumb-down"></i></a>
                                                    @endif

                                                    <a href="{{route('supplier.show',$supplier->id)}}" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal"><i class="md-visibility"></i></a>

                                                    <a href="{{route('supplier.edit',$supplier->id)}}" class="btn btn-primary"><i class="md-edit"></i></a>
                                                    <form action="{{route('supplier.destroy',$supplier->id)}}" method="post" style="display: inline-block">
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

    {{--    ======Modal=====--}}
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">All supplier list</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="field-5" class="control-label">Image</label><br>
                            <img src="{{asset($supplier->image)}}" alt="" width="100" height="100" class="img-thumbnail">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-4" class="control-label">Name</label>
                                <input type="text" disabled class="form-control" id="field-4" value="{{$supplier->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-5" class="control-label">Email</label>
                                <input type="text" disabled class="form-control" id="field-5" value="{{$supplier->email}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-4" class="control-label">Phone</label>
                                <input type="text" disabled class="form-control" id="field-4" value="{{$supplier->phone}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-5" class="control-label">Shop Name</label>
                                <input type="text" disabled class="form-control" id="field-5" value="{{$supplier->shop_name}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-4" class="control-label">Account Holder</label>
                                <input type="text" disabled class="form-control" id="field-4" value="{{$supplier->account_holder}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-5" class="control-label">Account Number</label>
                                <input type="text" disabled class="form-control" id="field-5" value="{{$supplier->account_number}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-4" class="control-label">Bank Name</label>
                                <input type="text" disabled class="form-control" id="field-4" value="{{$supplier->bank_name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-5" class="control-label">City</label>
                                <input type="text" disabled class="form-control" id="field-5" value="{{$supplier->city}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="type">Supplier Type</label>
                                <select name="type" id="type" class="form-control" disabled>
                                    <option value="1" {{$supplier->status==1? 'selected':''}}>Distributor</option>
                                    <option value="2" {{$supplier->status==2? 'selected':''}}>Whole Seller</option>
                                    <option value="3" {{$supplier->status==3? 'selected':''}}>Brochure</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group no-margin">
                                <label for="address" class="control-label">Address</label>
                                <textarea disabled class="form-control" rows="3">{{$supplier->address}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->
@endsection
