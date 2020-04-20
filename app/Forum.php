<?php

namespace App;
use Auth;

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

    public static function insererForum($titre,$texte){
        $forum = new Forum();
        $forum->user_id = Auth::id();
        $forum->sujet = $titre;
        $forum->texte = $texte;
        $forum->save();
    }
    /*public static function insertComment(Request $r){
        $forum = Forum::find($r->id);
       
    }*/
}
