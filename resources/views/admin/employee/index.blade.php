@extends('master.admin_app')
@section('title')
    Employee List
@endsection
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Employee List</h3>
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
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($employees as $employee)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                @if(!empty($employee->image))
                                                    <img src="{{asset($employee->image)}}" alt="" height="50" width="40" class="img-circle">
                                                @else
                                                    <img src="{{asset('adminAsset')}}/images/no-img.png" alt="" height="50" width="40">
                                                @endif
                                            </td>
                                            <td>{{$employee->name}}</td>
                                            <td>{{$employee->email}}</td>
                                            <td>{{$employee->phone}}</td>
                                            <td>{{substr($employee->address,0,20)}}</td>
                                            <td>
                                                <span class="{{$employee->status==1? 'text-primary':'text-danger'}}">{{$employee->status==1? 'Active':'Inactive'}}</span>
                                            </td>
                                            <td>
                                                @if($employee->status==1)
                                                <a href="{{route('employee.status',$employee->id)}}" class="btn btn-info"><i class="md-thumb-up"></i></a>
                                                @else
                                                <a href="{{route('employee.status',$employee->id)}}" class="btn btn-warning"><i class="md-thumb-down"></i></a>
                                                @endif

                                                <a href="{{route('employee.show',$employee->id)}}" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal"><i class="md-visibility"></i></a>

                                                <a href="{{route('employee.edit',$employee->id)}}" class="btn btn-primary"><i class="md-edit"></i></a>
                                                <form action="{{route('employee.destroy',$employee->id)}}" method="post" style="display: inline-block">
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
                    <h4 class="modal-title">All employee list</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="field-5" class="control-label">Image</label><br>
                                @if(!empty($employee->image))
                                    <img src="{{asset($employee->image)}}" alt="" width="100" height="100" class="img-thumbnail">
                                @else
                                    <img src="{{asset('adminAsset')}}/images/no-img.png" alt="" height="100" width="100" class="img-thumbnail">
                                @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-4" class="control-label">Name</label>
                                <input type="text" disabled class="form-control" id="field-4" value="{{$employee->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-5" class="control-label">Email</label>
                                <input type="text" disabled class="form-control" id="field-5" value="{{$employee->email}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-4" class="control-label">Phone</label>
                                <input type="text" disabled class="form-control" id="field-4" value="{{$employee->phone}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-5" class="control-label">Experience</label>
                                <input type="text" disabled class="form-control" id="field-5" value="{{$employee->experience}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-4" class="control-label">Nid no</label>
                                <input type="text" disabled class="form-control" id="field-4" value="{{$employee->nid}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-5" class="control-label">Salary</label>
                                <input type="text" disabled class="form-control" id="field-5" value="{{$employee->salary}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-4" class="control-label">Join Date</label>
                                <input type="text" disabled class="form-control" id="field-4" value="{{$employee->join_date}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-4" class="control-label">Vacation</label>
                                <input type="text" disabled class="form-control" id="field-4" value="{{$employee->vacation}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-5" class="control-label">City</label>
                                <input type="text" disabled class="form-control" id="field-5" value="{{$employee->city}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group no-margin">
                                <label for="address" class="control-label">Address</label>
                                <textarea disabled class="form-control" rows="3">{{$employee->address}}</textarea>
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
