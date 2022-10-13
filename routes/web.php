<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('admin.index');
});
Route::get('/admin', function () {
    return view('admin.login');
});


Route::get('/login', function () {
    return view('admin.login');
});

Route::get('logout',[LoginController::class, 'logout'])->name('logout');
Route::post('auth',[LoginController::class, 'login'])->name('auth');

Route::get('/register', function () {
    return view('admin.register');
});
Route::post('authRegi',[LoginController::class, 'register'])->name('authRegi');

Route::group(['middleware' => ['is_admin']], function () {



    Route::get('admin/home', [AdminController::class, 'adminHome'])->name('admin.home');



    // Category
    Route::get('admin/addCategory', [AdminController::class, 'addCategory'])->name('admin.addCategory');
    Route::post('admin/addCategory', [AdminController::class, 'saveCategory'])->name('admin.saveCategory');
    Route::get('admin/ListCategory', [AdminController::class, 'listCategory'])->name('admin.listCategory');
    Route::get('admin/deleteCategory/{id}', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');
    Route::get('admin/editCategory/{id}', [AdminController::class, 'editCategory'])->name('admin.editCategory');
    Route::post('admin/updateCategory/', [AdminController::class, 'updateCategory'])->name('admin.updateCategory');

    // Sub Category
    Route::get('admin/addSubCategory', [AdminController::class, 'addSubCategory'])->name('admin.addSubCategory');
    Route::post('admin/addSubCategory', [AdminController::class, 'saveSubCategory'])->name('admin.saveSubCategory');
    Route::get('admin/ListSubCategory', [AdminController::class, 'listSubCategory'])->name('admin.listSubCategory');
    Route::get('admin/deleteSubCategory/{id}', [AdminController::class, 'deleteSubCategory'])->name('admin.deleteSubCategory');
    Route::get('admin/editSubCategory/{id}', [AdminController::class, 'editSubCategory'])->name('admin.editSubCategory');
    Route::post('admin/updateSubCategory/', [AdminController::class, 'updateSubCategory'])->name('admin.updateSubCategory');

    Route::post('admin/fetchSubCategory/', [AdminController::class, 'fetchSubCategory'])->name('admin.fetchSubCategory');


    // Our Works
    Route::get('admin/addWorks', [AdminController::class, 'addWorks'])->name('admin.addWorks');
    Route::post('admin/addWorks', [AdminController::class, 'saveWorks'])->name('admin.saveWorks');
    Route::get('admin/ListWorks', [AdminController::class, 'listWorks'])->name('admin.listWorks');
    Route::get('admin/deleteWorks/{id}', [AdminController::class, 'deleteWorks'])->name('admin.deleteWorks');
    Route::get('admin/editWorks/{id}', [AdminController::class, 'editWorks'])->name('admin.editWorks');
    Route::post('admin/updateWorks/', [AdminController::class, 'updateWorks'])->name('admin.updateWorks');

    Route::post('admin/update_password', [AdminController::class, 'update_password'])->name('admin.update_password');


});

