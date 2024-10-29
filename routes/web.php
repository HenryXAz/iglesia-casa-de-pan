<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Public\ContactController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\BlogController;
use App\Http\Controllers\Public\SpecialEventController;
use App\Http\Controllers\Public\FoodProductController;

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

//Route::get('/contacto', [ContactController::class, 'index'])
//->name('contact');

// Dashboard routes
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['verified'])
    ->name('dashboard');


// special events routes
Route::get('/exclusivo/actividades', [SpecialEventController::class, 'index'])
    ->middleware(['auth', 'user_activated', 'verified', 'can:puede inscribirse a actividades'])
->name('special-events.public.index');

Route::get('/exclusivo/{id}/actividad', [SpecialEventController::class, 'show'])
    ->middleware(['auth', 'user_activated', 'verified', 'can:puede inscribirse a actividades'])
    ->name('special-events.public.show');

Route::post('/exclusivo/suscripcion/{id}/actividad', [SpecialEventController::class, 'subscribe'])
    ->middleware(['auth', 'user_activated', 'verified', 'can:puede inscribirse a actividades'])
->name('special-events.public.subscription');


Route::get('/exclusivo/mis-suscripciones', [SpecialEventController::class, 'mySubscriptions'])
    ->middleware(['auth', 'user_activated', 'verified', 'can:puede inscribirse a actividades'])
    ->name('special-events.public.my_subscriptions');

Route::get('/exclusivo/{id}/mis-suscripciones', [SpecialEventController::class, 'subscriptionDetail'])
    ->middleware(['auth', 'user_activated', 'verified', 'can:puede inscribirse a actividades'])
    ->name('special-events.public.subscription_detail');


// food products routes

Route::get('/venta-de-alimentos', [FoodProductController::class, 'index'])
    ->middleware(['auth', 'user_activated', 'verified', 'can:puede ordenar alimentos'])
    ->name('food_products.public.index');

Route::get('/venta-de-alimentos/{id}/ordenar', [FoodProductController::class, 'show'])
    ->middleware(['auth', 'user_activated', 'verified', 'can:puede ordenar alimentos'])
    ->name('food_products.public.show');

Route::post('/venta-de-alimentos/{id}/hacer-orden', [FoodProductController::class, 'makeOrder'])
    ->middleware(['auth', 'user_activated', 'verified', 'can:puede ordenar alimentos'])
    ->name('food_products.public.make_order');

Route::get('/ventas-de-alimentos/mis-ordenes', [FoodProductController::class, 'myFoodProducts'])
    ->middleware(['auth', 'user_activated', 'verified', 'can:puede ordenar alimentos' ])
    ->name('food_products.public.my_food_orders');

Route::get('/venta-de-alimentos/mis-ordenes/{order}/detalle', [FoodProductController::class, 'myFoodProductDetail'])
    ->middleware(['auth', 'user_activated', 'verified', 'can:puede ordenar alimentos' ])
    ->name('food_products.public.my_food_product_detail');

// ui test routes
if (app('env') === 'local') {
    Route::get('/ui/app', function (){
        return view('pages.ui.app-page');
    })->name('ui.app');

    Route::get('/ui/guest', function (){
        return view('pages.ui.guest-page');
    })->name('ui.guest');
}
