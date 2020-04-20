<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use App\User;
use Auth;

class ForumController extends Controller
{
    public function index(){
        //$forum = Forum::all()->where('approuve',1)->sortByDesc('created_at');
        $forum = Forum::all()->where('approuve',null)->sortByDesc('created_at');
        return view ('Forum/Forums',['forums'=>$forum]);
    }
    public function Sujet(Request $r){
        Forum::insererForum($r->titre,$r->sujet);
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
        return redirect()->back()->withSuccess('Votre sujet est en cours');
    }
}
