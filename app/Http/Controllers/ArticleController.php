<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $all = Article::all();
//        foreach ($all as $a){
//            $a->slug = Str::slug($a->title)."_".uniqid();
//            $a->update();
//        }


        $articles = Article::when(isset(request()->search),function ($q){
            $s = request()->search;
            return $q->orwhere('title','like',"%$s%")->orwhere('description','like',"%$s%");
        })->with(['user','category'])->latest('id')->paginate(7);
//return $articles;
        return view('article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category'=>'required|exists:categories,id',
            'title'=> 'required|max:100',
            'description' => 'required|min:10'
        ]);

        $article = new Article();

        $article->title = $request->title;
        $article->slug = Str::slug($request->title)."_".uniqid();
        $article->description = $request->description;
        $article->category_id = $request->category;
        $article->user_id = Auth::id();
        $article->save();

        return redirect()->route('article.index')->with('status','Aritcle is Created');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'category'=>'required|exists:categories,id',
            'title'=> 'required|max:100',
            'description' => 'required|min:10'
        ]);

//        $cat = new Category();
        $article->title = $request->title;
        $article->slug = Str::slug($request->title)."_".uniqid();
//        $article->cat_slug = Str::slug($article->category->title)."_".uniqid();
        $article->description = $request->description;
        $article->category_id = $request->category;
        $article->update();

        return redirect()->route('article.index')->with('status','Article is Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
//        return $article;
        $article->delete();
        return redirect()->route('article.index',['page'=>\request()->page])->with('status','Article is deleted');
    }
}
