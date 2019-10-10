<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $results = Result::all();
        return view('welcome', compact('results'));
    }
}
