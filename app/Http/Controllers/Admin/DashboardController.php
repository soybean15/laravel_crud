<?php

namespace App\Http\Controllers\Admin;

use App\Enum\EmployeeStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Services\DashboardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{


    public function index(DashboardService $service){

        return view('admin.dashboard',[
            'user'=>Auth::user(),
            'employee_count'=>$service->getTotalEmployees(),
            'active_count'=>$service->getActiveCount(),
            'inactive_count'=>$service->getInactiveCount(),
            'awol_count'=>$service->getAwolCount(),
            'employees_by_department_options'=>$service->getEmployeeByDepartment(),
            'employee_status_options'=>$service->getEmployeeStatusData()
        ]);
    }
}
