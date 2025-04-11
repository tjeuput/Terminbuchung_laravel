<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerminbuchungController;

Route::get('/termin/versicherung', [TerminbuchungController::class, 'showVersicherungForm']);
Route::post('/termin/versicherung',[TerminbuchungController::class, 'storeVersicherung']);
Route::get('/termin/behandler',[TerminbuchungController::class, 'showBehandlerDatumForm']);
Route::post('termin/behandler', [TerminbuchungController::class, 'storeBehandlerDatum']);
Route::get('/termin/zeitfenster', [TerminbuchungController::class, 'showZeitfensterForm']);
Route::post('termin/zeitfenster', [TerminbuchungController::class, 'storeZeitfenster']);
Route::get('/termin/personendaten', [TerminbuchungController::class, 'showPersonendatenForm']);
Route::get('/termin/personendaten', [TerminbuchungController::class, 'storePersonendaten']);



