<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tag::orderBy('created_at', 'DESC')->paginate(15);
        return view('posts.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.tag.create');
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
        $this->validate($request, [
            'name' => 'required|unique:categories,name|max:255',
        ]);
        $tag = tag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->des,
        ]);
        $tag->save();
        Session()->flash('success', 'Tag Created Successfully.!');
        return redirect()->route('seller.tag.create');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
        return view('posts.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
        $this->validate($request, [
            'name' => "required|unique:categories,name|max:255,$request->name",
        ]);
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name, '-');
        $tag->description = $request->des;
        $tag->save();
        Session()->flash('success', 'Tag Updated Successfully.!');
        return redirect()->route('seller.tag.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
        if($tag){
            $tag->delete();

            Session()->flash('success', 'Tag Deleted Successfully.!');
            return Redirect::to(route('tag.index'))->withInput();
        }
    }
}
