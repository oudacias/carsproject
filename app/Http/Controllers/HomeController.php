<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Boutique;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        
        $articles = Article::orderBy('created_at','desc')->limit(4)->get();
        return view('home',['artc'=>$articles,'boutique'=>$boutique]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

}
