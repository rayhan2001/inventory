@extends('master.admin_app')
@section('title')
    User List
@endsection
@section('content')
    <div class="content">
        <div class="container">
            <!-- Form -->
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">User Profile</h3></div>
                    <div class="panel-body">
                            <div class="form-group">
                                <label for="image">Image</label><br>
                                <img src="{{asset($user->image)}}" alt="" width="90" height="100" class="img-thumbnail">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <p>{{$user->name}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <p>{{$user->email}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subtitle">Subtitle</label>
                                        <p>{{$user->subtitle}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <p>{{$user->phone}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <p>{{$user->address}}</p>
                            </div>
                            <a href="{{route('dashboard')}}" class="btn btn-purple waves-effect waves-light">Back</a>
                    </div><!-- panel-body -->
                </div> <!-- panel -->
            </div>
        </div>
    </div>
@endsection
