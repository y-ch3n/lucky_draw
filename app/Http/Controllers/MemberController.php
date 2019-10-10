<?php

namespace App\Http\Controllers;

use App\WinningNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('member');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'winning_number' => 'required|unique:winning_numbers,number'
        ]);
        $input = $request->only(['winning_number']);
        if (WinningNumber::where('number', $input['winning_number'])->doesntExist()) {
            Auth::user()->winningNumbers()->firstOrCreate(['number' => $input['winning_number']]);
            flash()->success('Successfully register your winning number');
        }
        // flash message
        return redirect()->back();
    }
}
