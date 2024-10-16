<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\FacultyController;
use App\Http\Controllers\admin\SendTaskController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\FlatSectionController;
use App\Http\Controllers\FloorSectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObjectsController;
use App\Http\Controllers\ObjectSectionController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkerController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('roles', RoleController::class);
    Route::resource('adminpermissions', PermissionController::class);
    Route::resource('users', UserController::class);
});


require __DIR__ . '/auth.php';
