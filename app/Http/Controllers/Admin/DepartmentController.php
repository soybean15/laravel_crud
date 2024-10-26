<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
     public function index(){


        return view('admin.department',[
            'user'=>Auth::user(),
            'employees'=>Department::paginate(15)
        ]);
    }
}
