<?php

namespace App;
use Auth;
use Str;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function users()
    {
        return $this->belongsToMany('App\Forum','user_forum')->withPivot('user_id','commentaire');
    }

    public static function insererForum($titre,$theme,$texte){
        $forum = new Forum();
        $forum->user_id = Auth::id();
        $forum->sujet = $titre;
        $forum->sujet_slug = Str::slug($forum->sujet);;
        $forum->theme = $theme;
        $forum->texte = $texte;
        $forum->save();
    }
    /*public static function insertComment(Request $r){
        $forum = Forum::find($r->id);
       
    }*/
}
