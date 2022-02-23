<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Book;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//admin Routes





Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::post('password/email',[App\Http\Controllers\Auth\ForgotPasswordController::class, 'forgot']);
Route::post('password/reset',[App\Http\Controllers\Auth\ForgotPasswordController::class, 'reset']);


Route::post('/save-token', [App\Http\Controllers\Book::class, 'saveToken'])->name('save-token');
Route::post('/send-notification', [App\Http\Controllers\Book::class, 'sendNotification'])->name('send.notification');

Route::post('user/update/{id?}', [App\Http\Controllers\UserController::class, 'update']);
Route::get('user/{id?}', [App\Http\Controllers\UserController::class, 'show']);
Route::post('user/showall', [App\Http\Controllers\UserController::class, 'showall']);
Route::post('report/all', [App\Http\Controllers\UserController::class, 'report']);
Route::post('driver/order/{id}', [App\Http\Controllers\Book::class, 'assigndriver']);
Route::get('order/{id?}', [App\Http\Controllers\Book::class, 'showbyid']);

Route::post('book/create_order', [App\Http\Controllers\Book::class, 'store'])->name('book');
Route::post('book/create_order_test', [App\Http\Controllers\Book::class, 'storetest'])->name('book.test');
Route::post('book/create_order_test_api', [App\Http\Controllers\Book::class, 'teststoreapi'])->name('book.test.api');
Route::post('map/api', [App\Http\Controllers\UserController::class, 'mapapi'])->name('map.api');
Route::get('book/{id?}', [App\Http\Controllers\Book::class, 'show']);
Route::get('book/driver/{id?}', [App\Http\Controllers\Book::class, 'shows']);
Route::get('book/order/{status?}', [App\Http\Controllers\Book::class, 'unassignedordershow']);
Route::post('book/order/updateship/{id?}', [App\Http\Controllers\Book::class, 'updateship']);
Route::post('book/order/updateorder/{id?}', [App\Http\Controllers\Book::class, 'updateorder']);
//Route::get('/admin/home',  [App\Http\Controllers\AdminController::class, 'myHome'])->name('admin.route')->middleware('admin');