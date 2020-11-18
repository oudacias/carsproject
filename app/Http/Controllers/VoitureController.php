<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Voiture;
use App\Boutique;
use App\Voitureclick;
use App\Achatvoiture;
use App\Voiturevu;

class VoitureController extends Controller
{
    //

    public function FormVoiture()
    {
        $user = User::find(Auth::id());
        return view('Boutique/voiture',['user'=>$user]);
    }
    public function VoitureDetails($id)
    {
        $voiture = Voiture::find($id);
        $voiture->nbr_vu =  $voiture->nbr_vu +1;
        $voiture->save();
        
        return view('Boutique/voitureDetails',['voiture'=>$voiture]);
    }
    public function TrouverBoutique($nom_boutique)
    {
        $boutique = Boutique::where('nom_boutique','=',$nom_boutique)->first();
        $nom_boutique = Boutique::all();
        return view('Boutique/boutique_voiture',['boutique'=>$boutique,'nom_boutique'=>$nom_boutique,'msg'=>'']);
    }
    public function NumberClick(Request $r)
    {
        $click = Voitureclick::where('voiture_id','=',$r->voiture_id)->first();
        if($click){
            $click->click_nbr += 1;
        }else{
            $click = new Voitureclick();
            $click->voiture_id = $r->voiture_id;
            $click->click_nbr = 1;
        }
        $click->save();

        if($r->click_nbr == 'mobile'){
            return redirect()->away("whatsapp://send?phone=".$r->tel);
        }else{
            return redirect()->away("https://web.whatsapp.com/send?phone=".$r->t);
        }
    }
    public function vendreVoiture($id)
    {
        $v = new Achatvoiture();
        $v->voiture_id = $id;
        $v->user_id = Auth::user()->id;
        $v->vendue = True;
        $v->save();
        return redirect()->back()->withSuccess('Voiture Vendue');
    }
}
