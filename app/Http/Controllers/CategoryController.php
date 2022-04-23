<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
//use Psy\Util\Str;
use Illuminate\Support\Str;
//use Validator, Input, Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'DESC')->paginate(15);
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.category.create');
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
        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->des,
        ]);
        $category->save();
        Session()->flash('success', 'Category Created Successfully.!');
        return Redirect::to(route('category.create'))->withInput();
        
        //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => "required|unique:categories,name|max:255,$request->name",
        ]);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->description = $request->des;
        $category->save();
        Session()->flash('success', 'Category Updated Successfully.!');
        return Redirect::to(route('category.update'))->withInput();
       // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        if($category){
            $category->delete();

            Session()->flash('success', 'Category Deleted Successfully.!');
            return Redirect::to(route('category.index'))->withInput();
        }
    }
}
