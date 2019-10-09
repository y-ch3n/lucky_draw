<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\WinningNumber;
use Illuminate\Http\Request;

class WinningNumberController extends Controller
{
    public function register(Request $request)
    {
        // TODO: validation
        $input = $request->only(['name', 'winning_number']);
        // TODO: insert to candidates table
        /* @var Candidate $candidate */
        $candidate = Candidate::firstOrCreate(['name' => $input['name']]);
        if (WinningNumber::where('number', $input['winning_number'])->doesntExist()) {
            $candidate->winningNumbers()->firstOrCreate(['number'=>$input['winning_number']]);
        }
        // flash message
        return redirect()->back();
    }
}
