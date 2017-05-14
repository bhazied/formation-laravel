<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pageController extends Controller
{

    public function __construct()
    {
        $this->middleware('ip',["192.168.1.1", "192.168.1.2", "192.168.1.3"]);
    }


    public function index($name = null)
    {

        return response($name);
    }

    public function Show()
    {
        return view('page.my_view');
    }


}
