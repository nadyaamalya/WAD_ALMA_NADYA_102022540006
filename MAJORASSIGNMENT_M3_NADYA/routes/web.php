<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EmployeeController::class, 'index']) -> name('employee.index');
Route::get('/employees/create', [EmployeeController::class, 'create']) -> name('employee.create');
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit']) -> name('employee.edit');

  
Route::post('/employees', [EmployeeController::class, 'store']) -> name('employee.store');

Route::put('/employees/{id}', [EmployeeController::class, 'update']) -> name('employee.update');

Route::delete('/employees/{id}', [EmployeeController::class, 'destroy']) ->name('employee.destroy');




