<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\TrackOrder;
use App\Http\Controllers\Book;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

/*Route::get('/welcome', function () {
   return view('welcome');
});
*/
Route::get('/', [Home::class, 'index']);
Route::get('/about', [Home::class, 'about']);
Route::get('/terms&conditions', [Home::class, 'terms']);
Route::get('/privacy_policy', [Home::class, 'privacy']);
Route::get('/signup', [Home::class, 'signup']);
Route::get('/oops', [Home::class, 'oops']);
Route::get('/myaccount', [Home::class, 'myaccount']);
Route::get('/myaccount/editaccount', [Home::class, 'editu']);
Route::post('/myaccount/update', [Home::class, 'updatepass'])->name('account.update');
Route::get('locale/{locale}',function($locale){

Session::put('locale',$locale);

   return redirect()->back();

})->name('switchLan'); 

//Route::get('/admin/home', [Home::class, 'handledmin']);
Route::post('/contact', [Home::class, 'contact']);

Route::get('/book', [Book::class, 'index']);
Route::get('/order/{bookid}', [TrackOrder::class, 'index'])->name('order.status');
Route::get('/track', [TrackOrder::class, 'orderhistory']);
Route::get('/orderhistory/{bookid}', [TrackOrder::class, 'orderh'])->name('orderh.view');

Route::get('admindashboard/login', [App\Http\Controllers\Auth\LoginController::class, 'adminloginview'])->name('login.web.view');
Route::post('admindashboard/login/view', [App\Http\Controllers\Auth\LoginController::class, 'adminlogin'])->name('login.web');

Auth::routes();

Route::post('book/create_order', [App\Http\Controllers\Book::class, 'storeorder'])->name('book.store');
Route::post('book/create_order_form', [App\Http\Controllers\Book::class, 'form'])->name('book.form');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/product',  [App\Http\Controllers\AdminController::class, 'product'])->middleware('admin');
Route::get('/admin/contact/{id?}', [App\Http\Controllers\AdminController::class, 'destroycontact'])->name('contact.destroy')->middleware('admin');
Route::get('/admin/user/{id}', [App\Http\Controllers\AdminController::class, 'delUs'])->name('user.destroy')->middleware('admin');

Route::get('/driver/{id}', [App\Http\Controllers\AdminController::class, 'driverview'])->name('driver')->middleware('admin');


Route::get('/admin/pass/update/{id}', [App\Http\Controllers\AdminController::class, 'updatepass'])->name('pass.update')->middleware('admin');

Route::get('/admin/user/add/view', [App\Http\Controllers\AdminController::class, 'adduser'])->name('user.add')->middleware('admin');
Route::post('/admin/user/create', [App\Http\Controllers\AdminController::class, 'storeuser'])->name('user.store')->middleware('admin');

Route::get('/admin/user/edit/{id}', [App\Http\Controllers\AdminController::class, 'edituser'])->name('user.edit')->middleware('admin');
Route::post('/admin/user/update', [App\Http\Controllers\AdminController::class, 'updateuser'])->name('user.update')->middleware('admin');
Route::get('/admin/user/{bookid}', [App\Http\Controllers\AdminController::class, 'emailinvoice'])->name('user.mail')->middleware('admin');




Route::get('/admin/attatchment/{bookid}', [App\Http\Controllers\AdminController::class, 'emailattatchment'])->name('docs.mail')->middleware('admin');
Route::get('/admin/email_docs/{bookid}', [App\Http\Controllers\AdminController::class, 'emailto'])->name('admin.toemail')->middleware('admin');



Route::get('/admin/pass/{id}', [App\Http\Controllers\AdminController::class, 'editpass'])->name('admin.editpass')->middleware('admin');


Route::get('/admin/extra/{bookid}', [App\Http\Controllers\AdminController::class, 'addextra'])->name('admin.editextra')->middleware('admin');
Route::get('/admin/extra/update/{id}', [App\Http\Controllers\AdminController::class, 'updatextra'])->name('extra.update')->middleware('admin');







Route::get('admin/create_order', [App\Http\Controllers\AdminController::class, 'createorder'])->name('admin.book.create')->middleware('admin');
Route::post('admin/save_order', [App\Http\Controllers\AdminController::class, 'store'])->name('admin.book.store')->middleware('admin');
Route::get('/admin/order',  [App\Http\Controllers\AdminController::class, 'unorder'])->middleware('admin');

Route::get('/admin/completed_orders',  [App\Http\Controllers\AdminController::class, 'corder'])->middleware('admin');
Route::get('/admin/orders/view_invoice/{bookid}',  [App\Http\Controllers\AdminController::class, 'invoice'])->name('invoice')->middleware('admin');

Route::get('/admin/orders/view_delivery_note/{bookid}',  [App\Http\Controllers\AdminController::class, 'invoice2'])->name('invoice2')->middleware('admin');


Route::get('/admin/orders',  [App\Http\Controllers\AdminController::class, 'asorder'])->middleware('admin');
Route::get('/admin/orders/view/unassigned/{bookid}',  [App\Http\Controllers\AdminController::class, 'unview'])->name('orders.view.un')->middleware('admin');

Route::get('/admin/orders/view/assigned/{bookid}',  [App\Http\Controllers\AdminController::class, 'asview'])->name('orders.view.as')->middleware('admin');




Route::get('/admin/orders/update/{bookid}', [App\Http\Controllers\AdminController::class, 'updateun'])->name('orders.update')->middleware('admin');
Route::get('/admin/orders/{bookid}', [App\Http\Controllers\AdminController::class, 'editun'])->name('admin.editun')->middleware('admin');

Route::get('/admin/assign/edit/{bookid}', [App\Http\Controllers\AdminController::class, 'editprice'])->name('admin.driver.edit')->middleware('admin');

Route::get('/admin/assign/update/{bookid}', [App\Http\Controllers\AdminController::class, 'dstatus'])->name('admin.driver.update')->middleware('admin');
Route::post('/admin/update/pay', [App\Http\Controllers\AdminController::class, 'payedit'])->name('pay.edit')->middleware('admin');
Route::get('/admin/order/{bookid}', [App\Http\Controllers\AdminController::class, 'delorder'])->name('order.destroy')->middleware('admin');

Route::get('/admin/user',  [App\Http\Controllers\AdminController::class, 'user'])->middleware('admin');
Route::get('/admin/shop',  [App\Http\Controllers\AdminController::class, 'shop'])->middleware('admin');
Route::get('/admin/home',  [App\Http\Controllers\AdminController::class, 'myHome'])->name('admin.route')->middleware('admin');

Route::get('/admin/reports',  [App\Http\Controllers\AdminController::class, 'reports_menu'])->middleware('admin');
Route::get('/admin/reports/customer',  [App\Http\Controllers\AdminController::class, 'reports_customer'])->middleware('admin');
Route::post('/admin/reports/customer',  [App\Http\Controllers\AdminController::class, 'reports_customer_show'])->middleware('admin');



Route::get('/admin/reports/driver',  [App\Http\Controllers\AdminController::class, 'reports_driver'])->middleware('admin');
Route::post('/admin/reports/driver',  [App\Http\Controllers\AdminController::class, 'reports_driver_show'])->middleware('admin');





Route::get('/admin/reports/driversummry',  [App\Http\Controllers\AdminController::class, 'sreportdriver'])->middleware('admin');
Route::post('/admin/reports/driver/details',  [App\Http\Controllers\AdminController::class, 'sreportd'])->middleware('admin');


Route::get('/admin/reports/customersummry',  [App\Http\Controllers\AdminController::class, 'sreportcustomer'])->middleware('admin');
Route::post('/admin/reports/customer/details',  [App\Http\Controllers\AdminController::class, 'sreport'])->middleware('admin');

