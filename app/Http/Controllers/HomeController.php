<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LuckyDrawService;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->authorize('luckyDraw', Auth::user());
        return view('home');
    }

    public function drawAPrize(Request $request)
    {
        $this->authorize('luckyDraw', Auth::user());
        $input = $request->only(['prize_type', 'generate_randomly', 'winning_number']);
        $result = null;
        $error_message = null;
        try {
            $result = LuckyDrawService::draw($input['prize_type'], $input['generate_randomly'], $input['winning_number']);
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
        }
        return view('winner', compact('result', 'error_message'));
    }
}
