<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    private $test;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(\App\TestInterface $test)
    {
        $this->test = $test;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');

    }
}
