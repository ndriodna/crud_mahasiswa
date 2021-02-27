<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;

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



Auth::routes(['register' => false]);

Route::group(['middleware'=>'auth'],function (){
Route::get('/',HomeController::class)->name('dashboard');

	Route::group(['middleware' => ['role:super admin']], function (){
		Route::resource('roles',RoleController::class)->only([
		'index','store','destroy'
	]);
	Route::resource('users',UserController::class);	
	Route::get('/users/roles-permission',[UserController::class,'rolePermission'])->name('users.role_permissions');
	Route::post('/users/permission',[UserController::class,'addPermission'])->name('users.add_permission');
	Route::put('/users/permission/{id}',[UserController::class,'setRolePermission'])->name('users.setRolePermission');
	});

	Route::group(['middleware' => ['permission:edit mahasiswa']],function (){
	Route::resource('mahasiswa',MahasiswaController::class);
	});

	Route::group(['middleware' => ['permission:edit dosen']],function (){
		Route::resource('dosen',DosenController::class);
	});

	Route::group(['middleware' => ['permission:edit jurusan']],function (){
	Route::resource('jurusan',JurusanController::class);
	});

});
Route::group(['prefix' => 'laravel-filemanager','middleware' => 'auth'], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });