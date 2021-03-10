<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;




Auth::routes(['register' => false]);


Route::middleware(['auth'])->group(function ()
{
	Route::get('/',HomeController::class)->name('dashboard');

	Route::group(['middleware' => ['role:super admin']], function (){

		Route::resource('users',UserController::class);	
		Route::get('create-user-dosen',[UserController::class, 'createDosen'])->name('users.createDosen');

		Route::resource('roles',RoleController::class)->only([
		'index','store','destroy'
		]);
		Route::post('roles/permission',[UserController::class, 'addPermission'])->name('roles.add_permission');
		Route::get('roles/roles-permission',[UserController::class, 'rolePermission'])->name('roles.role_permissions');
		Route::put('roles/permission/{id}',[UserController::class, 'setRolePermission'])->name('roles.setRolePermission');


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


// Route::group(['prefix' => 'laravel-filemanager','middleware' => 'auth'], function () {
//      \UniSharp\LaravelFilemanager\Lfm::routes();
//  });