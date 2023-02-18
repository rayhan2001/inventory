@extends('master.admin_app')
@section('title')
    Edit Salary
@endsection
@section('content')
    <div class="content">
        <div class="container">
            <!-- Form -->
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">Edit Salary</h3></div>
                    <div class="panel-body">
                        <form role="form" action="{{route('salary.update',$salary->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="emp_id">Employee</label><span class="text-danger">*</span>
                                        <select name="emp_id" id="emp_id" class="form-control @error('emp_id') is-invalid @enderror" >
                                            <option value=""></option>
                                            @foreach($employees as $employee)
                                                <option value="{{$employee->id}}" {{$salary->emp_id==$employee->id? 'selected':''}}>{{$employee->name}}</option>
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
                                            <option value="January"{{$salary->month=='January'? 'selected':''}}>January</option>
                                            <option value="February" {{$salary->month=='February'? 'selected':''}}>February</option>
                                            <option value="March" {{$salary->month=='March'? 'selected':''}}>March</option>
                                            <option value="April" {{$salary->month=='April'? 'selected':''}}>April</option>
                                            <option value="May" {{$salary->month=='May'? 'selected':''}}>May</option>
                                            <option value="June" {{$salary->month=='June'? 'selected':''}}>June</option>
                                            <option value="July" {{$salary->month=='July'? 'selected':''}}>July</option>
                                            <option value="August" {{$salary->month=='August'? 'selected':''}}>August</option>
                                            <option value="September" {{$salary->month=='September'? 'selected':''}}>September</option>
                                            <option value="October" {{$salary->month=='October'? 'selected':''}}>October</option>
                                            <option value="November" {{$salary->month=='November'? 'selected':''}}>November</option>
                                            <option value="December" {{$salary->month=='December'? 'selected':''}}>December</option>
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
                                        <input type="number" class="form-control @error('advance_tk') is-invalid @enderror" name="advance_tk" id="advance_tk" value="{{$salary->advance_tk}}">
                                        @error('advance_tk')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="year">Year</label><span class="text-danger">*</span>
                                        <input type="number" class="form-control @error('year') is-invalid @enderror" name="year" id="year" value="{{$salary->year}}">
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
