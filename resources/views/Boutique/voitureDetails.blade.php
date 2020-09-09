<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/popup.css">
<link rel="stylesheet" href="/css/articles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title>Boutique</title>

@include('Components.menu')
@yield('menu')

<div class="container">
    <div class="row ">
        <div class="col-md-5">
            <div class="card-block">
                <div class="user-image car-image">
                    <img src="{{$voiture->photo}}">
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card-block">
                <table class="table-details vendeur">
                    <tr>
                        <td>Vendeur :</td>
                        <td><strong>{{$voiture->user->nom}}</strong></td>
                    </tr>
                    <tr>
                        <td>Vendeur Email :</td>
                        <td><strong>{{$voiture->user->email}}</strong></td>
                    </tr>
                    <tr>
                        <td>Vendeur Telephone :</td>
                        <td><strong><a onclick="redirectTel()">{{$voiture->user->telephone}} <img src="/project_images/phone.png" width="25px"></a></strong></td>
                    </tr>
                    <tr>
                        <td style="border: none;">Boutique :</td>
                        <td style="border: none;"><strong><u><a href="/Boutique/boutique_voiture/{{$voiture->boutique->id}}">{{$voiture->boutique->nom_boutique}} >></a></u></strong></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-8">
            <div class="card-block">
                <div class="card-introduction card_gap">
                    <table class="table-details">
                        <tr>
                            <td>Marque :</td>
                            <td><strong>{{$voiture->marque}}</strong></td>
                        </tr>
                        <tr>
                            <td>Model :</td>
                            <td><strong>{{$voiture->model}}</strong></td>
                        </tr>
                        <tr>
                            <td>Version :</td>
                            <td><strong>{{$voiture->version}}</strong></td>
                        </tr>
                        <tr>
                            <td>Carburant :</td>
                            <td><strong>{{$voiture->carburant}}</strong></td>
                        </tr>
                        <tr>
                            <td>Boite de vitesse :</td>
                            <td><strong>{{$voiture->boite_vitesse}}</strong></td>
                        </tr>
                        <tr>
                            <td>Année :</td>
                            <td><strong>{{$voiture->annee}}</strong></td>
                        </tr>
                        <tr>
                            <td>Origine :</td>
                            <td><strong>{{$voiture->origine}}</strong></td>
                        </tr>
                        <tr>
                            <td>Kilométrage :</td>
                            <td><strong>{{$voiture->kilometrage}}</strong></td>
                        </tr>
                        <tr>
                            <td>Couleur :</td>
                            <td><strong>{{$voiture->couleur}}</strong></td>
                        </tr>
                        <tr>
                            <td>Carrosserie :</td>
                            <td><strong>{{$voiture->carrosserie}}</strong></td>
                        </tr>
                        <tr>
                            <td>Nombre de portes :</td>
                            <td><strong>{{$voiture->nbr_porte}}</strong></td>
                        </tr>
                        <tr>
                            <td>Puissance fiscale :</td>
                            <td><strong>{{$voiture->puissance_fiscale}}</strong></td>
                        </tr>
                        <tr>
                            <td>Première Main :</td>
                            <td><strong>{{$voiture->premiere_main}}</strong></td>
                        </tr>
                        <tr>
                            <td>Préparé :</td>
                            <td><strong>{{$voiture->prepare}}</strong></td>
                        </tr>
                        <tr>
                            <td>Description :</td>
                            <td><strong>{{$voiture->description}}</strong></td>
                        </tr>
                        <tr>
                            <td>Prix :</td>
                            <td><strong>{{$voiture->prix}}</strong></td>
                        </tr>
                        <tr>
                            <td>Ville :</td>
                            <td><strong>{{$voiture->ville}}</strong></td>
                        </tr>
                        
                        @if($voiture->voitureoccasion)
                        <tr>
                            <td>Options :</td>
                            <td><strong>{{$voiture->options}}</strong></td>
                        </tr>
                        <tr>
                            <td>Occasion :</td>
                            <td><strong>Oui</strong></td>
                        </tr>
                        <tr>
                            <td style="border: none;">Etat :</td>
                            <td style="border: none;"><strong>{{$voiture->voitureoccasion->etat}}</strong></td>
                        </tr>
                        
                        @else
                        <tr>
                            <td style="border: none;">Options :</td>
                            <td style="border: none;"><strong>{{$voiture->options}}</strong></td>
                        </tr>   
                        @endif

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

function redirectTel(){
    if (/Mobi/.test(navigator.userAgent)) {
        window.location = "whatsapp://send?phone="+{{$voiture->user->telephone}}
}else{
        window.location = "https://web.whatsapp.com/send?phone="+{{$voiture->user->telephone}}
}
}


</script>