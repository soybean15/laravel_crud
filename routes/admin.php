<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\EmployeeController;
use Illuminate\Support\Facades\Route;



Route::prefix('/')->group(function () {


    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('department')->group(function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('admin.departments');
        Route::delete('/destroy', [DepartmentController::class, 'destroy'])->name('admin.destroy-department');


    });
    Route::prefix('employees')->group(function () {

        Route::get('/', [EmployeeController::class, 'index'])->name('admin.employees');
        Route::get('/{employee}', [EmployeeController::class, 'show'])->name('admin.employee');
        Route::post('update', [EmployeeController::class, 'update'])->name('admin.update-employee');
        Route::delete('destroy', [EmployeeController::class, 'destroy'])->name('admin.destroy-employee');
        Route::post('store', [EmployeeController::class, 'store'])->name('admin.store-employee');




    });
});
