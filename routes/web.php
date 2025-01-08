<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/process-payment', [AuthController::class, 'showProcessPaymentPage'])->name('processPayment');
Route::post('/process-payment', [AuthController::class, 'processPayment'])->name('processPayment');
Route::post('/confirm-overpayment', [AuthController::class, 'confirmOverpayment'])->name('confirmOverpayment');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('home');
})->name('home');


