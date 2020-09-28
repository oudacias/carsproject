<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Servicediagnostic;
use App\Servicesuivi;
use DateTime;
use App\Notificationadmin;
use App\User;
use Pusher\Pusher;


class ServiceController extends Controller
{
    public function indexdiagnostic()
    {
        return view('Services/service_diagnostic');
    }
    public function indexsuivi()
    {
        return view('Services/service_suivi');
    }
    public function ajouterdiagnostic(Request $r)
    {
        $diagnostic = new Servicediagnostic();
        $diagnostic->user_id = Auth::id();
        $diagnostic->marque = $r->marque;
        $diagnostic->model = $r->model;
        $diagnostic->version = $r->version;
        $diagnostic->carburant = $r->carburant;
        $diagnostic->boite_vitesse = $r->boite_vitesse;
        $diagnostic->annee = $r->annee;
        $diagnostic->dedouane = $r->dedouane;
        $diagnostic->kilometrage = $r->kilometrage;
        $diagnostic->couleur = $r->couleur;
        $diagnostic->carrosserie = $r->carrosserie;
        $diagnostic->nbr_porte = $r->nbt_porte;
        $diagnostic->puissance_fiscale = $r->puissance_fiscale;
        $diagnostic->premiere_main = $r->premiere_main;
        $diagnostic->prepare = $r->prepare;
        $dt = new DateTime();
        $image_path = $diagnostic->marque.$dt->format('H_i_s').'.'.$r->file('voiture_image')->getClientOriginalExtension();
        $r->file('voiture_image')->move(public_path('/image_uploads'), $image_path);
        $diagnostic->photo = '/image_uploads/'.$image_path;
        $diagnostic->save();
        return redirect()->back()->withSuccess('Diagnostic Envoyé');
    }
    public function afficherDiagnostic()
    {
        $diagnostic = Servicediagnostic::all();
        return view('Admin/Admin_diagnostic',['diagnostic'=>$diagnostic]);
    }
    public function afficherSuivi()
    {
        $suivi = Servicesuivi::where('confirmer',false)->get();
        Notificationadmin::where('type_notification','=','service')->update(['vu'=>true]);

        return view('Admin/Admin_suivi',['suivi'=>$suivi]);
    }
    
    public function diagnostiquetoPDF($id)
    {
        $diagnostic = Servicediagnostic::find($id);
        $pdf = \PDF::loadView('Services.diagnosticpdf', compact('diagnostic'));
        return $pdf->download('diagnosticpdf'.$id.'.pdf');
    }
    public function suivitoPDF($id)
    {
        $suivi = Servicesuivi::find($id);
        $pdf = \PDF::loadView('Services.suivipdf', compact('suivi'));
        return $pdf->download('suivipdf'.$id.'.pdf');
    }
    public function ajoutersuivi(Request $r)
    {
        $suivi = new Servicesuivi();
        $suivi->nom = $r->nom ;
        $suivi->prenom = $r->prenom ;
        $suivi->ville = $r->ville ;
        $suivi->sexe = $r->sexe ;
        $suivi->age = $r->age ;
        $suivi->telephone = '212'.$r->telephone ;
        $suivi->situation_familiale = $r->situation_familiale ;
        $suivi->km_parcouru = $r->km_parcouru ;
        $suivi->type_route = $r->type_route ;
        $suivi->places = $r->places ;
        $suivi->bagages = $r->bagages ;
        $suivi->type_usage = $r->type_usage ;
        $suivi->type_carburant = $r->type_carburant ;
        $suivi->budget = $r->budget ;
        $suivi->type_financement = $r->type_financement ;
        $suivi->idee_crédit = $r->idee_crédit ;
        $suivi->voiture_preference = $r->voiture_preference ;
        $suivi->pourquoi_voiture_preference = $r->pourquoi_voiture_preference ;
        $suivi->type_voiture = $r->type_voiture ;
        $suivi->pourquoi_type_voiture = $r->pourquoi_type_voiture ;
        $suivi->save();


        $notification_service = new Notificationadmin();
        $admin_id = User::where('role','=','administrateur')->first();
        $notification_service->admin_id = $admin_id->id;
        $notification_service->type_notification = 'service';
        $notification_service->save();

        $options = array(
            'cluster' => 'mt1',
            'encrypted' => true
        );
        $pusher = new Pusher(
            'e22834bea53871f1ab35',
            'e76dc5f68506f1cfe69e',
            '1075023',
            $options
        );
        $pusher->trigger('notifyadmin', 'notify-event', $notification_service);
        return redirect()->back()->withSuccess('Demande Envoyée avec succès. Merci');

    }
}
