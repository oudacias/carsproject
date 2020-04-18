<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;

class ForumController extends Controller
{
    public function index(){
        $forum = Forum::all()->sortByDesc('created_at');
        return view ('Forum/Forums',['forums'=>$forum]);
    }
    public function ajouterSujet(Request $r){
        Forum::insererForum($r->titre,$r->sujet);
        return redirect()->back()->withSuccess('Votre sujet est en cours');
    }
    public function Forum($id){
        $forums = Forum::find($id);
        return view ('Forum/Forum',['forum'=>$forums]);
    }
}
