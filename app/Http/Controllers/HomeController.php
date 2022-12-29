<?php

namespace App\Http\Controllers;

use App\Submission;
use Illuminate\Http\Request;
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
        $submission = Submission::where('user_id', Auth::user()->id)->first();

        return view('home', [
            'submission' => $submission
        ]);
    }
}
