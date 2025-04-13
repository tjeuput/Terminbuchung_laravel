<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerminbuchungController;
// Grupping buchung process
Route::prefix('terminbuchung')->name('terminbuchung.')->group(function () {
    // Step 1 routes
    Route::get('/', [TerminbuchungController::class, 'schritt1'])->name('schritt1');
    Route::post('/', [TerminbuchungController::class, 'storeSchritt1']);

    // Step 2 routes
    Route::get('/behandler', [TerminbuchungController::class, 'schritt2'])->name('schritt2');
    Route::post('/behandler', [TerminbuchungController::class, 'storeSchritt2'])->name('storeSchritt2');

    // Step 3 routes
    Route::get('/zeitfenster', [TerminbuchungController::class, 'schritt3'])->name('schritt3');
    Route::post('/zeitfenster', [TerminbuchungController::class, 'storeSchritt3'])->name('storeSchritt3');

    // Step 4 routes
    Route::get('/persoenlicheDaten', [TerminbuchungController::class, 'schritt4'])->name('schritt4');
    Route::post('/persoenlicheDaten', [TerminbuchungController::class, 'storeSchritt4'])->name('storeSchritt4');
});

// AJAX endpoints
Route::post('/checkverfuegbarkeit', [TerminbuchungController::class, 'checkverfuegbarkeit'])
    ->name('terminbuchung.checkverfuegbarkeit');




