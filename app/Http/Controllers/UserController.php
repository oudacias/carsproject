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
use App\Forum;
use DateTime;
use DB;
use App\Article;

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

        $options ="";
        for($i =0; $i < count($r->option) ;$i++){
            $options .= $r->option[$i];
            $options .= " ";
        }
        
        $voiture->options = $options;
        $voiture->ville = $r->ville;
        $voiture->description = $r->description;
        
        
        $voiture->save();
        if($r->etat){
            $voiture->type = "occasion";
            $voitureo = new Voitureoccasion();
            $voitureo->voiture_id=$voiture->id;
            $voitureo->etat = $r->etat;
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
    public function AfficherForum()
    {
        $forum = Forum::where('user_id','=',Auth::id())->get();
        return view('User/myForums',['forum'=>$forum]);
    }
    public function AfficherComments()
    {
        $user = User::find(Auth::id());
        return view('User/myComments',['user'=>$user]);
    }
    public function AfficherArcticle()
    {
        $forum = Forum::where('user_id','=',Auth::id())->get();
        return view('User/myForums',['form'=>$forum]);
    }
    public function SupprimerForum($id)
    {
        Forum::destroy($id);
        return redirect()->back()->withSuccess('Forum Supprimé');
    }
    public function SupprimerCommentaire($id)
    {
        DB::table('user_forum')->where('id', '=', $id)->delete();
        return redirect()->back()->withSuccess('Forum Supprimé');
    }
    public function AjouterArticle($id)
    {   
        $article = Article::find($id);
        $user = User::find(Auth::id());
        $user->articles()->attach($article->id);
        return redirect()->back()->withSuccess('Article Ajouté');
    }
    public function AfficherArticles()
    {
        $user = User::find(Auth::id());
        return view('/User/myArticles',['user'=>$user]);
    }
    public function SupprimerFavoris($id)
    {
        DB::table('user_article')->where('id', '=', $id)
        ->delete();
        return redirect()->back()->withSuccess('Forum Supprimé');
    }
    public function ChercherVoiture(Request $r)
    {
        if($r->input('action')=='detail_voiture'){        
            if($r->ville != "0" && !$r->prix){
                    $voiture = Voiture::where('ville','=',$r->ville)
                                        ->orderBy('created_at','desc')
                                        ->get();
                
            }elseif($r->ville != "0" && $r->prix){
                    $voiture = Voiture::where('ville','=',$r->ville)
                                            ->where('prix','<',$r->prix)
                                            ->orderBy('created_at','desc')
                                            ->get();
           }elseif($r->ville == "0" && $r->prix){
                $voiture = Voiture::where('prix','<',$r->prix)
                                    ->orderBy('created_at','desc')
                                    ->get();
            }
        }elseif($r->input('action') == "nom_boutique"){
                $voiture = Voiture::where('boutique_id','=',$r->id_boutique)->get();
            }elseif($r->input('action')=='autres_boutique'){
                if($r->ville_boutique != "0"){
                    $b = Boutique::where('ville_boutique','=',$r->ville_boutique)
                                    ->get('id');
                    $voiture = Voiture::whereIn('boutique_id',$b)->get();
                }
            }if($r->input('action')=='plusdetails'){
                if($r->marque !="0" && $r->model !="0" && $r->carburant !="0" && $r->vitesse !="0"){
                    $voiture = Voiture::where('marque','=',$r->marque)
                                        ->where('model','=',$r->model)
                                        ->where('carburant','=',$r->carburant)
                                        ->where('boite_vitesse','=',$r->vitesse)
                                        ->orderBy('created_at','desc')
                                        ->get();

                }elseif($r->marque !="0" && $r->model !="0" && $r->carburant !="0" && $r->vitesse =="0"){
                    $voiture = Voiture::where('marque','=',$r->marque)
                                        ->where('model','=',$r->model)
                                        ->where('carburant','=',$r->carburant)
                                        ->orderBy('created_at','desc')
                                        ->get();
                }elseif($r->marque !="0" && $r->model !="0" && $r->carburant =="0" && $r->vitesse =="0"){
                    $voiture = Voiture::where('marque','=',$r->marque)
                                        ->where('model','=',$r->model)
                                        ->orderBy('created_at','desc')
                                        ->get();

                }elseif($r->marque !="0" && $r->model =="0" && $r->carburant !="0" && $r->vitesse !="0"){
                    $voiture = Voiture::where('marque','=',$r->marque)
                                        ->where('carburant','=',$r->carburant)
                                        ->where('boite_vitesse','=',$r->vitesse)
                                        ->orderBy('created_at','desc')
                                        ->get();

                }elseif($r->marque !="0" && $r->model =="0" && $r->carburant =="0" && $r->vitesse !="0"){
                    $voiture = Voiture::where('marque','=',$r->marque)
                                        ->where('boite_vitesse','=',$r->vitesse)
                                        ->orderBy('created_at','desc')
                                        ->get();

                }elseif($r->marque !="0" && $r->model =="0" && $r->carburant =="0" && $r->vitesse =="0"){
                    $voiture = Voiture::where('marque','=',$r->marque)
                                        ->orderBy('created_at','desc')
                                        ->get();

                }elseif($r->marque =="0" && $r->model =="0" && $r->carburant !="0" && $r->vitesse !="0"){
                    $voiture = Voiture::where('carburant','=',$r->carburant)
                                        ->where('boite_vitesse','=',$r->vitesse)
                                        ->orderBy('created_at','desc')
                                        ->get();
     
                }elseif($r->marque =="0" && $r->model =="0" && $r->carburant !="0" && $r->vitesse =="0"){
                    $voiture = Voiture::where('carburant','=',$r->carburant)
                                        ->orderBy('created_at','desc')
                                        ->get();  
       
                }elseif($r->marque =="0" && $r->model =="0" && $r->carburant =="0" && $r->vitesse !="0"){
                    $voiture = Voiture::where('boite_vitesse','=',$r->vitesse)
                                        ->orderBy('created_at','desc')
                                        ->get();
                }else{
                    return redirect()->back()->withSuccess('');
                }       
            }
            $nom_boutique = Boutique::all();
           if($voiture->count()){
                return view('boutique/boutique',['voiture'=>$voiture,'nom_boutique'=>$nom_boutique]);
            }else{
                return redirect()->back()->withSuccess('Pas de voiture trouvée');
            }
        }
        public function rechercheB($id)
        {
            $voiture = Voiture::where('boutique_id','=',$id)->get();
            $nom_boutique = Boutique::all();
            return view('boutique/boutique',['voiture'=>$voiture,'nom_boutique'=>$nom_boutique]);
        }
    
    
    
}
