<?php

namespace App\Services;

use App\Helpers\IdGenerator;
use App\Models\Department;
use App\Models\Employee;
use App\Providers\EmployeeServiceProvider;
use Illuminate\Pagination\LengthAwarePaginator;

class EmployeeService{


    protected $perPage = 5;

    public function getEmployees($search): LengthAwarePaginator {

       return Employee::search($search)
        ->paginate($this->perPage);


    }

    public function store($data){

        // dd($data);
        $data['employee_code'] = IdGenerator::generateId(EmployeeServiceProvider::EMPLOYEE_CODE_PREFIX,EmployeeServiceProvider::EMPLOYEE_CODE_LEN);
        $employee = Employee::create($data);


        return $employee;


    }

    public function update($employee_id, $data){



        $employee= Employee::find($employee_id);

        $employee->update($data);
        return $employee;


    }



}
