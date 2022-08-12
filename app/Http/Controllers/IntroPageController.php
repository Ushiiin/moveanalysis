<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntroPageController extends Controller
{
    //
    public function intro() {
        return view('intro');
    }
}
