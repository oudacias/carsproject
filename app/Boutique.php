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
    
}
