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
        $bidPost = Post::orderBy('created_at', 'DESC')->paginate(9);
        $slidebid = $bidPost->slice(0, 1);
        $slidebid1 = $bidPost->slice(1, 1);
        $slidebid2 = $bidPost->slice(2, 1);
        // dd($slidebid);
        $bidingPost = Post::where('bit_status', 1)->take(11)->get();
        $fstbidigngpost = $bidingPost->slice(0, 1);
        $scdbidigngpost = $bidingPost->slice(1, 1);
        $allbid = $bidingPost->slice(2, 9);
        return view('frontend.pages.index', compact(['bidPost', 'allbid', 'fstbidigngpost', 'scdbidigngpost', 'slidebid', 'slidebid1', 'slidebid2']));
    }

    //show product
    public function productshow($slug)
    {
        $product = Post::with('categories', 'tags', 'user')->where(['slug' => $slug])->first();
        return view('frontend.pages.detail', compact('product'));
    }
}
