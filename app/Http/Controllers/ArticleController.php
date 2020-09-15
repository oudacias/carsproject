<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\Articlescategorie;
use Session;

class ArticleController extends Controller
{
    //
    public function index(){
        $categorie = Articlescategorie::all();
        return view('Admin/Nouvel_article',['categorie'=>$categorie]);
    }



    public function articles(){
        if(Session::get('categorie')){
            if(count(Session::get('categorie')) == 1){
                $categorie = Articlescategorie::where("categorie","!=",Session::get('categorie'))->orderBy('categorie')->get();
                $articles = Article::where('categorie','=',Session::get('categorie'))->orderBy('created_at','desc')->get();
            }
            elseif(count(Session::get('categorie')) > 1){
                $categorie = Articlescategorie::whereNotIn('categorie',Session::get('categorie'))->get();
                $articles = Article::whereIn('categorie',Session::get('categorie'))->orderBy('created_at','desc')->get();
            }
        }else{
            $articles = Article::all()->sortByDesc('created_at');
            $categorie = Articlescategorie::all();
        }
        return view('Articles/Articles',['artc'=>$articles,'categories'=>$categorie]);
    }
    public function TrouverCategorie(Request $r)
    {
        if($r->categorie){
            if(Session::get('categorie')){
                if(!in_array($r->categorie, Session::get('categorie'))){
                    Session::push('categorie', $r->categorie);
                }
            }else{
                Session::push('categorie', $r->categorie);
            }
        }
        return redirect()->back()->withSuccess('Catégorie ajoute');
    }


    public function DeleteCategorie($categorie)
    {
        $allcategories = Session::get('categorie');
        Session::forget('categorie');   
        $key = array_search($categorie, $allcategories);
        unset($allcategories[$key]);
        foreach($allcategories as $r){
            Session::push('categorie', $r);
        }
        return redirect()->back()->withSuccess('Catégorie supprime');
    }






    public function article($id){
        $article = Article::find($id);
        $articles = Article::where('categorie','=',$article->categorie)
                            ->where('id','!=',$id)
                            ->orderBy('categorie','desc')->limit(2)->get();
        return view('Articles/Article',['artc'=>$article,'articles'=>$articles]);
    }
    public function AjouterCategorie(Request $r)
    {
        $categorie = new ArticlesCategorie();
        $categorie->categorie = $r->categorie;
        $categorie->save();
        return redirect()->back()->withSuccess('Nouvelle Categorie Crée');
    }
    
}