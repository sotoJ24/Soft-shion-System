<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CartController;

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


/*--------------------------------------------Users---------------------------------------*/
Route::get('user',[UserController::class, 'getUser'])->name('get_user_route');
Route::post('create/user',[UserController::class, 'store'])->name('store_user_route');

/*--------------------------------------------Category---------------------------------------*/
Route::post('create/category',[CategoryController::class, 'store'])->name('store_category_route');
Route::put('update/category/{id}',[CategoryController::class, 'update'])->name('update_category_route');
Route::delete('delete/category/{id}',[CategoryController::class, 'destroy'])->name('delete_category_route');

/*--------------------------------------------Cart---------------------------------------*/


/*--------------------------------------------Customers---------------------------------------*/
Route::get('customer',[CustomerController::class, 'index'])->name('get_customer_route');
Route::post('create/customer',[CustomerController::class, 'store'])->name('store_customer_route');
Route::put('update/customer/{id}',[CustomerController::class, 'update'])->name('update_customer_route');
Route::delete('delete/customer/{id}',[CustomerController::class, 'destroy'])->name('delete_customer_route');

/*--------------------------------------------Employee---------------------------------------*/
Route::get('employee',[EmployeeController::class, 'index'])->name('get_employee_route');
Route::delete('delete/employee/{id}',[EmployeeController::class, 'destroy'])->name('delete_employee_route');

