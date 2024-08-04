<?php

use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\StudentController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(StudentController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::put('update{student}', 'update')->name('update');
    Route::get('edit/{student}', 'edit')->name('edit');
    Route::get('delete/{student}', 'destroy')->name('delete');
    // Route::post('index', 'index')->name('index');
});



// Route::controller(CustomerController::class)->group(function(){
//     Route::get('/', 'customer')->name('customer');
// });


// Route::get('/piechart', [ChartController::class, 'index']);
