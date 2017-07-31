<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        // $request->session()->put(['maycon'=>'Master of none']);
        // //session(['camila'=>'student']);

        //  return $request->session()->get('maycon');

        // // return $request->session()->all();

        $request->session()->forget('camila');


        return session('camila');




        // return view('home');
    }
}
