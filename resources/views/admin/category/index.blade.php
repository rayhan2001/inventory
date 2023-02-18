@extends('master.admin_app')
@section('title')
    Category List
@endsection
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Category List</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$category->ctg_name}}</td>
                                                <td>
                                                    <span class="{{$category->status==1? 'text-primary':'text-danger'}}">{{$category->status==1? 'Active':'Inactive'}}</span>
                                                </td>
                                                <td>
                                                    @if($category->status==1)
                                                        <a href="{{route('category.status',$category->id)}}" class="btn btn-info"><i class="md-thumb-up"></i></a>
                                                    @else
                                                        <a href="{{route('category.status',$category->id)}}" class="btn btn-warning"><i class="md-thumb-down"></i></a>
                                                    @endif
                                                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary"><i class="md-edit"></i></a>
                                                    <form action="{{route('category.destroy',$category->id)}}" method="post" style="display: inline-block">
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
