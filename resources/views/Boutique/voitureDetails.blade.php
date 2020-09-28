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
                    <img id="preview_image" src="{{$voiture->photo}}">
                    @if($voiture->voitureimage)
                        <input type="image" onclick="previewImageMain()" value="{{$voiture->photo}}" id="img{{$voiture->id}}" style="width:40px;text-align:center;border:1px solid gray;border-radius:10px" src="{{$voiture->photo}}">
                        @foreach($voiture->voitureimage as $i)
                            <input type="image" onclick="previewImage()" value="{{$i->image1}}" id="img{{$i->id}}" style="width:40px;text-align:center;border:1px solid gray;border-radius:10px" src="{{$i->image1}}">
                            <script>
                                function previewImage(){

                                    $("#preview_image").attr("src",$("#img{{$i->id}}").val());
                                }
                                function previewImageMain(){

                                    $("#preview_image").attr("src",$("#img{{$voiture->id}}").val());
                                }
                            </script>
                        @endforeach
                    @endif
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
                        <td>Vendeur Telephone :</td>
                        <form method="POST" action="{{ action('VoitureController@NumberClick') }}">
                            @csrf
                            <input type="hidden" value="{{$voiture->id}}" name="voiture_id"/>
                            <input type="hidden" value="{{$voiture->tel}}" name="voiture_tel"/>
                            <td><strong>{{$voiture->user->telephone}}</strong> <input type="image" alt="submit" src="/project_images/whatsapp.png" width="25px"></td>
                        </form>
                    </tr>
                    
                    @if($voiture->boutique)
                        <tr>
                            <td>Vendeur Email :</td>
                            <td><strong>{{$voiture->user->email}}</strong></td>
                        </tr>
                        <tr>
                            <td style="border: none;">Boutique :</td>
                            <td style="border: none;"><strong><u><a href="/Boutique/boutique_voiture/{{$voiture->boutique->id}}">{{$voiture->boutique->nom_boutique}} >></a></u></strong></td>
                        </tr>
                    @else
                        <tr>
                            <td style="border: none;">Vendeur Email :</td>
                            <td style="border: none;"><strong>{{$voiture->user->email}}</strong></td>
                        </tr>
                    @endif
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

$(document).ready(function(){
    if (/Mobi/.test(navigator.userAgent)) {
        $("form").prepend('<input type="hidden" name="click_nbr" value="mobile" />');
    }else{
        $("form").prepend('<input type="hidden" name="click_nbr" value="other" />');
    }

});



                
</script>
