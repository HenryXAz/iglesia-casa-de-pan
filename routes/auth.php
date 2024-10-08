<?php

use App\Http\Controllers\Auth\RestorePasswordController;
use App\Http\Controllers\Auth\UserVerificationController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login/email', function (){
        return view('pages.auth.login-email');
    })->name('login.email');

    Route::get('/login/username', function (){
        return view('pages.auth.login-username');
    })->name('login.username');

    Route::post('/login/email', [LoginController::class, 'emailLogin'])
        ->name('login.email.post');

    Route::post('/login/username', [LoginController::class, 'usernameLogin'])
        ->name('login.username.post');
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');
});

// verification routes

Route::get('/email/verify', [UserVerificationController::class, 'userVerify'])
    ->middleware(['auth'])
    ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [UserVerificationController::class, 'verifyEmail'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/resend/{id}', [UserVerificationController::class, 'resend'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

// restore password

Route::get('/restore/email', [RestorePasswordController::class, 'sendRestoreEmail'])
    ->middleware(['throttle:6,1'])
    ->name('restore.email');

Route::post('/restore/link',[RestorePasswordController::class, 'sendEmailRestorePassword'])
->name('restore.link');

Route::get('/restore/{id}/email', [RestorePasswordController::class, 'resetEmailPasswordView'])
->name('restore.email-password.view');

Route::post('/restore/password/email', [REstorePasswordController::class, 'resetEmailPassword'])
    ->name('restore.email.password');
