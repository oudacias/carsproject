<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Boutique;
use App\Voiture;
use Auth;

class BoutiqueController extends Controller
{
    public function indexBoutique()
    {
        $voiture = Voiture::where("confirme","=",true)->get();
        return view('Boutique/boutique',['voiture'=>$voiture]);
    }
    public function ajouterBoutique(Request $r)
    {
        Boutique::ajouterBoutique($r->nom_boutique,$r->description_boutique,$r->type_boutique);
        return redirect()->back()->withSuccess('Boutique créée avec succès');

    }
}
