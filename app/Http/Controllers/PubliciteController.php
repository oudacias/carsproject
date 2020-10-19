<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Publicite;
use DateTime;


class PubliciteController extends Controller
{
    public function index()
    {
        return view('Publicite/index');
    }
    public function ajouterPublicite(Request $r)
    {
        $pub = new Publicite();
        $pub->nom_page = $r->nom_page;
        $pub->emplacement = $r->emplacement;
        $pub->type = $r->type_pub;
        $pub->lien_publicite = $r->lien_pub;
        $pub->script = $r->script;
        $pub->lien_youtube = $r->lien_pub_youtube;
        if($r->lien_media){
            $dt = new DateTime();
            $image_path = "pub_".$dt->format('H_i_s').'.'.$r->file('lien_media')->getClientOriginalExtension();
            $r->file('lien_media')->move(public_path('/image_pubs'), $image_path);
            $pub->lien_media='/image_pubs/'.$image_path;
        }
        $pub->save();
        return redirect()->back()->withSuccess('Publicité Ajoutée');
    }
    public function afficherPub()
    {
        $pub = Publicite::all()->sortByDesc('created_at');
        return view('Publicite/supprimerPub',['pub' => $pub]);
    }
    public function supprimerPublicite($id)
    {
        Publicite::destroy($id);
        return redirect()->back()->withSuccess('Publicité Supprimée' .$id);
    }
}
