<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\CategoryController;
use App\Models\Image;
use App\Models\Tag;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Random;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::orderBy('created_at', 'DESC')->paginate(20);
        return view('posts.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.post.create', compact(['categories', 'tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request, [
            'title' => 'required|unique:posts,title',
            'image' => 'image',
            'start_date'  => 'required',
            'end_date'    => 'required|after:start_date',
            'regular_prize' => 'required',
            'SKU' => 'required',
        ], [
            'title.required' => 'The post title can not be NULL.',
            'start_date.required' => 'Starting Bidding time is required.',
            'end_date.required' => 'Endding Bidding time is required.',
            'regular_prize.required' => 'Regular prize feild is required.',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->description = $request->description;
        $post->user_id = Auth::guard('web')->user()->id;
        $post->sort_description = $request->sort_description;
        $post->post_status = $request->post_status;
        $post->SKU = $request->SKU;
        $post->regular_prize = $request->regular_prize;
        $post->sale_prize = $request->sale_prize;
        $post->base_prize = $request->regular_prize;
        $post->start_date = $request->start_date;
        $post->end_date = $request->end_date;
        $post->publish_at = Carbon::now();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/post/', $filename);
            $post->image = '/storage/post/' . $filename;
        } else {
            $post->image = 'No Image Found.';
        }

        $post->save();
        // dd($request->categories_id);
        $posts = Post::firstOrNew(['title' => $post->title]);
        $posts->categories()->attach($request->categories_id);
        $posts->tags()->attach($request->tags);

        //multiple images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $extension = $img->getClientOriginalExtension();
                $filename = time() . rand(1, 1000) . '.' . $extension;
                $img->move('storage/posts/', $filename);
                //Create Images
                $postImg = new Image();
                $postImg->post_id = $posts->id;
                $postImg->images = '/storage/posts/' . $filename;
                $postImg->save();
            }
        }

        Session()->flash('success', 'Post Created Successfully.!');
        return redirect()->route('seller.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        $categories = Category::all();
        $tags = Tag::all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.post.edit', compact(['post', 'categories', 'tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $this->validate($request, [
            'title' => 'nullable',
            'image' => 'nullable|image',
        ]);

        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->description = $request->description;
        $post->sort_description = $request->sort_description;
        $post->post_status = $request->post_status;
        $post->SKU = $request->SKU;
        $post->regular_prize = $request->regular_prize;
        $post->sale_prize = $request->sale_prize;
        $post->base_prize = $request->regular_prize;
        $post->start_date = $request->start_date;
        $post->end_date = $request->end_date;
        $post->publish_at = Carbon::now();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/post/', $filename);
            $post->image = '/storage/post/' . $filename;
        }

        //dd($request->all());
        $post->save();
        $posts = Post::firstOrNew(['title' => $post->title]);
        $posts->categories()->sync($request->categories_id);
        $posts->tags()->sync($request->tags);

        //multiple images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $extension = $img->getClientOriginalExtension();
                $filename = time() . rand(1, 1000) . '.' . $extension;
                $img->move('storage/posts/', $filename);
                //Create Images
                $postImg = new Image();
                $postImg->post_id = $posts->id;
                $postImg->images = '/storage/posts/' . $filename;
                $postImg->save();
            }
        }
        Session()->flash('success', 'Post Updated Successfully.!');
        return redirect()->route('seller.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        if ($post) {
            $post->delete();

            Session()->flash('success', 'Post Deleted Successfully.!');
            return Redirect::to(route('post.index'))->withInput();
        }
    }
}
