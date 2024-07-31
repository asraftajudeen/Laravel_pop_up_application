<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModalTableController;

Route::get('/', function () {
    return view('main');
});

Route::get('/modal-show', [ModalTableController::class, 'Modalshow'])->name('modal.show');
Route::post('/store-data', [ModalTableController::class, 'storeData'])->name('store.data');
