<?php

namespace App\Providers;

use App\View\Components\Admin\EmployeeList;
use App\View\Components\CustomInput;
use App\View\Components\CustomSelect;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
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
