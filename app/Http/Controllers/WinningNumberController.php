<?php

namespace App\Http\Controllers;

use App\User;
use App\WinningNumber;
use Illuminate\Http\Request;

class WinningNumberController extends Controller
{
    public function register(Request $request)
    {
        // TODO: validation
        $input = $request->only(['name', 'winning_number']);
        /* @var User $user */
        $user = User::firstOrCreate(['name' => $input['name']]);
        if (WinningNumber::where('number', $input['winning_number'])->doesntExist()) {
            $user->winningNumbers()->firstOrCreate(['number'=>$input['winning_number']]);
        }
        // flash message
        return redirect()->back();
    }
}
