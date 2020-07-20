<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voitureoccasion extends Model
{
    public function occasion(){
        return $this->belongsTo('App\Voiture','voiture_id');
    }
}
