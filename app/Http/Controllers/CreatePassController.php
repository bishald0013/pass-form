<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreatePassController extends Controller
{
    public function createPass(Request $request)
    {
        $step = $request->session()->get('step', 1);
        return view('welcome', compact('step'));
    }
    public function validateStepOne(Request $request)
    {
        $validatedData = $request->validate([
            'organizer' => 'required|string',
            'passType' => 'required|string',
            'startDate' => 'required',
            'endDate' => 'required',
            'timezone' => 'required',
            'location' => 'required'
        ]);
        $sessionData = $request->session()->get('form_data', []);
        $sessionData['step_one'] = $validatedData;
        $request->session()->put('form_data', $sessionData);

        $request->session()->put('passType', $validatedData['passType']);
        $step = $request->session()->get('step', 1);
        $step++;
        $request->session()->put('step', $step);
        return redirect()->route('/')->with('step', $step);
    }
    public function validateStepTwo(Request $request)
    {
        $validatedData = $request->validate([
            'event_name' => 'required|string',
            'subHeader' => 'required|string',
            'gate' => 'nullable',
            'section' => 'nullable',
            'row' => 'nullable',
            'seat' => 'nullable',
            'attName' => 'nullable',
            'ticketNo' => 'nullable'
        ]);
        $sessionData = $request->session()->get('form_data', []);
        $sessionData['step_two'] = $validatedData;
        $request->session()->put('form_data', $sessionData);
        $step = $request->session()->get('step', 2);
        $step++;
        $request->session()->put('step', $step);
        return redirect()->route('/')->withInput();
    }
    public function validateStepThree(Request $request)
    {
        $validatedData = $request->validate([
            'file1' => 'required|file|mimes:jpg,png,pdf|max:2048',
            'file2' => 'required|file|mimes:jpg,png,pdf|max:2048',
        ]);

        // Retrieve the data from the session for steps one and two
        $sessionData = $request->session()->get('form_data', []);
        $sessionData['step_three'] = $validatedData;
        $stepOneData = $sessionData['step_one'] ?? [];
        $stepTwoData = $sessionData['step_two'] ?? [];
        // dd(['form step 3 submitted', $stepOneData, $stepTwoData, $validatedData, $sessionData]);

        $request->session()->forget('form_data'); // Remove only the 'form_data' key
        $request->session()->forget('step');
        $request->session()->put('step', 1);
        return redirect()->route('/')->withInput();
    }
    public function goToPreviousStep(Request $request)
    {
        $step = $request->input('step');

        // Ensure step doesn't go below 1
        if ($step < 1) {
            $step = 1;
        }

        $request->session()->put('step', $step);
        return redirect()->route('/');
    }
}
