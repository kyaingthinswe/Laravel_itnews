<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(){
//        $aa= Article::all();
//        foreach ($aa as $a){
//            $a->slug = Str::slug($a->title)."_".uniqid();
//            $a->cat_slug = Str::slug($a->category->title)."_".uniqid();
//            $a->update();
//        }

//                $aa= Category::all();
//        foreach ($aa as $a){
//            $a->slug = Str::slug($a->title)."_".uniqid();
//            $a->update();
//        }
        $articles = Article::when(isset(request()->search),function ($q){
            $s = request()->search;
            return $q->orwhere('title','like',"%$s%")->orwhere('description','like',"%$s%");
        })->with(['user','category'])->latest('id')->paginate(7);
//        return $articles;
        return view('welcome',compact('articles'));
    }

    public function detail($slug){

       $article = Article::where('slug',$slug)->first();
       if (empty($article)){
           return abort('404');
       }
       return view('blog.detail',compact('article'));
    }

    public function baseOnCategory($id){
//        return $slug;
        $articles = Article::when(isset(request()->search),function ($q){
            $s = request()->search;
            return $q->orwhere('title','like',"%$s%")->orwhere('description','like',"%$s%");
        })->where('category_id',$id)->with(['user','category'])->latest('id')->paginate(7);
//        return $articles;
        return view('welcome',compact('articles'));
    }

    public function baseOnUser($id){
        $articles = Article::where('user_id',$id)->when(isset(request()->search),function ($q){
            $s = request()->search;
            return $q->orwhere('title','like',"%$s%")->orwhere('description','like',"%$s%");
        })->with(['user','category'])->latest('id')->paginate(7);
//        return $articles;
        return view('welcome',compact('articles'));

    }

    public function baseOnDate($date){
//        return $date;
        $articles = Article::where('created_at',$date)->when(isset(request()->search),function ($q){
            $s = request()->search;
            return $q->orwhere('title','like',"%$s%")->orwhere('description','like',"%$s%");
        })->with(['user','category'])->latest('id')->paginate(7);
//        return $articles;
        return view('welcome',compact('articles'));

    }

}
