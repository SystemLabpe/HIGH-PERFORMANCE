<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;
use Log;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('matchs.index');
    }

    public function dashboard()
    {
        return view('home');
    }

    public function admin()
    {
        $clubs = Club::paginate(10);
        return view('club.club_list', compact('clubs'));
    }
}
