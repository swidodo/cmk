<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\setting\UserController;
use App\Http\Controllers\setting\UserGroupController;
use App\Http\Controllers\setting\ApplicationController;
use App\Http\Controllers\setting\ApplicationGroupController;
use App\Http\Controllers\setting\RoleController;
use App\Http\Controllers\setting\PermissionController;
use App\Http\Controllers\setting\PermissionGroupController;
use App\Http\Controllers\BranchController;

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
Route::get('/login',[LoginController::class,'index']);
Route::get('/authentication',[AuthController::class,'auth'])->name('log');
Route::resource('/user',UserController::class);
Route::resource('/group_user',UserGroupController::class);
Route::POST('/group_user/get_user',[UserGroupController::class,'get_user']);
Route::resource('/application',ApplicationController::class);
Route::resource('/group_application',ApplicationGroupController::class);
Route::resource('/role',RoleController::class);
Route::resource('/branch',BranchController::class);
Route::get('/permission',[PermissionController::class,'index']);
Route::POST('/permission/set',[PermissionController::class,'update']);
Route::POST('/permission/group',[PermissionController::class,'get_access_group']);
Route::get('/permission_group',[PermissionGroupController::class,'index']);
Route::POST('/permission_group/update',[PermissionGroupController::class,'update_row']);
Route::POST('/permission_group/group',[PermissionGroupController::class,'get_group']);
Route::POST('/permission_group/removeAll',[PermissionGroupController::class,'removeListAll']);
Route::POST('/permission_group/addList',[PermissionGroupController::class,'addList']);
Route::POST('/permission_group/removeList',[PermissionGroupController::class,'removeList']);
Route::get('/', function () {
    return view('dashboard/index');
});
