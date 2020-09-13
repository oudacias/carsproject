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
        $nom_boutique = Boutique::all();
        return view('Boutique/boutique',['voiture'=>$voiture,'nom_boutique'=>$nom_boutique]);
    }
    public function ajouterBoutique(Request $r)
    {
        Boutique::ajouterBoutique($r->nom_boutique,$r->file('boutique_image'),$r->description_boutique,$r->ville);
        return redirect()->back()->withSuccess('Boutique créée avec succès');

    }
    public function NewBoutique()
    {
        return view('Boutique/nouvelle_boutique');
    }
}
