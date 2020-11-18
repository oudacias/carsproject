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
use App\Publicite;
use Str;
use App\Seodata;
use App\Pagedata;

class ForumController extends Controller
{
    public function index(){
        $page_forum = Pagedata::where('page',"=","Forum")->orderBy('created_at','desc')->first();

        $seo_forum = Seodata::where('page',"=","Forum")->orderBy('created_at','desc')->first();

        $pub_g = Publicite::where('nom_page',"=",'/ForumEocars')->where('emplacement',"=",'Gauche')->orderBy('created_at','desc')->limit(1)->get();
        $pub_d = Publicite::where('nom_page',"=",'/ForumEocars')->where('emplacement',"=",'Droite')->orderBy('created_at','desc')->limit(1)->get();
        $pub_h = Publicite::where('nom_page',"=",'/ForumEocars')->where('emplacement',"=",'Haut')->orderBy('created_at','desc')->limit(1)->get();
        $pub_m = Publicite::where('nom_page',"=",'/ForumEocars')->where('emplacement',"=",'Milieu')->orderBy('created_at','desc')->limit(1)->get();
        
        
        $forum = Forum::orderBy('created_at', 'desc')->paginate(10);
        $theme = Forumtheme::all();
    
        return view ('Forum/Forums',['forums'=>$forum,'theme'=>$theme,'pub_g'=>$pub_g,'pub_d'=>$pub_d,'pub_h'=>$pub_h,'pub_m'=>$pub_m,'seo_forum'=>$seo_forum,'page_forum'=>$page_forum]);
    }
    public function indexTheme($theme){
        $pub_g = Publicite::where('nom_page',"=",'/ForumEocars')->where('emplacement',"=",'Gauche')->orderBy('created_at','desc')->limit(1)->get();
        $pub_d = Publicite::where('nom_page',"=",'/ForumEocars')->where('emplacement',"=",'Droite')->orderBy('created_at','desc')->limit(1)->get();
        $pub_h = Publicite::where('nom_page',"=",'/ForumEocars')->where('emplacement',"=",'Haut')->orderBy('created_at','desc')->limit(1)->get();
        $pub_m = Publicite::where('nom_page',"=",'/ForumEocars')->where('emplacement',"=",'Milieu')->orderBy('created_at','desc')->limit(1)->get();
        
        
        $forum = Forum::where('theme','=',$theme)->orderBy('created_at', 'desc')->paginate(10);
        $themes = Forumtheme::all();
    
        return view ('Forum/ForumTheme',['forums'=>$forum,'theme'=>$themes,'pub_g'=>$pub_g,'pub_d'=>$pub_d,'pub_h'=>$pub_h,'pub_m'=>$pub_m]);
    }
    public function Sujet(Request $r){
        Forum::insererForum($r->titre,$r->theme,$r->sujet);
        return redirect()->back()->withSuccess('Votre sujet est disponible');
    }

    
    public function Forum($id,$sujet_slug){
        $forums = Forum::find($id);
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
        $notificationforums->forum_nom = Str::slug($forum->sujet);
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
    
    public function closeNotification($id)
    {
        Notificationforum::where('id',$id)->update(['vu'=>true]);
        return redirect()->back()->withSuccess('');
    }
    
}
