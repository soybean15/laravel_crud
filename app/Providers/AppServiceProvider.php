<?php

namespace App\Providers;

use App\Services\EmployeeService;
use App\View\Components\Admin\EmployeeList;
use App\View\Components\CustomInput;
use App\View\Components\CustomSelect;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->singleton(EmployeeService::class, function (Application $app) {
            return new EmployeeService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Blade::component('employee-list', EmployeeList::class);

        Blade::component('input', CustomInput::class);
        Blade::component('select', CustomSelect::class);


    }
}
