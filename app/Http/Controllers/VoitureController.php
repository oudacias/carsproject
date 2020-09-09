<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Voiture;
use App\Boutique;


class VoitureController extends Controller
{
    //

    public function FormVoiture()
    {
        $user = User::find(Auth::id());
        return view('boutique/voiture',['user'=>$user]);
    }
    public function VoitureDetails($id)
    {
        $voiture = Voiture::find($id);
        return view('boutique/voitureDetails',['voiture'=>$voiture]);
    }
    public function TrouverBoutique($id)
    {
        $boutique = Boutique::find($id);
        return view('boutique/boutique_voiture',['boutique'=>$boutique]);
    }
}
