<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{


    public function index(){


        return view('admin.dashboard',[
            'user'=>Auth::user(),
            'employee_count'=>Employee::count()
        ]);
    }
}
