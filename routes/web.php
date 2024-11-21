<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/transactions/generate-pdf', [PdfController::class, 'generatePdf'])->name('transactions.generate-pdf');



