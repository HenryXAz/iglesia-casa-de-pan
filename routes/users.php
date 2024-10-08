<?php

use Illuminate\Support\Facades\Route;

Route::get('', [\App\Http\Controllers\Users\UserController::class, 'index'])
    ->middleware(['auth', 'can:listar usuarios', 'user_activated'])
    ->name('users.index');

Route::get('/crear', function (){
   dd('hello') ;
})->name('users.create');

Route::get('/{id}/detalles', [\App\Http\Controllers\Users\UserController::class, 'show'])
    ->name('users.show');

Route::get('/crear', [\App\Http\Controllers\Users\UserController::class, 'create'])
    ->middleware(['can:crear usuarios'])
->name('users.create');

Route::post('/guardar', [\App\Http\Controllers\Users\UserController::class, 'store'])
->name('users.store');

Route::get('/{id}/editar', [\App\Http\Controllers\Users\UserController::class, 'edit'])
    ->name('users.edit');

Route::put('/{id}/actualizar', [\App\Http\Controllers\Users\UserController::class, 'update'])
    ->middleware(['auth', 'can:editar usuarios'])
    ->name('users.update');;

// roles
Route::get('/roles', [\App\Http\Controllers\Users\RoleController::class, 'index'])
    ->middleware('can:listar roles')
    ->name('users.roles');

Route::get('/roles/{id}/detalles', [\App\Http\Controllers\Users\RoleController::class, 'show'])
    ->middleware(['auth'])
    ->name('users.roles.show');
