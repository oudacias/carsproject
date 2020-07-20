<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Forum;
use App\User;
use App\Boutique;
use App\Servicediagnostic;
use App\Servicesuivi;
use App\Voiture;
use App\Contact;
use App\Voitureoccasion;

class AdminController extends Controller
{
    public function login(){
        return view ('auth/login_admin');
    }
    public function articles(){
        $articles = Article::all()->sortByDesc('created_at');
        return view('Admin/Admin_articles',['artc'=>$articles]);
    }
    public function insererArticle(Request $r){
        Article::insererArticle($r->titre,$r->texte,$r->file('lien_image'),$r->lien_youtube);
        return redirect()->back()->withSuccess('Article Ajouté');

    }
    public function index(){
         return view('Admin/Admin_articles');
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
        $forum = Forum::all()->where('approuve',0)->sortByDesc('created_at');
        return view('Admin/Admin_forum',['frm'=>$forum]);
    }
    public function Supprimerforum($id){
        $forum = Forum::destroy($id);
        return redirect()->back()->withSuccess('Forum Supprimé');
    }
    public function Confirmerforums($id){
        $forum = Forum::Confirmerforum($id);
        return redirect()->back()->withSuccess('Forum Confirmé');
    }
    public function listusers(){
        $users = User::all()->sortByDesc('created_at');
        return view('Admin/Admin_users',['user'=>$users]);
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
        $suivi->confirme = true;
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
        $boutique = Boutique::where('type_boutique','=','Professionnelle')->get();
        return view('Admin/Admin_boutique',['boutique'=>$boutique]);
    }
    public function supprimerBoutique($id){
        $boutique = Boutique::destroy($id);
        return redirect()->back()->withSuccess('Boutique Supprimée');
    }
    public function confirmerBoutique($id){
        $boutique = Boutique::find($id);
        $boutique->confirme = true;
        $boutique->save();
        return redirect()->back()->withSuccess('Boutique Confirmée');
    }
    public function afficherVoiture()
    {
        $voiture = Voiture::where("confirme","=",true)->get();
        return view('Admin/Admin_voiture',['voiture'=>$voiture]);
    }
    public function supprimerVoiture($id){
        $voitureO = Voitureoccasion::where('voiture_id','=',$id);
        if($voitureO){
            $voitureO = Voitureoccasion::destroy($voitureO->id);
        }
        $voiture = Voiture::destroy($id);
        
        return redirect()->back()->withSuccess('Voiture Supprimé');
    }
    public function confirmerVoiture($id){
        $voiture = Voiture::find($id);
        $voiture->confirme = true;
        $voiture->save();
        return redirect()->back()->withSuccess('Voiture Confirmée');
    }
    public function voiturePDF($id)
    {
        $voiture = Voiture::find($id);
        $pdf = \PDF::loadView('Services.voiturepdf', compact('voiture'));
        return $pdf->download('voiturepdf'.$id.'.pdf');
    }
    public function contacts()
    {
        $contact = Contact::orderBy('created_at','desc')->get();
        return view('Admin/Admin_contact',['contact'=>$contact]);

    }
    public function supprimercontacts($id)
    {
        $contact = Contact::destroy($id);
        return redirect()->back()->withSuccess('Message Supprimé');

    }
    
}
