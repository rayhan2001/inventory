@extends('master.admin_app')
@section('title')
    Salary List
@endsection
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Salary List</h3>
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
                                            <th>Salary</th>
                                            <th>Advance</th>
                                            <th>Due</th>
                                            <th>Month</th>
                                            <th>Year</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($salaries as $salary)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    @if(!empty($salary->image))
                                                        <img src="{{asset($salary->image)}}" alt="" height="50" width="40" class="img-thumbnail">
                                                    @else
                                                        <img src="{{asset('adminAsset')}}/images/no-img.png" alt="" height="50" width="40">
                                                    @endif
                                                </td>
                                                <td>{{$salary->name}}</td>
                                                <td>{{$salary->salary}}&#2547;</td>
                                                <td>{{$salary->advance_tk}}&#2547;</td>
                                                <td>{{$salary->salary - $salary->advance_tk}}&#2547;</td>
                                                <td>{{$salary->month}}</td>
                                                <td>{{$salary->year}}</td>
                                                <td>
                                                    <a href="{{route('salary.edit',$salary->id)}}" class="btn btn-primary"><i class="md-edit"></i></a>
                                                    <form action="{{route('salary.destroy',$salary->id)}}" method="post" style="display: inline-block">
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
