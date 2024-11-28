<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard/user-dashboard', [DashboardController::class, 'index'])->middleware('auth');


Route::get('/transactions/generate-pdf', [PdfController::class, 'generatePdf'])->name('transactions.generate-pdf');


// Rute login dan lainnya




