<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::prefix('/')->group(function () {


    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/department', [DepartmentController::class, 'index'])->name('admin.department');

    Route::prefix('/employees')->group(function () {

        Route::get('/', [EmployeeController::class, 'index'])->name('admin.employees');
        Route::get('/{employee}', [EmployeeController::class, 'show'])->name('admin.employee');
        Route::post('update/{employee}', [EmployeeController::class, 'update'])->name('admin.update-employee');


    });
});
