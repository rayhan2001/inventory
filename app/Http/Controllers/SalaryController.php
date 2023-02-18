<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salary = DB::table('salaries')
            ->join('employees','salaries.emp_id','=','employees.id')
            ->select('salaries.*','employees.name','employees.salary','employees.image')
            ->get();
        return view('admin.salary.index',[
            'salaries'=>$salary
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.salary.create',[
            'employees'=>Employee::where('status',1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'emp_id' => 'required',
            'month' => 'required',
            'advance_tk' => 'required|max:5',
            'year' => 'required|max:4',

        ]);
        $advance =DB::table('salaries')
            ->where('emp_id',$request->emp_id)
            ->where('month',$request->month)
            ->first();
        if ($advance ===null){
            $salary = new Salary();
            $salary->emp_id = $request->emp_id;
            $salary->month = $request->month;
            $salary->advance_tk = $request->advance_tk;
            $salary->year = $request->year;
            $salary->save();
            Toastr::success('Salary Added Successfully !', '', ["positionClass" => "toast-top-right"]);
            return back();
        }else{
            Toastr::success('Advance Salary Already Paid This Month!!', '', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.salary.edit',[
            'salary'=>Salary::find($id),
            'employees'=>Employee::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
