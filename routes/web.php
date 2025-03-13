<?php

use App\Http\Controllers\CreatePassController;
use Illuminate\Support\Facades\Route;


Route::get('/', [CreatePassController::class, 'createPass'])->name('/');
Route::post('/step-one', [CreatePassController::class, 'validateStepOne'])->name('step-one');
Route::post('/step-two', [CreatePassController::class, 'validateStepTwo'])->name('step-two');
Route::post('/step-three', [CreatePassController::class, 'validateStepThree'])->name('step-three');
