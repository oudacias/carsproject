<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\Articlescategorie;
use Session;
use App\Publicite;
use Illuminate\Support\Str;
use App\Seodata;
use App\Pagedata;

class ArticleController extends Controller
{
    //
    public function index(){
        $categorie = Articlescategorie::all();
        return view('Admin/Nouvel_article',['categorie'=>$categorie]);
    }

    public function articles(){
        $seo_article = Seodata::where('page',"=","Magazine")->orderBy('created_at','desc')->first();
        $page_article = Pagedata::where('page',"=","Magazine")->orderBy('created_at','desc')->first();
        $pub_g = Publicite::where('nom_page',"=",'/MagazineEocars')->where('emplacement',"=",'Gauche')->orderBy('created_at','desc')->limit(1)->get();
        $pub_d = Publicite::where('nom_page',"=",'/MagazineEocars')->where('emplacement',"=",'Droite')->orderBy('created_at','desc')->limit(1)->get();
        $pub_h = Publicite::where('nom_page',"=",'/MagazineEocars')->where('emplacement',"=",'Haut')->orderBy('created_at','desc')->limit(1)->get();
        $pub_m = Publicite::where('nom_page',"=",'/MagazineEocars')->where('emplacement',"=",'Milieu')->orderBy('created_at','desc')->limit(1)->get();
        $articles = Article::orderBy('created_at','desc')->get();
        $categorie = Articlescategorie::all();
        return view('Articles/Articles',['artc'=>$articles,'categories'=>$categorie,'pub_g'=>$pub_g,'pub_d'=>$pub_d,'pub_h'=>$pub_h,'pub_m'=>$pub_m,'seo_article'=>$seo_article,'page_article'=>$page_article]);
    }
    public function TrouverCategorie($categorie)
    {
        $seo_article = Seodata::where('page',"=","Magazine")->orderBy('created_at','desc')->first();
        $pub_g = Publicite::where('nom_page',"=",'/MagazineEocars')->where('emplacement',"=",'Gauche')->orderBy('created_at','desc')->limit(1)->get();
        $pub_d = Publicite::where('nom_page',"=",'/MagazineEocars')->where('emplacement',"=",'Droite')->orderBy('created_at','desc')->limit(1)->get();
        $pub_h = Publicite::where('nom_page',"=",'/MagazineEocars')->where('emplacement',"=",'Haut')->orderBy('created_at','desc')->limit(1)->get();
        $pub_m = Publicite::where('nom_page',"=",'/MagazineEocars')->where('emplacement',"=",'Milieu')->orderBy('created_at','desc')->limit(1)->get();

        $articles = Article::where('categorie','=',$categorie)->orderBy('created_at','desc')->get();
        $categorie = Articlescategorie::all();

    
    
        return view('Articles/ArticleTheme',['artc'=>$articles,'categories'=>$categorie,'pub_g'=>$pub_g,'pub_d'=>$pub_d,'pub_h'=>$pub_h,'pub_m'=>$pub_m,'seo_article'=>$seo_article]);
 
    }

    public function article($id,$slug){
        $article = Article::find($id);
        $articles = Article::where('categorie','=',$article->categorie)
                            ->where('id','!=',$article->id)
                            ->orderBy('categorie','desc')->limit(2)->get();
        return view('Articles/Article',['artc'=>$article,'articles'=>$articles]);
    }




    
    
}