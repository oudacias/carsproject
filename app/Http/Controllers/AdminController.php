<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Forum;
use App\Forumtheme;
use App\User;
use App\Boutique;
use App\Servicediagnostic;
use App\Servicesuivi;
use App\Voiture;
use App\Contact;
use App\Voitureoccasion;
use App\Notificationadmin;
use App\Voiturepub;
use DateTime;
use App\Articlepub;
use App\Articlescategorie;
use App\Seodata;
use App\Pagedata;
use App\Design;
use App\Companysocial;

class AdminController extends Controller
{
    public function login(){
        return view ('auth/login_admin');
    }
    public function articles(){
        $articles = Article::all()->sortByDesc('created_at');
        $categorie = Articlescategorie::all()->sortByDesc('categorie');
        $arr = [];
        foreach($articles as $d){
            array_push($arr,$d->created_at->format('F Y'));
        }
        $dates = array_unique($arr);

        

        return view('Admin/Admin_articles',['articles'=>$articles,'artc'=>$articles,'categorie'=>$categorie,'dates'=>$dates]);
    }
    public function insererArticle(Request $r){
        Article::insererArticle($r->titre,$r->slug,$r->texte,$r->categorie,$r->file('lien_image'),$r->lien_youtube);
        return redirect()->back()->withSuccess('Article Ajouté');

    }
    public function index(){
         return view('Admin/Admin_articles');
    }

    public function ConfirmerUser($id)
    {
        $user = User::find($id);
        $user->confirmer = true;
        $user->save();
        return redirect()->back()->withSuccess('Utilisateur Confirmé');
    }


    public function SupprimerArticle($id){
        Article::destroy($id);
        return redirect()->back()->withSuccess('Article Supprimé');
    }
    public function Article($id){
        $article = Article::find($id);
        return view('Admin/ModifierArticle',['artc'=>$article]);
    }
    public function ModifierArticle(Request $r){
        Article::ModifierArticle($r->id_article,$r->titre,$r->texte,$r->lien_youtube);
        return redirect()->back()->withSuccess('Article Modifié');

   }
    public function forum(){
        $forum = Forum::all()->sortByDesc('created_at');
        $theme = Forumtheme::all()->sortByDesc('theme');
        $arr = [];
        foreach($forum as $f){
            array_push($arr,$f->created_at->format('F Y'));
        }
        $dates = array_unique($arr);
        return view('Admin/Admin_forum',['frm'=>$forum,'dates'=>$dates,'theme'=>$theme]);
    }


    public function searchForum(Request $r){
        $forum = Forum::all()->sortByDesc('created_at');
        $theme = Forumtheme::all()->sortByDesc('theme');
        $arr = [];
        foreach($forum as $f){
            array_push($arr,$f->created_at->format('F Y'));
        }
        $dates = array_unique($arr);
        if($r->approuve == "default"){
            if($r->date){
                $result = Forum::Where('theme','=', $r->theme)->orWhere(function ($query) use ($r) {
                    $query->whereMonth('created_at' ,'=',date('m',strtotime($r->date)))->WhereYear('created_at' ,'=',date('Y',strtotime($r->date)));})
                    ->get();
            }else if(!$r->date){
                $result = Forum::Where('theme','=', $r->theme)->get();
            }
        }else{
            if($r->date){
                $result = Forum::Where('theme','=', $r->theme)->orWhere('approuve','=',$r->approuve)->orWhere(function ($query) use ($r) {
                    $query->whereMonth('created_at' ,'=',date('m',strtotime($r->date)))->WhereYear('created_at' ,'=',date('Y',strtotime($r->date)));})
                    ->get();
            }else if(!$r->date){
                $result = Forum::Where('theme','=', $r->theme)->orWhere('approuve','=',$r->approuve)->get();
            }
        }

        return view('Admin/Admin_forum',['frm'=>$result,'dates'=>$dates,'theme'=>$theme]);
    }

    public function Supprimerforum($id){
        $forum = Forum::destroy($id);
        return redirect()->back()->withSuccess('Forum Supprimé');
    }
    public function Confirmerforums($id){
        $forum = Forum::find($id);
        $forum->approuve = 1;
        $forum->save();

        return redirect()->back()->withSuccess('Forum Confirmé');
    }
    public function listusers(){
        $users = User::all()->sortByDesc('created_at');
        $arr = [];
        foreach($users as $u){
            array_push($arr,$u->created_at->format('F Y'));
        }
        $dates = array_unique($arr);

        Notificationadmin::whereIn('type_notification',['fournisseur','particulier'])->update(['vu'=>true]);
        
        return view('Admin/Admin_users',['user'=>$users,'dates'=>$dates]);
    }
    public function searchUsers(Request $r){
        if($r->confirmer == "default"){
            if($r->date){
                $users = User::Where('objectif','=', $r->objectif)->orWhere(function ($query) use ($r) {
                    $query->whereMonth('created_at' ,'=',date('m',strtotime($r->date)))->WhereYear('created_at' ,'=',date('Y',strtotime($r->date)));})
                    ->get();
            }else if(!$r->date){
                $users = User::Where('objectif','=', $r->objectif)->get();
            }
        }else{
            if($r->date){
                $users = User::where('objectif','=', $r->objectif)->orWhere('confirmer','=', $r->confirmer)->orWhere(function ($query) use ($r) {
                    $query->whereMonth('created_at' ,'=',date('m',strtotime($r->date)))->WhereYear('created_at' ,'=',date('Y',strtotime($r->date)));})
                    ->get();
            }else if(!$r->date){
                $users = User::Where('objectif','=', $r->objectif)->orWhere('confirmer','=', $r->confirmer)->get();
            }
        }
        $arr = [];
        foreach($users as $u){
            array_push($arr,$u->created_at->format('F Y'));
        }
        $dates = array_unique($arr);

        Notificationadmin::whereIn('type_notification',['fournisseur','particulier'])->update(['vu'=>true]);
        
        return view('Admin/Admin_users',['user'=>$users,'dates'=>$dates]);
    }
    public function SupprimerUser($id){
        $user = User::destroy($id);
        return redirect()->back()->withSuccess('Utilisateur Supprimé');
    }
    public function supprimerDiagnostic($id){
        $suivi = Servicesuivi::destroy($id);
        return redirect()->back()->withSuccess('Diagnostic Supprimé');
    }
    public function supprimerSuivi($id){
        $diagnostic = Servicediagnostic::destroy($id);
        return redirect()->back()->withSuccess('Suivi Supprimé');
    }
    public function confirmerSuivi($id){
        $suivi = Servicesuivi::find($id);
        $suivi->confirmer = true;
        $suivi->save();
        return redirect()->back()->withSuccess('Suivi Confirmé');
    }
    public function confirmerDiagnostic($id){
        $diagnostic = Servicediagnostic::find($id);
        $diagnostic->confirme = true;
        $diagnostic->save();

        return redirect()->back()->withSuccess('Diagnostic Confirmé');
    }
    public function afficherBoutique()
    {   
        $boutique = Boutique::all();
        $arr = [];
        foreach($boutique as $b){
            array_push($arr,$b->created_at->format('F Y'));
        }
        $dates = array_unique($arr);

        return view('Admin/Admin_boutique',['boutique'=>$boutique,'dates'=>$dates]);
    }
    public function changerTypeBoutique(Request $r)
    {
        $boutique = Boutique::find($r->boutique_id);
        $boutique->type = $r->boutique_type;
        $boutique->save();
        return redirect()->back()->withSuccess('Type de Boutique est modifié');
    }
    public function searchBoutique(Request $r)
    {   
        $boutique = Boutique::all();
        $arr = [];
        foreach($boutique as $b){
            array_push($arr,$b->created_at->format('F Y'));
        }
        if($r->date){
            $boutique = Boutique::Where('ville_boutique','=', $r->ville)->orWhere(function ($query) use ($r) {
                $query->whereMonth('created_at' ,'=',date('m',strtotime($r->date)))->WhereYear('created_at' ,'=',date('Y',strtotime($r->date)));})
                ->get();
        }else if(!$r->date){
            $boutique = Boutique::Where('ville_boutique','=', $r->ville)->get();
        }        
        $dates = array_unique($arr);

        return view('Admin/Admin_boutique',['boutique'=>$boutique,'dates'=>$dates]);
    }
    public function supprimerBoutique($id){
        $boutique = Boutique::destroy($id);
        $voiture = Voiture::where('boutique_id','=',$id)->get();
        foreach($voiture as $v){
            $v->destroy($v->id);
        }
        return redirect()->back()->withSuccess('Boutique Supprimée');
    }
    
    public function afficherVoiture()
    {
        $voiture = Voiture::all()->sortByDesc('created_at');
        return view('Admin/Admin_voiture',['voiture'=>$voiture]);
    }
    public function supprimerVoiture($id){
        $voitureO = Voitureoccasion::where('voiture_id','=',$id)->get();
        if($voitureO->count()>0){
            $voitureO = Voitureoccasion::destroy($voitureO->id);
        }
        $voiture = Voiture::destroy($id);
        
        return redirect()->back()->withSuccess('Voiture Supprimé');
    }
    public function voiturePDF($id)
    {
        $voiture = Voiture::find($id);
        $pdf = \PDF::loadView('Services.voiturepdf', compact('voiture'));
        return $pdf->download('voiturepdf'.$id.'.pdf');
    }
    
    public function afficherVoitureClick()
    {
        $voiture = Voiture::with('voitureclick')->get();
        return view('Admin/Admin_click',['voiture'=>$voiture]);
    }
    public function AjouterPub(Request $r)
    {
        $pub = new Voiturepub();
        $pub->voiture_id = $r->voiture_id;
        $dt = new DateTime();
        $image_path = $r->voiture_id.$dt->format('H_i_s').'.'.$r->file('lien_image')->getClientOriginalExtension();
        $r->file('lien_image')->move(public_path('/image_uploads'), $image_path);
        $pub->image_path = '/image_uploads/'.$image_path;
        $pub->lien = $r->lien;
        $pub->save();
        return redirect()->back()->withSuccess('Pub Ajoutée');
    }
    public function SupprimerPub($id)
    {
        Voiturepub::destroy($id);
        return redirect()->back()->withSuccess('Pub supprimée');
    }
    public function AjouterPubArticle(Request $r)
    {
        $pub = new Articlepub();
        $pub->article_id = $r->article_id;
        $dt = new DateTime();
        $image_path = $r->voiture_id.$dt->format('H_i_s').'.'.$r->file('lien_image')->getClientOriginalExtension();
        $r->file('lien_image')->move(public_path('/image_uploads'), $image_path);
        $pub->image_path = '/image_uploads/'.$image_path;
        $pub->lien = $r->lien;
        $pub->save();
        return redirect()->back()->withSuccess('Pub Ajoutée');
    }
    public function SupprimerPubArticle($id)
    {
        Voiturepub::destroy($id);
        return redirect()->back()->withSuccess('Pub supprimée');
    }

    public function searchArticle(Request $r)
    {
        $articles = Article::all()->sortByDesc('created_at');
        $categorie = Articlescategorie::all()->sortByDesc('categorie');
        $arr = [];
        foreach($articles as $d){
            array_push($arr,$d->created_at->format('F Y'));
        }
        $dates = array_unique($arr);

        if($r->date){

            $result = Article::where('titre','=', $r->titre)->orWhere('categorie','=', $r->categorie)->orWhere(function ($query) use ($r) {
                $query->whereMonth('created_at' ,'=',date('m',strtotime($r->date)))->WhereYear('created_at' ,'=',date('Y',strtotime($r->date)));})
                ->get();
        }else if(!$r->date){
            $result = Article::where('titre','=', $r->titre)->orWhere('categorie','=', $r->categorie)->get();
        }

        return view('Admin/Admin_articles',['articles'=>$articles,'artc'=>$result,'categorie'=>$categorie,'dates'=>$dates]);
        
    }
    public function AjouterTheme(Request $r)    
    {
        $t = Forumtheme::where('theme','=', $r->theme)->get();
        if(!$t->count()){
            $theme = new Forumtheme();
            $theme->theme = $r->theme;
            $theme->save();
            return redirect()->back()->withSuccess('Nouveau Thème créé');
        }else{
            return redirect()->back()->withSuccess('Thème déjà créé');
        }
    }
    public function AjouterCategorie(Request $r)
    {
        $c = ArticlesCategorie::where('categorie','=', $r->categorie)->get();
        if(!$c->count()){
            $categorie = new ArticlesCategorie();
            $categorie->categorie = $r->categorie;
            $categorie->save();
            return redirect()->back()->withSuccess('Nouvelle Categorie Crée');
        }else{
            return redirect()->back()->withSuccess('Catégorie existe déjà');
        }
    }
    public function DeleteCategorie($categorie)
    {
        $allcategories = Session::get('categorie');
        Session::forget('categorie');   
        $key = array_search($categorie, $allcategories);
        unset($allcategories[$key]);
        foreach($allcategories as $r){
            Session::push('categorie', $r);
        }
        return redirect()->back()->withSuccess('Catégorie supprime');
    }


    public function options()
    {
        $social = Companysocial::orderBy('created_at', 'desc')->first();
        $seo = Seodata::all()->sortByDesc('created_at');
        $pagedata = Pagedata::all()->sortByDesc('created_at');
        $design = Design::orderBy('created_at', 'desc')->first();
        return view('Admin/Admin_option',['seo'=>$seo,'pagedata'=>$pagedata,'design'=>$design,'social'=>$social]);
    }
    public function ajouterSeo(Request $r)
    {
        $seo = Seodata::where('page',"=", $r->page)->first();
        $seo->description = $r->description;
        $seo->keywords = $r->keywords;
        $seo->save();
        return redirect()->back()->withSuccess('Données Ajoutés');
    }
    public function ajouterIntroPage(Request $r)
    {
        $page = Pagedata::where('page',"=",$r->page)->first();
        $page->introduction = $r->introduction;
        if($r->lien_image){
            $dt = new DateTime();
            $image_path = $r->page.$dt->format('H_i_s').'.'.$r->file('lien_image')->getClientOriginalExtension();
            $r->file('lien_image')->move(public_path('/image_uploads'), $image_path);
            $page->lien_img = '/image_uploads/'.$image_path;
        }
        $page->save();
        return redirect()->back()->withSuccess('Données Ajoutés');
    } 
    public function modifierDesign(Request $r)
    {
        $design = Design::orderBy('created_at', 'desc')->first();
        $design->menu_color = $r->menu_color;
        $design->btn_color = $r->button_color;
        if($r->lien_image){
            $dt = new DateTime();
            $image_path = "logo".$dt->format('H_i_s').'.'.$r->file('lien_image')->getClientOriginalExtension();
            $r->file('lien_image')->move(public_path('/image_uploads'), $image_path);
            $design->logo = '/image_uploads/'.$image_path;
        }
        $design->save();
        return redirect()->back()->withSuccess('Données Ajoutés');
    } 
    public function modifierSocial(Request $r)
    {
        $social = Companysocial::orderBy('created_at', 'desc')->first();
        $social->facebook = $r->facebook;
        $social->instagram = $r->instagram;
        $social->whatsapp = $r->whatsapp;
        $social->gmail = $r->gmail;
        $social->save();
        return redirect()->back()->withSuccess('Données Ajoutés');
    } 
    
}
