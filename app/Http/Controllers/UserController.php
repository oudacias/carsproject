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
use Illuminate\Support\Str;
use App\Seodata;
use App\Pagedata;

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
        if($r->file('other_images')){
            foreach ($r->file('other_images') as $images){
                $voiturei = new Voitureimage();
                $voiturei->voiture_id=$voiture->id;
                $image_path = $voiture->id.$dt->format('H_i_s').'.'.$images->getClientOriginalExtension();
                $images->move(public_path('/image_uploads'), $image_path);
                $voiturei->image1='/image_uploads/'.$image_path;
                $voiturei->save();
            }
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
    public function ChercherVoitureBoutique(Request $r)
    {
        $nom_boutique = Boutique::all();
        $boutique = Boutique::where('nom_boutique','=',$r->nom_boutique)->first();         
        return view('Boutique/boutique_voiture',['boutique'=>$boutique,'nom_boutique'=>$nom_boutique,'msg'=>'']);
    }
    public function ChercherBoutiqueVille(Request $r)
    {
        $page_boutique = Pagedata::where('page',"=","Boutique")->orderBy('created_at','desc')->first();
        $seo_boutique = Seodata::where('page',"=","Boutique")->orderBy('created_at','desc')->first();
        $boutique_pro = Boutique::where('ville_boutique','=',$r->ville_boutique)->where('type',"=",1)
                                    ->get()->shuffle();
        $boutique = Boutique::where('ville_boutique','=',$r->ville_boutique)->where('type',"=",0)
                                    ->get();
        $nom_boutique = Boutique::all();
        if(!$boutique_pro->count() && !$boutique->count()){
            $boutique = Boutique::where('type',"=",1)->get('id');

            $voiture_pro = Voiture::whereIn('boutique_id',$boutique)->where('vendu',false)->get()->shuffle();
            $voiture = Voiture::whereNotIn('boutique_id',$boutique)->orwhere('boutique_id','=',null)->where('vendu',false)->orderBy('created_at','desc')->get();              
            return view('Boutique/boutique',['voiture'=>$voiture,'nom_boutique'=>$nom_boutique,'msg'=>'Pas de boutique trouvée','seo_boutique'=>$seo_boutique,'page_boutique'=>$page_boutique,'voiture_pro'=>$voiture_pro]);
        }  
            return view('Boutique/boutique',['boutique_pro'=>$boutique_pro,'boutique'=>$boutique,'nom_boutique'=>$nom_boutique,'msg'=>' ','seo_boutique'=>$seo_boutique,'page_boutique'=>$page_boutique]);
    }



    public function ChercherVoiture(Request $r)
    {
        $page_boutique = Pagedata::where('page',"=","Boutique")->orderBy('created_at','desc')->first();
        $seo_boutique = Seodata::where('page',"=","Boutique")->orderBy('created_at','desc')->first();

        $boutique = Boutique::where('type',"=",1)->get('id');

        if($r->ville != "0" && !$r->prix){
            $voiture = Voiture::whereNotIn('boutique_id',$boutique)->orwhere('boutique_id','=',null)
                                ->where('ville','=',$r->ville)
                                ->orderBy('created_at','desc')
                                ->get();
            $voiture_pro = Voiture::whereIn('boutique_id',$boutique)
                                ->where('ville','=',$r->ville)
                                ->orderBy('created_at','desc')
                                ->get()->shuffle();
        
        }elseif($r->ville != "0" && $r->prix){
                $voiture = Voiture::whereNotIn('boutique_id',$boutique)->orwhere('boutique_id','=',null)
                                        ->where('ville','=',$r->ville)
                                        ->where('prix','<=',$r->prix)
                                        ->orderBy('created_at','desc')
                                        ->get();
                $voiture_pro = Voiture::whereIn('boutique_id',$boutique)
                                        ->where('ville','=',$r->ville)
                                        ->where('prix','<=',$r->prix)
                                        ->orderBy('created_at','desc')
                                        ->get()->shuffle();
        }elseif($r->ville == "0" && $r->prix){
                $voiture = Voiture::whereNotIn('boutique_id',$boutique)->orwhere('boutique_id','=',null)
                                    ->where('prix','<=',$r->prix)
                                    ->orderBy('created_at','desc')
                                    ->get();
                $voiture_pro = Voiture::whereIn('boutique_id',$boutique)
                                    ->where('prix','<=',$r->prix)
                                    ->orderBy('created_at','desc')
                                    ->get()->shuffle();
        }
        $nom_boutique = Boutique::all();
        if(!$voiture->count() && !$voiture_pro->count()){
            $voiture_pro = Voiture::whereIn('boutique_id',$boutique)->where('vendu',false)->get()->shuffle();
            $voiture = Voiture::whereNotIn('boutique_id',$boutique)->orwhere('boutique_id','=',null)->where('vendu',false)->orderBy('created_at','desc')->get();
                        
            return view('Boutique/boutique',['voiture'=>$voiture,'nom_boutique'=>$nom_boutique,'msg'=>'Pas de voiture trouvée','seo_boutique'=>$seo_boutique,'page_boutique'=>$page_boutique,'voiture_pro'=>$voiture_pro]);
        }            
        return view('Boutique/boutique',['voiture'=>$voiture,'nom_boutique'=>$nom_boutique,'msg'=>'','seo_boutique'=>$seo_boutique,'page_boutique'=>$page_boutique,'voiture_pro'=>$voiture_pro]);
    }






    
    public function ChercherVoitureDetail(Request $r)
    {
        $page_boutique = Pagedata::where('page',"=","Boutique")->orderBy('created_at','desc')->first();
        $seo_boutique = Seodata::where('page',"=","Boutique")->orderBy('created_at','desc')->first();

        $boutique = Boutique::where('type',"=",1)->get('id');

        if($r->marque !="0" && $r->model !="0" && $r->carburant !="0" && $r->vitesse !="0"){
            $voiture = Voiture::whereNotIn('boutique_id',$boutique)->orwhere('boutique_id','=',null)
                                ->where('marque','=',$r->marque)
                                ->where('model','=',$r->model)
                                ->where('carburant','=',$r->carburant)
                                ->where('boite_vitesse','=',$r->vitesse)
                                ->orderBy('created_at','desc')
                                ->get();
            $voiture_pro = Voiture::whereIn('boutique_id',$boutique)
                                ->where('marque','=',$r->marque)
                                ->where('model','=',$r->model)
                                ->where('carburant','=',$r->carburant)
                                ->where('boite_vitesse','=',$r->vitesse)
                                ->orderBy('created_at','desc')
                                ->get()->shuffle();
        }elseif($r->marque !="0" && $r->model !="0" && $r->carburant !="0" && $r->vitesse =="0"){
            $voiture_pro = Voiture::whereNotIn('boutique_id',$boutique)->orwhere('boutique_id','=',null)
                                ->where('marque','=',$r->marque)
                                ->where('model','=',$r->model)
                                ->where('carburant','=',$r->carburant)
                                ->orderBy('created_at','desc')
                                ->get();
            $voiture_pro = Voiture::whereIn('boutique_id',$boutique)
                                ->where('marque','=',$r->marque)
                                ->where('model','=',$r->model)
                                ->where('carburant','=',$r->carburant)
                                ->orderBy('created_at','desc')
                                ->get()->shuffle();
        }elseif($r->marque !="0" && $r->model !="0" && $r->carburant =="0" && $r->vitesse =="0"){
            $voiture = Voiture::whereNotIn('boutique_id',$boutique)->orwhere('boutique_id','=',null)
                                ->where('marque','=',$r->marque)
                                ->where('model','=',$r->model)
                                ->orderBy('created_at','desc')
                                ->get();
            $voiture_pro = Voiture::whereIn('boutique_id',$boutique)
                                ->where('marque','=',$r->marque)
                                ->where('model','=',$r->model)
                                ->orderBy('created_at','desc')
                                ->get()->shuffle();

        }elseif($r->marque !="0" && $r->model =="0" && $r->carburant !="0" && $r->vitesse !="0"){
            $voiture = Voiture::whereNotIn('boutique_id',$boutique)->orwhere('boutique_id','=',null)
                                ->where('marque','=',$r->marque)
                                ->where('carburant','=',$r->carburant)
                                ->where('boite_vitesse','=',$r->vitesse)
                                ->orderBy('created_at','desc')
                                ->get();
            $voiture_pro = Voiture::whereIn('boutique_id',$boutique)
                                ->where('marque','=',$r->marque)
                                ->where('carburant','=',$r->carburant)
                                ->where('boite_vitesse','=',$r->vitesse)
                                ->orderBy('created_at','desc')
                                ->get()->shuffle();

        }elseif($r->marque !="0" && $r->model =="0" && $r->carburant =="0" && $r->vitesse !="0"){
            $voiture = Voiture::whereNotIn('boutique_id',$boutique)->orwhere('boutique_id','=',null)
                                ->where('marque','=',$r->marque)
                                ->where('boite_vitesse','=',$r->vitesse)
                                ->orderBy('created_at','desc')
                                ->get();
            $voiture_pro = Voiture::whereIn('boutique_id',$boutique)
                                ->where('marque','=',$r->marque)
                                ->where('boite_vitesse','=',$r->vitesse)
                                ->orderBy('created_at','desc')
                                ->get()->shuffle();

        }elseif($r->marque !="0" && $r->model =="0" && $r->carburant =="0" && $r->vitesse =="0"){
            $voiture = Voiture::whereNotIn('boutique_id',$boutique)->orwhere('boutique_id','=',null)
                                ->where('marque','=',$r->marque)
                                ->orderBy('created_at','desc')
                                ->get();
            $voiture_pro = Voiture::whereIn('boutique_id',$boutique)
                                ->where('marque','=',$r->marque)
                                ->orderBy('created_at','desc')
                                ->get()->shuffle();

        }elseif($r->marque =="0" && $r->model =="0" && $r->carburant !="0" && $r->vitesse !="0"){
            $voiture = Voiture::whereNotIn('boutique_id',$boutique)->orwhere('boutique_id','=',null)
                                ->where('carburant','=',$r->carburant)
                                ->where('boite_vitesse','=',$r->vitesse)
                                ->orderBy('created_at','desc')
                                ->get();
            $voiture_pro = Voiture::whereIn('boutique_id',$boutique)
                                ->where('carburant','=',$r->carburant)
                                ->where('boite_vitesse','=',$r->vitesse)
                                ->orderBy('created_at','desc')
                                ->get()->shuffle();

        }elseif($r->marque =="0" && $r->model =="0" && $r->carburant !="0" && $r->vitesse =="0"){
            $voiture = Voiture::whereNotIn('boutique_id',$boutique)->orwhere('boutique_id','=',null)
                                ->where('carburant','=',$r->carburant)
                                ->orderBy('created_at','desc')
                                ->get();  
            $voiture_pro = Voiture::whereIn('boutique_id',$boutique)
                                ->where('carburant','=',$r->carburant)
                                ->orderBy('created_at','desc')
                                ->get()->shuffle();  

        }elseif($r->marque =="0" && $r->model =="0" && $r->carburant =="0" && $r->vitesse !="0"){
            $voiture = Voiture::whereNotIn('boutique_id',$boutique)->orwhere('boutique_id','=',null)
                                ->where('boite_vitesse','=',$r->vitesse)
                                ->orderBy('created_at','desc')
                                ->get();
            $voiture_pro = Voiture::whereIn('boutique_id',$boutique)
                                ->where('boite_vitesse','=',$r->vitesse)
                                ->orderBy('created_at','desc')
                                ->get()->shuffle();
        }
        $nom_boutique = Boutique::all();
        if(!$voiture->count() && !$voiture_pro->count()){
            $voiture_pro = Voiture::whereIn('boutique_id',$boutique)->where('vendu',false)->get()->shuffle();
            $voiture = Voiture::whereNotIn('boutique_id',$boutique)->orwhere('boutique_id','=',null)->where('vendu',false)->orderBy('created_at','desc')->get();
            return view('Boutique/boutique',['voiture'=>$voiture,'nom_boutique'=>$nom_boutique,'msg'=>'Pas de voiture trouvée','seo_boutique'=>$seo_boutique,'page_boutique'=>$page_boutique,'voiture_pro'=>$voiture_pro]);
        }            
        return view('Boutique/boutique',['voiture'=>$voiture,'nom_boutique'=>$nom_boutique,'msg'=>'','seo_boutique'=>$seo_boutique,'page_boutique'=>$page_boutique,'voiture_pro'=>$voiture_pro]);
    }
    public function rechercheB($id)
    {
        $voiture = Voiture::where('boutique_id','=',$id)->get();
        $nom_boutique = Boutique::all();
        return view('Boutique/boutique',['voiture'=>$voiture,'nom_boutique'=>$nom_boutique]);
    }
    public function modifiermonProfile()
    {
        return view('modifierProfile');
    }
    public function modifiermyProfile(Request $r)
    {
        $user = User::find(Auth::id());
        $email = User::where('email','=',$r->email)->where('id','!=',$user->id)->get();
        if($email->count()==0){
            $user->nom = $r->nom;
            $user->prenom = $r->prenom;
            $user->email = $r->email;
            $user->telephone = $r->tel;
            $user->save();
            return redirect()->back()->withSuccess('Compte modifié');
        }else{
            return redirect()->back()->withSuccess('Email déjà utilisé');
        }
    }
    
}
