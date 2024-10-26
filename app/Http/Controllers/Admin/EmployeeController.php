<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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


}
