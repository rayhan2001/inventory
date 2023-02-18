@extends('master.admin_app')
@section('title')
    Add Category
@endsection
@section('content')
    <div class="content">
        <div class="container">
            <!-- Form -->
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">Create a Category</h3></div>
                    <div class="panel-body">
                        <form role="form" action="{{route('category.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="ctg_name">Category Name</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('ctg_name') is-invalid @enderror" name="ctg_name" id="ctg_name" placeholder="Enter a category name">
                                        @error('ctg_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                        </form>
                    </div><!-- panel-body -->
                </div> <!-- panel -->
            </div>
        </div>
    </div>
@endsection
