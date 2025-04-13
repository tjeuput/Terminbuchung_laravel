<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerminbuchungController;



Route::get('/terminbuchung', [TerminbuchungController::class, 'schritt1'])->name('terminbuchung.schritt1');

Route::post('/terminbuchung', [TerminbuchungController::class, 'storeSchritt1'])->name('terminbuchung.schritt1');

Route::get('/terminbuchung/behandler', [TerminbuchungController::class, 'schritt2'])->name('terminbuchung.schritt2');

Route::post('/checkverfuegbarkeit', [TerminbuchungController::class, 'checkverfuegbarkeit'])
    ->name('terminbuchung.checkverfuegbarkeit');

Route::post('/terminbuchung/behandler', [TerminbuchungController::class, 'storeSchritt2'])->name('terminbuchung.storeSchritt2');

Route::get('/terminbuchung/zeitfenster',[TerminbuchungController::class, 'schritt3'] )->name('terminbuchung.schritt3');

Route::post('/terminbuchung/zeitfenster', [TerminbuchungController::class, 'storeSchritt3'])->name('terminbuchung.storeSchritt3');

Route::get('/terminbuchung/persoenlicheDaten',[TerminbuchungController::class, 'schritt4'] )->name('terminbuchung.schritt4');

Route::post('/terminbuchung/persoenlicheDaten', [TerminbuchungController::class, 'storeSchritt4'])->name('terminbuchung.storeSchritt4');




