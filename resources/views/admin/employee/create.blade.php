@extends('master.admin_app')
@section('title')
    Add Employee
@endsection
@section('content')
    <div class="content">
        <div class="container">
            <!-- Form -->
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">Create a employee</h3></div>
                    <div class="panel-body">
                        <form role="form" action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Name</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter name">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label><span class="text-danger">*</span>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter email">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone">Phone</label><span class="text-danger">*</span>
                                        <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Enter phone">
                                        @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="experience">Experience</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('experience') is-invalid @enderror" name="experience" id="experience" placeholder="Enter experience">
                                        @error('experience')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nid">Nid no</label><span class="text-danger">*</span>
                                        <input type="number" class="form-control @error('nid') is-invalid @enderror" name="nid" id="nid" placeholder="Enter nid no">
                                        @error('nid')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="salary">Salary</label><span class="text-danger">*</span>
                                        <input type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" id="salary" placeholder="Enter salary">
                                        @error('salary')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="vacation">Vacation</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('vacation') is-invalid @enderror" name="vacation" id="vacation" placeholder="Enter vacation">
                                        @error('vacation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="city">City</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city" placeholder="Enter city">
                                        @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="join_date">Join Date</label><span class="text-danger">*</span>
                                        <input type="date" class="form-control @error('join_date') is-invalid @enderror" name="join_date" id="join_date" placeholder="Enter join date">
                                        @error('join_date')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label><span class="text-danger">*</span>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
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
