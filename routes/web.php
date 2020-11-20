<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketStatusController;
use App\Http\Controllers\TicketUpdateController;
use App\Http\Controllers\SendEmailController;
use Illuminate\Http\Request;
use App\Http\Controllers\SearchController;

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

Route::get('/tickets', [TicketController::class, 'index'])->middleware('auth');
Route::get('/tickets/create', [TicketController::class, 'create']);
Route::post('/tickets', [TicketController::class, 'store']);
Route::get('/ticketstatus', [TicketStatusController::class, 'index']);
Route::post('/ticketstatus', [TicketStatusController::class, 'store']);
Route::post('/ticketupdate', [TicketUpdateController::class, 'store']);
Route::get('/ticketstatus/{id}', [TicketStatusController::class, 'show']);
Route::get('/tickets/{id}', [TicketController::class, 'show']);
Route::get('/sendemail', [SendEmailController::class,'index']);
Route::post('/sendemail/send', [SendEmailController::class, 'send']);
Route::post('/search', [SearchController::class, 'filter']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
