@extends('master.admin_app')
@section('title')
    Add Salary
@endsection
@section('content')
    <div class="content">
        <div class="container">
            <!-- Form -->
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">Advance Salary</h3></div>
                    <div class="panel-body">
                        <form role="form" action="{{route('salary.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="emp_id">Employee</label><span class="text-danger">*</span>
                                        <select name="emp_id" id="emp_id" class="form-control @error('emp_id') is-invalid @enderror" >
                                            <option value=""></option>
                                            @foreach($employees as $employee)
                                                <option value="{{$employee->id}}">{{$employee->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('employee')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="month">Month</label><span class="text-danger">*</span>
                                        <select name="month" id="month" class="form-control">
                                            <option value=""></option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                        @error('month')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="advance_tk">Advance Tk</label><span class="text-danger">*</span>
                                        <input type="number" class="form-control @error('advance_tk') is-invalid @enderror" name="advance_tk" id="advance_tk" placeholder="Enter Amount">
                                        @error('advance_tk')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="year">Year</label><span class="text-danger">*</span>
                                        <input type="number" class="form-control @error('year') is-invalid @enderror" name="year" id="year" placeholder="Enter year">
                                        @error('year')
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
