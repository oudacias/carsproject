<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public static function insererForum($titre,$texte){
        $forum = new Forum();
        $forum->user_id = Auth::id();
        $forum->sujet = $titre;
        $forum->texte = $texte;
        $forum->save();
    }
    public static function Confirmerforum($id){
        $forum = Forum::find($id);
        $forum->approuve = '1';
        $forum->save();
    }
}
