<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    public function views()
    {
        return view('frontend.pages.index');
    }
}
