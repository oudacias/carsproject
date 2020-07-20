<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Boutique extends Model
{
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function voiture(){
        return $this->hasMany('App\Voiture','boutique_id');
    }
    public static function ajouterBoutique($nom_boutique,$description_boutique,$type_boutique)
    {
        $boutique = new Boutique();
        $boutique->user_id = Auth::id();
        $boutique->nom_boutique = $nom_boutique;
        $boutique->description_boutique = $description_boutique;
        $boutique->type_boutique = $type_boutique;
        $boutique->save();

    }
}
