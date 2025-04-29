<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MangoController extends Controller
 {
    
    public function giveMango(){
        return "100 mangoes";
    }

    // public function giveMango(){
    //     return view('welcome');
    // }
}
