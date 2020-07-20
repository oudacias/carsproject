<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;


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
        return view('home',['artc'=>$articles]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

}
