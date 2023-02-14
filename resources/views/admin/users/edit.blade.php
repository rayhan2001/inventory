@extends('master.admin_app')
@section('title')
    Edit User
@endsection
@section('content')
    <div class="content">
        <div class="container">
            <!-- Form -->
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">Update Profile</h3></div>
                    <div class="panel-body">
                        <form role="form" action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="image">Image</label><span class="text-danger">*</span>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$user->name}}">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label><span class="text-danger">*</span>
                                        <input type="email" class="form-control" id="email" value="{{$user->email}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subtitle">Subtitle</label>
                                        <select name="subtitle" id="type" class="form-control">
                                            <option {{$user->subtitle == 'Employee' ? 'selected' : ''}} value="Employee">Employee</option>
                                            <option {{$user->subtitle == 'Customer' ? 'selected' : ''}} value="Customer">Customer</option>
                                            <option {{$user->subtitle == 'Supplier' ? 'selected' : ''}} value="Supplier">Supplier</option>
                                        </select>
                                        @error('subtitle')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label><span class="text-danger">*</span>
                                        <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Enter phone">
                                        @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @if(Auth::user()->id==$user->id)
                            <div class="form-group">
                                <label for="password">Password</label><span class="text-danger">*</span>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{$user->password}}">
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" class="form-control" rows="2"></textarea>
                            </div>
                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                        </form>
                    </div><!-- panel-body -->
                </div> <!-- panel -->
            </div>
        </div>
    </div>
@endsection
