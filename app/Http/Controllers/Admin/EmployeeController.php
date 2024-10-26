<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index(Request $request){
        $query = $request->input('query');
        $employees = Employee::search($query)
        ->paginate(5);
        return view('admin.employees',[
            'user'=>Auth::user(),
            'employees'=>$employees
        ]);
    }

    public function show(Employee $employee){
        return view('admin.employee-profile',[
            'user'=>Auth::user(),
            'employee'=>$employee
        ]);

    }

    public function update(EmployeeRequest $request,Employee $employee){
        $employee->update($request->all());
        return redirect()->route('admin.employee',['employee'=>$employee]);

    }
    public function destroy(Employee $employee){


        $employee->delete();
        return redirect()->route('admin.employees');

    }



}
