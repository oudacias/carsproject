<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    public function boutique(){
        return $this->belongsTo('App\Boutique','boutique_id');
    }
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function voitureimage(){
        return $this->hasMany('App\Voitureimage','voiture_id');
    }
    public function achatvoiture(){
        return $this->hasOne('App\Achatvoiture','voiture_id');
    }
    public function voitureoccasion(){
        return $this->hasOne('App\Voitureoccasion','voiture_id');
    }
    public function voitureclick()
    {
        return $this->hasOne('App\Voitureclick','voiture_id');
    }
}
