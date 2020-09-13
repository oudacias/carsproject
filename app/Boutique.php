<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DateTime;


class Boutique extends Model
{
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function voiture(){
        return $this->hasMany('App\Voiture','boutique_id');
    }
    public static function ajouterBoutique($nom_boutique,$image,$description_boutique,$ville_boutique)
    {
        $boutique = new Boutique();
        $boutique->user_id = Auth::id();
        $boutique->nom_boutique = $nom_boutique;
        $boutique->description_boutique = $description_boutique;
        $dt = new DateTime();
        $image_path = $boutique->nom_boutique.$dt->format('H_i_s').'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/image_uploads'), $image_path);
        $boutique->lien_image = '/image_uploads/'.$image_path;
        $boutique->ville_boutique = $ville_boutique;

        $boutique->save();

    }
}
