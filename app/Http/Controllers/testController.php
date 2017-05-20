<?php

namespace App\Http\Controllers;

use App\Annonce;
use App\Category;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function nothome(){
        $annocnes = Annonce::with('category')->get();
        foreach ($annocnes as $annocne){
            $cat = $annocne->category;
            echo  $annocne->reference .' ----  '. $cat->name . '<br>';
            //dd($annocne->category());
        }
        dd('done');
        return view('home');
    }
}
