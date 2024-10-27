<?php

namespace App\Providers;

use App\View\Components\Admin\AddEmployeeModal;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class EmployeeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    const EMPLOYEE_CODE_PREFIX='EM';
    const EMPLOYEE_CODE_LEN=7;

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        Blade::component(AddEmployeeModal::class,'add-employee');
    }
}
