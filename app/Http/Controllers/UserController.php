<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contact;
use App\Boutique;
use Auth;
use App\Voiture;
use App\Voitureoccasion;
use App\Voitureimage;
use App\Userimage;
use DateTime;

class UserController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        return view('profile',['user'=>$user]);
    }
    public function ajouterVoiture(Request $r)
    {
        $voiture = new Voiture();
        $voiture->user_id = Auth::id();
        $voiture->boutique_id = $r->boutique;
        $voiture->marque = $r->marque;
        $voiture->model = $r->model;
        $voiture->version = $r->version;
        $voiture->carburant = $r->carburant;
        $voiture->boite_vitesse = $r->boite_vitesse;
        $voiture->annee = $r->annee;
        $voiture->origine = $r->origine;
        $voiture->kilometrage = $r->kilometrage;
        $voiture->couleur = $r->couleur;
        $voiture->carrosserie = $r->carrosserie;
        $voiture->nbr_porte = $r->nbt_porte;
        $voiture->puissance_fiscale = $r->puissance_fiscale;
        $voiture->premiere_main = $r->premiere_main;
        $voiture->prepare = $r->prepare;
        $dt = new DateTime();
        $image_path = $voiture->marque.$dt->format('H_i_s').'.'.$r->file('voiture_image')->getClientOriginalExtension();
        $r->file('voiture_image')->move(public_path('/image_uploads'), $image_path);
        $voiture->photo = '/image_uploads/'.$image_path;
        $voiture->prix = $r->prix;
        $voiture->options = $r->option;
        $voiture->description = $r->description;
        $boutique = Boutique::find($r->boutique);
        if($boutique->type_boutique = 'Professionnel'){
            $voiture->confirme = true;
        }
        
        $voiture->save();
        if($r->etat){
            $voitureo = new Voitureoccasion();
            $voitureo->voiture_id=$voiture->id;
            $voitureo->etat = $r->etat;
            $voitureo->ville = $r->ville;
            $voitureo->save();
        }
        if($r->image1){
            $voiturei = new Voitureimage();
            $voiturei->voiture_id=$voiture->id;
            $image_path = $voiture->id.$dt->format('H_i_s').'.'.$r->file('image1')->getClientOriginalExtension();
            $r->file('image1')->move(public_path('/image_uploads'), $image_path);
            $voiturei->image1='/image_uploads/'.$image_path;
            if($r->image2){
                $image_path = $voiture->id.$dt->format('H_i_s').'.'.$r->file('image2')->getClientOriginalExtension();
                $r->file('image2')->move(public_path('/image_uploads'), $image_path);
                $voiturei->image2='/image_uploads/'.$image_path;
                if($r->image3){
                    $image_path = $voiture->id.$dt->format('H_i_s').'.'.$r->file('image3')->getClientOriginalExtension();
                    $r->file('image3')->move(public_path('/image_uploads'), $image_path);
                    $voiturei->image3='/image_uploads/'.$image_path;
                }
            }
            $voiturei->save();
        }

        return redirect()->back()->withSuccess('Voiture Ajoutée');
    
    }
    public function contactme()
    {
        return view('Contact/contact');
    }
    public function AddContact(Request $r)
    {
        Contact::AddContact($r->email,$r->sujet,$r->texte);
        return redirect()->back()->withSuccess('Votre Message Envoyé');
    }
    public function removeCar($id)
    {
        $voitureO = Voitureoccasion::where('voiture_id','=',$id)->first();
        if($voitureO){
            Voitureoccasion::destroy($voitureO->id);
        }
        Voiture::destroy($id);
        return redirect()->back()->withSuccess('Voiture Supprimée');
    }
    public function modifierProfile(Request $r)
    {
        $user = Userimage::where('user_id','=',Auth::id())->first();
        $dt = new DateTime();
        $image_path = $user->id.$dt->format('H_i_s').'.'.$r->file('image')->getClientOriginalExtension();
        $r->file('image')->move(public_path('/image_uploads'), $image_path);
        $user->image_path='/image_uploads/'.$image_path;
        $user->save();
        return redirect()->back()->withSuccess('Profile modifié');
        
    }
}
