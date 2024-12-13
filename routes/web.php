<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DemoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return response('welcome2');
});
Route::get('/about2', [AboutController::class, 'aboutme']);
//Route::get('/download/invoice/{id}', [AboutController::class, 'downloadInvoice']);
Route::get('/download/invoice/{invoiceId}/type/{type?}', [AboutController::class, 'downloadInvoiceType']);
Route::get('/invoice/{invoiceId}', [AboutController::class, 'invoice']);
Route::get('/request', [AboutController::class, 'requestExample']);
Route::get('/demo-response', [DemoController::class, 'demoResponse']);
Route::post('/demo-request', [DemoController::class, 'demoRequest']);
Route::post('/demo-request/{name}/{city}', [DemoController::class, 'demoRequest']);