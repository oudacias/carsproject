<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class ArticleController extends Controller
{
    //
    public function index(){
        return view('Admin/Nouvel_article');
    }
    public function articles(){
        $articles = Article::all()->sortByDesc('created_at');
        return view('Articles/Articles',['artc'=>$articles]);
    }
    public function article($id){
        $article = Article::find($id);
        return view('Articles/Article',['artc'=>$article]);
    }
    
}