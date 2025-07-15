<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveRequestController;

Route::middleware('api')->group(function () {
    Route::apiResource('employees', EmployeeController::class);
    Route::apiResource('leave-requests', LeaveRequestController::class);
});
