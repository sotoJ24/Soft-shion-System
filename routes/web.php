<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
Use App\Http\Controllers\SupplierController;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

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
    $articles = Article::all();
    return view('index',compact('articles'));
})->name('index_route')->middleware('guest');

Route::get('/contact', function () {
    return view('contact');
})->name('contact_route');

Route::middleware(['auth'])->group(function () {
    /*---------------------------------------------VIEWS-----------------------------------*/
    Route::view('/administration', 'administration')->name('admin_route');

    /*----------------------------------------------USER-----------------------------------*/
    Route::get('/manage/user',[UserController::class, 'index'])->name('user_manage_route')->middleware('can:user_manage_route');
    Route::get('/edit/user/{user}',[UserController::class, 'edit'])->name('edit_manage_route')->middleware('can:user_manage_route');
    Route::put('/update/user/{id}',[UserController::class, 'update'])->name('update_manage_route');
    Route::post('logout/user', [AuthenticationController::class, 'logout'])->name('logout_authentication_route');
    Route::post('/manage/create/user',[UserController::class, 'store'])->name('create_user_route');
    Route::delete('/delete/user/{id}',[UserController::class, 'destroy'])->name('delete_user_route');
    Route::post('/manage/user',[UserController::class, 'filter'])->name('user_filter_route')->middleware('can:user_manage_route');

    /*----------------------------------------------ARTICLES-----------------------------------*/
    Route::post('create/article',[ArticleController::class, 'store'])->name('store_articles_route');
    Route::get('/manage/articles', [ArticleController::class, 'index'])->name('article_route');
    Route::put('/update/article/{id}', [ArticleController::class, 'update'])->name('update_article_route');
    Route::get('/edit/article/{article}',[ArticleController::class, 'edit'])->name('edit_article_route');
    Route::delete('delete/article/{id}',[ArticleController::class, 'destroy'])->name('delete_article_route');
    Route::post('/manage/articles',[ArticleController::class, 'filter'])->name('article_filter_route');

    /*----------------------------------------------EMPLOYEE-----------------------------------*/
    Route::get('/manage/employees', [EmployeeController::class, 'index'])->name('employee_route');
    Route::get('/edit/employee/{employee}',[EmployeeController::class, 'edit'])->name('edit_employee_route');
    Route::post('create/employee',[EmployeeController::class, 'store'])->name('store_employee_route');
    Route::put('update/employee/{id}',[EmployeeController::class, 'update'])->name('update_employee_route');
    Route::delete('delete/employee/{id}',[EmployeeController::class, 'destroy'])->name('delete_employee_route');
    Route::post('/manage/employees',[EmployeeController::class, 'filter'])->name('employee_filter_route');

    /*----------------------------------------------CUSTOMER-----------------------------------*/
    Route::get('manage/customer', [CustomerController::class, 'index'])->name('customer_route');
    Route::get('edit/customer/{customer}',[CustomerController::class, 'edit'])->name('edit_customer_route');
    Route::post('create/customer',[CustomerController::class, 'store'])->name('store_customer_route');
    Route::put('update/customer/{id}',[CustomerController::class, 'update'])->name('update_customer_route');
    Route::delete('delete/customer/{id}',[CustomerController::class, 'destroy'])->name('delete_customer_route');
    Route::post('manage/customer',[CustomerController::class, 'filter'])->name('customer_filter_route');

    /*----------------------------------------------CATEGORIES-----------------------------------*/
    Route::get('manage/categories', [CategoryController::class, 'index'])->name('category_route');
    Route::post('create/categories', [CategoryController::class, 'store'])->name('store_category_route');
    Route::get('edit/categories/{category}', [CategoryController::class, 'edit'])->name('edit_category_route');
    Route::put('update/categories/{id}',[CategoryController::class, 'update'])->name('update_category_route');
    Route::post('manage/categories',[CategoryController::class, 'filter'])->name('category_filter_route');
    Route::delete('delete/category/{id}',[CategoryController::class, 'destroy'])->name('delete_category_route');

    /*----------------------------------------------SUPPLIER-----------------------------------*/
    Route::get('manage/suppliers', [SupplierController::class, 'index'])->name('supplier_route');
    Route::post('create/supplier', [SupplierController::class, 'store'])->name('store_supplier_route');
    Route::put('update/supplier/{supplier}', [SupplierController::class, 'update'])->name('update_supplier_route');
    Route::post('manage/suppliers',[SupplierController::class, 'filter'])->name('supplier_filter_route');
    Route::get('edit/supplier/{supplier}', [SupplierController::class, 'edit'])->name('edit_supplier_route');
    Route::delete('delete/category/{id}',[SupplierController::class, 'destroy'])->name('delete_supplier_route');
});

/*----------------------------------------------AUTH-----------------------------------*/
Route::get('/login',[AuthenticationController::class, 'index'])->name('login_route')->middleware('guest');
Route::post('login/user',[AuthenticationController::class, 'login'])->name('login_authentication_route');

/*----------------------------------------------CART-----------------------------------*/
Route::post('create/cart_articles', [CartController::class, 'store'])->name('store_cart_route');
Route::delete('delete/whole_cart',[CartController::class, 'destroy'])->name('delete_cart_route');
Route::delete('delete/cart/{productId}',[CartController::class, 'destroyById'])->name('delete_by_id_cart_route');
Route::get('get/car_article',[CartController::class, 'index'])->name('get_cart_route');
Route::get('get/article/pdf', [CartController::class, 'export_to_pdf'])->name('export_pdf_cart_route');

