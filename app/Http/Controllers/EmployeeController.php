<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.employee.index',[
            'employees'=>Employee::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.create');
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
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|max:11',
            'experience' => 'required',
            'nid' => 'required|max:8',
            'salary' => 'required',
            'vacation' => 'required',
            'city' => 'required',
            'join_date' => 'required',
            'image' => 'required',

        ]);
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->experience = $request->experience;
        $employee->nid = $request->nid;
        $employee->salary = $request->salary;
        $employee->vacation = $request->vacation;
        $employee->city = $request->city;
        $employee->join_date = $request->join_date;
        $employee->image = $this->saveImage($request);
        $employee->address = $request->address;
        $employee->save();
        Toastr::success('Employee Added Successfully !', '', ["positionClass" => "toast-top-right"]);
        return back();
    }
    public function saveImage($request){
        $image = $request->file('image');
        $imageName = rand().'.'.$image->getClientOriginalExtension();
        $directory = 'upload/employee/';
        $imageUrl = $directory.$imageName;
        $image->move($directory,$imageName);
        return $imageUrl;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.employee.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.employee.edit',[
            'employee'=>Employee::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|max:11',
            'experience' => 'required',
            'nid' => 'required|max:8',
            'salary' => 'required',
            'vacation' => 'required',
            'city' => 'required',
            'join_date' => 'required',
            'image' => 'required',

        ]);
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->experience = $request->experience;
        $employee->nid = $request->nid;
        $employee->salary = $request->salary;
        $employee->vacation = $request->vacation;
        $employee->city = $request->city;
        $employee->join_date = $request->join_date;
        if ($request->file('image')){
            if ($employee->image !=null){
                unlink($employee->image);
            }
            $employee->image = $this->saveImage($request);
        }
        $employee->status = $request->status;
        $employee->address = $request->address;
        $employee->save();
        Toastr::success('Employee Update Successfully !', '', ["positionClass" => "toast-top-right"]);
        return redirect(route('employee.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        if ($employee->image){
            unlink($employee->image);
        }
        $employee->delete();
        Toastr::success('Employee Delete Successfully !', '', ["positionClass" => "toast-top-right"]);
        return back();
    }
    public function status($id){
        $employee = Employee::find($id);
        if ($employee->status==1){
            $employee->status=0;
        }else{
            $employee->status=1;
        }
        $employee->save();
        Toastr::success('Status Change Successfully !', '', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
