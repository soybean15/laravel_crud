<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index(Request $request,EmployeeService $service){
        $query = $request->input('query');

        $employees =$service->getEmployees($query);

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

    public function store(EmployeeService $service,EmployeeRequest $request){


       $employee= $service->store($request->all());

        if ($employee) {
            return response()->json(['success' => true,'message' => 'Employee added successfully!']);
        } else {
            return response()->json(['success' => false], 500);
        }


    }

    public function update(EmployeeService $service,EmployeeRequest $request,Employee $employee){
        $service->update($employee,$request->all());
        return redirect()->route('admin.employee',['employee'=>$employee])
        ->with('success_message','Employee Updated!');

    }
    public function destroy(Employee $employee){
        $employee->delete();
        return redirect()->route('admin.employees')
        ->with('success_message','Employee Deleted!');;

    }



}
