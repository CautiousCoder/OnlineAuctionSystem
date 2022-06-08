<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\CategoryController;
use App\Models\Tag;
use Illuminate\Support\Carbon;

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
        $posts = Post::orderBy('created_at','DESC')->paginate(20);
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
        return view('posts.post.create', compact(['categories','tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());
        $this->validate($request, [
            'name' => 'required|unique:posts,name',
            'image' => 'image',
            'category_id' => 'nullable',
        ]);

        $post = new Post();
            $post->name = $request->name;
            $post->slug = Str::slug($request->name, '-');
            $post->description = $request->description;
            $post->author_id = 1;
            $post->publish_at = Carbon::now();
            
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('storage/post/',$filename);
            $post->image = '/storage/post/'.$filename;
        }
        else {
            $post->image = 'noImage.jpg';
        }

        $post->save();
    
        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);
        
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
        return view('posts.post.edit', compact(['post','categories']));

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
            'name' => 'required|unique:posts,name',
            'image' => 'image',
        ]);

        $post->name = $request->name;
        $post->slug = Str::slug($request->name, '-');
        $post->description = $request->description;
        $post->author_id = 1;
        $post->category_id = $request->category;
        $post->publish_at = Carbon::now();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('storage/post/',$filename);
            $post->image = '/storage/post/'.$filename;
        }

        //dd($request->all());
        $post->save();
        Session()->flash('success', 'Post Updated Successfully.!');
        return redirect()->route('seller.post.edit');
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
        if($post){
            $post->delete();

            Session()->flash('success', 'Post Deleted Successfully.!');
            return Redirect::to(route('post.index'))->withInput();
        }
    }
}
