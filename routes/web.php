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
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('faculty', FacultyController::class);
    Route::resource('objects',ObjectsController::class);
    Route::resource('objectsections',ObjectSectionController::class);
    Route::resource('floorsections',FloorSectionController::class);
    Route::get('/floor-sections',[FloorSectionController::class,'excel']);
    Route::resource('flatsections',FlatSectionController::class);
    Route::resource('sections',SectionController::class);
    Route::resource('workers',WorkerController::class);
    Route::resource('fees',FeeController::class);
});


require __DIR__ . '/auth.php';
