<?php

use App\Http\Controllers\FlutterwaveTransaction;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\WaitingListController;
use Illuminate\Support\Facades\Route;




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

Route::get('/ssss', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
});


Route::post('/waiting-list', [WaitingListController::class, 'store']);


Route::get('/select-due', [StudentController::class, 'selectDue'])->name('select.due')->middleware('auth:student');

// routes/web.php
Route::get('/payment/callback', [FlutterwaveTransaction::class, 'paymentCallback'])->name('payment.callback');



// Show login form
Route::get('/login', [StudentController::class, 'showLoginForm'])->name('login.form');

// Handle login submission
Route::post('/login', [StudentController::class, 'login'])->name('login');