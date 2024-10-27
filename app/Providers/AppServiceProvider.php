<?php

namespace App\Providers;

use App\Services\EmployeeService;
use App\View\Components\Admin\EmployeeList;
use App\View\Components\BreadCrumbs;
use App\View\Components\CircleChart;
use App\View\Components\CustomInput;
use App\View\Components\CustomSelect;
use App\View\Components\DonutChart;
use App\View\Components\Statistic;
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
        Blade::component('bread-crumbs', BreadCrumbs::class);
        Blade::component('statistic', Statistic::class);
        Blade::component('donut-chart', DonutChart::class);
        Blade::component('circle-chart',  CircleChart::class);






    }
}
