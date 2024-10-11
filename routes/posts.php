<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\Posts\CategoryController;

Route::get('', [PostController::class, 'index'])
    ->middleware(['auth', 'can:listar publicaciones'])
    ->name('posts.index');

Route::get('/crear', [PostController::class, 'create'])
    ->middleware(['auth', 'can:crear publicaciones'])
    ->name('posts.create');

Route::get('/{id}/editar', [PostController::class, 'edit'])
    ->middleware(['auth', 'can:editar publicaciones'])
    ->name('posts.edit');

Route::put('/{id}/actualizar', [PostController::class, 'update'])
    ->middleware(['auth', 'can:editar publicaciones'])
    ->name('posts.update');

Route::post('/guardar', [PostController::class, 'store'])
    ->middleware(['auth', 'can:crear publicaciones'])
    ->name('posts.store');

// category routes
//
Route::get('/categorías', [CategoryController::class, 'index'])
    ->middleware(['auth', 'can:listar publicaciones'])
    ->name('posts.categories.index');

Route::get('/categorías/crear', [CategoryController::class, 'create'])
    ->middleware(['auth', 'can:crear categorias publicaciones'])
    ->name('posts.categories.create');

Route::get('/categorías/{id}/editar', [CategoryController::class, 'edit'])
    ->middleware(['auth', 'can:editar categorias publicaciones'])
    ->name('posts.categories.edit');

Route::post('/categorías/guardar', [CategoryController::class, 'store'])
    ->middleware(['auth', 'can:crear categorias publicaciones'])
    ->name('posts.categories.store');

Route::put('/categorías/{id}/actualizar', [CategoryController::class, 'update'])
->middleware(['auth', 'can:editar categorias publicaciones'])
->name('posts.categories.update');
