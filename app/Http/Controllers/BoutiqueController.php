<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Boutique;
use App\Voiture;
use Auth;
use DateTime;


class BoutiqueController extends Controller
{
    public function indexBoutique()
    {
        $voiture = Voiture::where('vendu',false)->orderBy('created_at','desc')->get();
        $nom_boutique = Boutique::all();
        return view('Boutique/boutique',['voiture'=>$voiture,'nom_boutique'=>$nom_boutique,'msg'=>'']);
    }
    public function ajouterBoutique(Request $r)
    {
        $boutique = Boutique::where('nom_boutique','=',$r->nom_boutique)->get();
        echo($boutique->count());

        if($boutique->count() == 0){
            $boutique = new Boutique();
            $boutique->user_id = Auth::id();
            $boutique->nom_boutique = $r->nom_boutique;
            $boutique->description_boutique = $r->description_boutique;
            $dt = new DateTime();
            $image_path = $boutique->nom_boutique.$dt->format('H_i_s').'.'.$r->file('boutique_image')->getClientOriginalExtension();
            $r->file('boutique_image')->move(public_path('/image_uploads'), $image_path);
            $boutique->lien_image = '/image_uploads/'.$image_path;
            $boutique->ville_boutique = $r->ville_boutique;
            $boutique->save();
            return redirect()->back()->withSuccess('Boutique créée avec succès');
        }else{
            return redirect()->back()->withSuccess('Nom de la boutique est déjà utilisé');
        }

    }
    public function NewBoutique()
    {
        return view('Boutique/nouvelle_boutique');
    }
    public function modifyBoutique(Request $r)
    {
        $boutique = Boutique::where('nom_boutique','=',$r->nom_boutique)
                                ->where('id','!=',$r->id_boutique)->get();
        if($boutique->count()==0){
            $boutique = Boutique::find($r->id_boutique);
            $boutique->nom_boutique = $r->nom_boutique;
            $boutique->description_boutique = $r->description_boutique;
            $boutique->ville_boutique = $r->ville_boutique;
            $boutique->save();
            return redirect()->back()->withSuccess('La boutique a été modifiée');
        }else{
            return redirect()->back()->withSuccess('Nom de boutique utilisé');
        }
    }
    public function supprimerBoutique($id)
    {
        Voiture::where('boutique_id','=',$id)->delete();
        Boutique::destroy($id);
        return redirect()->back()->withSuccess('La boutique a été supprimée');
    }
    public function modifierImage(Request $r)
    {
        $boutique = Boutique::find($r->boutique_id);
        $dt = new DateTime();
        $image_path = $boutique->nom_boutique.$dt->format('H_i_s').'.'.$r->file('imageBoutique')->getClientOriginalExtension();
        $r->file('imageBoutique')->move(public_path('/image_uploads'), $image_path);
        $boutique->lien_image = '/image_uploads/'.$image_path;
        $boutique->save();
        return redirect()->back()->withSuccess('Image modifiée');

    }

}
