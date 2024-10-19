<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\SpecialEvents\SpecialEventController;

Route::get('', [SpecialEventController::class, 'index'])
    ->middleware(['auth', 'can:listar actividades', 'user_activated'])
    ->name('special-events.index');

Route::get('crear', [SpecialEventController::class, 'create'])
    ->middleware(['auth', 'can:crear actividades', 'user_activated', 'verified'])
    ->name('special-events.create');

Route::get('/{id}/editar', [SpecialEventController::class, 'edit'])
    ->middleware(['auth', 'can:editar actividades', 'user_activated', 'verified'])
    ->name('special-events.edit');


Route::post('guardar', [SpecialEventController::class, 'store'])
    ->middleware(['auth', 'can:crear actividades', 'user_activated', 'verified'])
    ->name('special-events.store');

Route::put('/{id}/actualizar', [SpecialEventController::class, 'update'])
    ->middleware(['auth', 'can:editar actividades', 'user_activated', 'verified'])
    ->name('special-events.update');

Route::get('/{id}/seguimiento', [SpecialEventController::class, 'tracking'])
    ->middleware(['auth', 'can:editar actividades', 'user_activated', 'verified'])
    ->name('special-events.tracking');

Route::post('/{id}/marcar-como-pagado', [SpecialEventController::class, 'markAsPaid'])
    ->middleware(['auth', 'can:editar actividades', 'user_activated', 'verified'])
    ->name('special-events.mark_as_paid');
