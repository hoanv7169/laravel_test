<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LanguageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customers', [CustomerController::class, 'getList'])->name('customers.getlist');
Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');
Route::put('/customers/update', [CustomerController::class, 'update'])->name('customers.update');

Route::view('/dom', 'dom');

Route::group(['middleware' => 'locale'], function() {
    Route::view('/multiple_language', 'multiple_language');
});

Route::get('change-language/{lang}', [LanguageController::class, 'changeLanguage'])->name('lang');
