<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Forum;
use App\User;

class AdminController extends Controller
{
    public function login(){
        return view ('auth/login_admin');
    }
    public function articles(){
        $articles = Article::all()->sortByDesc('created_at');
        return view('Admin/Admin_articles',['artc'=>$articles]);
    }
    public function insererArticle(Request $r){
        Article::insererArticle($r->titre,$r->texte,$r->file('lien_image'),$r->lien_youtube);
    }
    public function index(){
         return view('Admin/Admin_articles');
    }
    public function SupprimerArticle($id){
        Article::destroy($id);
        return redirect()->back()->withSuccess('Article Supprimé');
    }
    public function Article($id){
        $article = Article::find($id);
        return view('Admin/ModifierArticle',['artc'=>$article]);
    }
    public function ModifierArticle(Request $r){
        Article::ModifierArticle($r->id_article,$r->titre,$r->texte,$r->lien_youtube);
   }
    public function forum(){
        $forum = Forum::all()->where('approuve',1)->sortByDesc('created_at');
        return view('Admin/Admin_forum',['frm'=>$forum]);
    }
    public function Supprimerforum($id){
        $forum = Forum::destroy($id);
        return redirect()->back()->withSuccess('Article Supprimé');
    }
    public function Confirmerforums($id){
        $forum = Forum::Confirmerforum($id);
        return redirect()->back()->withSuccess('Article Supprimé');
    }
    public function listusers(){
        $users = User::all()->sortByDesc('created_at');
        return view('Admin/Admin_users',['user'=>$users]);
    }
    public function SupprimerUser($id){
        $user = User::destroy($id);
        return redirect()->back()->withSuccess('Article Supprimé');
    }
}
