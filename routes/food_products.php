<?php

use App\Http\Controllers\FoodProducts\FoodProductController;
use App\Http\Controllers\FoodProducts\HistoryController;
use App\Http\Controllers\FoodProducts\OrderController;
use App\Http\Controllers\FoodProducts\DeliveryController;
use Illuminate\Support\Facades\Route;

Route::get('', [FoodProductController::class, 'index'])
    ->middleware(['auth', 'can:listar venta de alimentos', 'verified', 'user_activated'])
    ->name('food_products.index');

Route::get('/{id}/ver', [FoodProductController::class, 'view'])
    ->middleware(['auth', 'can:editar venta de alimentos', 'verified', 'user_activated'])
    ->name('food_products.view');

Route::get('/crear', [FoodProductController::class, 'create'])
    ->middleware(['auth', 'can:crear venta de alimentos', 'verified', 'user_activated'])
    ->name('food_products.create');

Route::post('/guardar', [FoodProductController::class, 'store'])
    ->middleware(['auth', 'can:crear venta de alimentos', 'verified', 'user_activated'])
    ->name('food_products.store');

Route::get('/{id}/autorizar', [FoodProductController::class, 'authorizeFoodProduct'])
    ->middleware(['auth', 'can:autorizar venta de alimentos', 'verified', 'user_activated'])
    ->name('food_products.authorize_food_product.view');

Route::post('/{id}/confirmar-autorizacion', [FoodProductController::class, 'confirmAuthorization'])
    ->middleware(['auth', 'can:autorizar venta de alimentos', 'verified', 'user_activated'])
    ->name('food_products.authorize_food_product.confirm');

Route::post('/{foodProduct}/finalizar', [FoodProductController::class, 'markAsFinalized'])
    ->middleware(['auth', 'can:editar venta de alimentos', 'verified', 'user_activated'])
    ->name('food_products.mark_as_finalized');

// orders
Route::get('/ordenes', [OrderController::class, 'index'])
    ->middleware(['auth', 'can:listar venta de alimentos', 'verified', 'user_activated'])
    ->name('food_orders.index');

Route::get('/ordenes/{id}/ver', [OrderController::class, 'show'])
    ->middleware(['auth', 'can:editar venta de alimentos', 'verified', 'user_activated'])
    ->name('food_orders.show');


Route::post('/ordenes/{id}/asignar-repartidor', [OrderController::class, 'assignDelivery'])
    ->middleware(['auth', 'can:editar venta de alimentos', 'verified', 'user_activated'])
    ->name('food_orders.assign_delivery');

Route::post('/ordenes/{id}/marcar-como-pagado', [OrderController::class, 'markAsPaid'])
    ->middleware(['auth', 'can:editar venta de alimentos', 'verified', 'user_activated'])
    ->name('food_orders.mark_as_paid');

Route::post('/ordenes/{id}/marcar-como-entregado', [OrderController::class, 'markAsDelivered'])
    ->middleware(['auth',
        \Spatie\Permission\Middleware\PermissionMiddleware::using('editar venta de alimentos|entregar ordenes de venta de alimentos'),
//        'can:editar venta de alimentos',
        'verified', 'user_activated'])
    ->name("food_orders.mark_as_delivered");

Route::post('/ordenes/{id}/marcar-como-pagado-entregado', [OrderController::class, 'markAsPaidDelivered'])
    ->middleware(['auth', 'can:editar venta de alimentos', 'verified', 'user_activated'])
    ->name('food_orders.mark_as_paid_delivered');

// delivery
Route::get('/entregas', [DeliveryController::class, 'index'])
    ->middleware(['auth', 'can:entregar ordenes de venta de alimentos', 'verified', 'user_activated'])
    ->name('food_deliveries.index');

Route::get('/entregas/{order}/detalles', [DeliveryController::class, 'show'])
    ->middleware(['auth', 'can:entregar ordenes de venta de alimentos', 'verified', 'user_activated'])
    ->name('food_deliveries.show');


// history
Route::get('/historial', [HistoryController::class, 'index'])
    ->middleware(['auth',
        'can:listar venta de alimentos',
//        'can:historial de venta de alimentos',
        'verified', 'user_activated'])
    ->name('food_products_history.index');

Route::get('/historial/{foodProduct}/detalles', [HistoryController::class, 'show'])
    ->middleware(['auth', 'can:editar venta de alimentos', 'verified', 'user_activated'])
    ->name('food_products_history.show');
