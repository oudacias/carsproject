<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use App\User;
use Auth;
use App\Forumtheme;
use Session;
use Pusher\Pusher;
use App\Notificationforum;


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
            $forum = Forum::orderBy('created_at', 'desc')->paginate(1);
            $theme = Forumtheme::all();
        }
        return view ('Forum/Forums',['forums'=>$forum,'theme'=>$theme]);
    }
    public function Sujet(Request $r){
        Forum::insererForum($r->titre,$r->theme,$r->sujet);
        return redirect()->back()->withSuccess('Votre sujet est disponible');
    }
    public function Forum($id){
        $forums = Forum::find($id)->first();

        $user_pic = $forums->user->Userimage->image_path;


        $forum = Forum::where('theme','=',$forums->theme)
                        ->where('id','!=',$id)
                        ->orderBy('created_at','desc')->limit(3)->get();
        if($forums->user_id = Auth::id()){
            Notificationforum::where('user_id',Auth::id())->where('forum_id',$forums->id)->update(['vu'=>true]);
        }
        return view ('Forum/Forum',['forum'=>$forums,'otherforums'=>$forum,'user_pic'=>$user_pic]);
    }
    public function insertComment(Request $r){
        $forum = Forum::find($r->id);
        $user = User::find(Auth::id());
        $user->forums()->attach($forum->id,['commentaire' => $r->commentaire]);



        $notificationforums = new Notificationforum();
        $notificationforums->user_id = $forum->user_id;
        $notificationforums->forum_id = $forum->id;
        $notificationforums->forum_nom = $forum->sujet;
        $notificationforums->save();

        //Remember to change this with your cluster name.
        $options = array(
            'cluster' => 'mt1',
            'encrypted' => true
        );

        //Remember to set your credentials below.
        $pusher = new Pusher(
            'e22834bea53871f1ab35',
            'e76dc5f68506f1cfe69e',
            '1075023',
            $options
        );

        
        //Send a message to notify channel with an event name of notify-event
        $pusher->trigger('notify'.$notificationforums->user_id, 'notify-event', $notificationforums);




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
    public function closeNotification($id)
    {
        Notificationforum::where('id',$id)->update(['vu'=>true]);
        return redirect()->back()->withSuccess('');
    }
    
}
