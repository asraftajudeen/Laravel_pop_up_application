<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModalTableController;



Route::get('/', [ModalTableController::class, 'Modalshow'])->name('modal.show');
Route::post('/store-data', [ModalTableController::class, 'storeData'])->name('store.data');
Route::get('/element-modal-data', [ModalTableController::class, 'ElementModalShow'])->name('element.modal.data');
Route::get('/fetch-records', [ModalTableController::class, 'fetchRecords'])->name('fetch.records');
