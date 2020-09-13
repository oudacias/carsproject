<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use App\User;
use Auth;
use App\Forumtheme;
use Session;


class ForumController extends Controller
{
    public function index(){
        if(Session::get('theme')){
            if(count(Session::get('theme')) == 1){
                $theme = Forumtheme::where("theme","!=",Session::get('theme'))->orderBy('theme')->get();
                $forum = Forum::where('theme','=',Session::get('theme'))->orderBy('created_at','desc')->get();
            }
            elseif(count(Session::get('theme')) > 1){
                $theme = Forumtheme::whereNotIn('theme',Session::get('theme'))->get();
                $forum = Forum::whereIn('theme',Session::get('theme'))->orderBy('created_at','desc')->get();
            }
        }else{
            $forum = Forum::orderBy('created_at', 'desc')->get();;
            $theme = Forumtheme::all();
        }
        return view ('Forum/Forums',['forums'=>$forum,'theme'=>$theme]);
    }
    public function Sujet(Request $r){
        Forum::insererForum($r->titre,$r->theme,$r->sujet);
        return redirect()->back()->withSuccess('Votre sujet est en cours');
    }
    public function Forum($id){
        $forums = Forum::find($id);
        return view ('Forum/Forum',['forum'=>$forums]);
    }
    public function insertComment(Request $r){
        $forum = Forum::find($r->id);
        $user = User::find(Auth::id());
        $user->forums()->attach($forum->id,['commentaire' => $r->commentaire]);
        return redirect()->back()->withSuccess('Commentaire ajouté');
    }
    public function AjouterTheme(Request $r)    
    {
        $theme = new Forumtheme();
        $theme->theme = $r->theme;
        $theme->save();
        return redirect()->back()->withSuccess('Nouveau Thème Crée');
    }
    public function TrouverTheme(Request $r)
    {
        if($r->theme){
            if(Session::get('theme')){
                if(!in_array($r->theme, Session::get('theme'))){
                    Session::push('theme', $r->theme);
                }
            }else{
                Session::push('theme', $r->theme);
            }
        }

        return redirect()->back()->withSuccess('Theme ajoute');
    }
    public function DeleteTheme($themes)
    {
        $allthemes = Session::get('theme');
        Session::forget('theme');   
        $key = array_search($themes, $allthemes);
        unset($allthemes[$key]);
        foreach($allthemes as $r){
            Session::push('theme', $r);
        }
        return redirect()->back()->withSuccess('Theme supprime');
    }
    
}
