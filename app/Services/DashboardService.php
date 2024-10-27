<?php

namespace App\Services;

use App\Enum\EmployeeStatusEnum;
use App\Models\Department;
use App\Models\Employee;

class DashboardService{



    protected $employees;



    public function __construct(){

        $this->employees  = Employee::select('id','status')->get();


    }

    public function getTotalEmployees(){

        return $this->employees->count();

    }

    public function getActiveCount(){
        return $this->employees->where('status',EmployeeStatusEnum::ACTIVE->value)->count();
    }

    public function getInactiveCount(){
        return $this->employees->where('status',EmployeeStatusEnum::INACTIVE->value)->count();
    }

    public function getAwolCount(){
        return $this->employees->where('status',EmployeeStatusEnum::AWOL->value)->count();
    }

    public function getEmployeeByDepartment(){

        $options = [
            'series'=>[],
            'labels'=>[]
        ];


      Department::all()->each(function($department) use (&$options){

            $name = $department->name;
            $employee_count = $department->employees()->count();

            $options['series'][]=$employee_count;
            $options['labels'][]=$name;

        });
        return $options;


    }

    public function getEmployeeStatusData()
    {

        $series = [
            $this->getActiveCount(),
            $this->getInactiveCount(),
            $this->getAwolCount()
        ];

        $labels = [
            'Active',
            'Inactive',
            'Awol'
        ];

        $colors = [
            '#28a745',
            '#6c757d',
            '#fd7e14'   
        ];


        return [
            'series' => $series,
            'labels' => $labels,
            'colors' => $colors
        ];
    }

}
