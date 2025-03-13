<?php

use App\Http\Controllers\CreatePassController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $step = 1;
    return view('welcome', [
        'step' => $step
    ]);
});

Route::post('/step-one', [CreatePassController::class, 'validateStepOne'])->name('step-one');
