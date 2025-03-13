<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreatePassController extends Controller
{
    public $step;
    public function __construct($step)
    {
        $this->step = 1;
    }
    public function validateStepOne(Request $request)
    {
        $this->step++;
        return view('welcome', [
            'step' => $this->step
        ]);
    }
}
