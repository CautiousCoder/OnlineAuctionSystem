<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function views()
    {
        return view('frontend.pages.home');
    }
}
