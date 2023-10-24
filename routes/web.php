<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['as'=>'pdf.'],function(){

    Route::get('/',[PDFController::class,'index'])->name('index');
    Route::get('/create/{id?}',[PDFController::class,'create'])->name('create');
    Route::post('/store',[PDFController::class,'store'])->name('store');
    Route::get('/generate/{id}',[PDFController::class,'generatePDF'])->name('generate');
    Route::get('/email/notification',[PDFController::class,'sendEmail'])->name('email');
});
