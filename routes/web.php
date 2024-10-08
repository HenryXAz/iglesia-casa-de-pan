<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
    $users = User::all();

    return view('welcome', compact('users'));
})->name('welcome')
->middleware(['auth', 'verified', 'user_activated']);

Route::get('/ui/app', function (){
    return view('pages.ui.app-page');
})->name('ui.app');

Route::get('/ui/guest', function (){
    return view('pages.ui.guest-page');
})->name('ui.guest');
