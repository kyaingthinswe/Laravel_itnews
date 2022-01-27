<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\Util\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        return $request;
        $request->validate([
           'title'=>'required|unique:categories,title',
        ]);
        $category = new Category();
        $category->title = $request->title;
        $category->cat_slug = \Illuminate\Support\Str::slug($request->title);
        $category->user_id = Auth::id();
        $category->save();

        return redirect()->route('category.index')->with('status','Category is created');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('category.edit',compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
//        return $request;
        $request->validate([
            'title'=>'required|unique:categories,title,'.$category->id,
        ]);

        $category->title = $request->title;
        $category->cat_slug = \Illuminate\Support\Str::slug($request->title);

//        $category->user_id = Auth::id();
        $category->update();

        return redirect()->route('category.index')->with('status','Category is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
//        return $category;
        $title = $category->title;
        $category->delete();

        return redirect()->route('category.index')->with('status',$title .' is deleted');
    }
}
