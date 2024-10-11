<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\BlogController;

// public routes
Route::get('/', function () {
    return redirect(route('home'));
})->name('welcome');

Route::get('/inicio', function () {

    $post = Post::where('id', 8)->first();
    return view('public.home', compact('post'));
})->name('home');

Route::get('/blog', [BlogController::class, 'index'])
    ->name('blog');

Route::get('/blog/{id}', [BlogController::class, 'show'])
->name('blog.show');

// Dashboard routes
Route::get('/dashboard', function () {
    return view('pages.dashboard.index');
})->name('dashboard');


// ui test routes
if (app('env') === 'local') {
    Route::get('/ui/app', function (){
        return view('pages.ui.app-page');
    })->name('ui.app');

    Route::get('/ui/guest', function (){
        return view('pages.ui.guest-page');
    })->name('ui.guest');
}
