


<meta name="keywords" content="{{$voiture->marque}} {{$voiture->model}} {{$voiture->version}} {{$voiture->annee}} {{$voiture->carburant}}">
<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/popup.css">
<link rel="stylesheet" href="/css/articles.css">
<link rel="stylesheet" href="/css/article.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title>Eocars Voiture</title>
@include('Components.menu')
@yield('menu')

<div class="container">
    <div class="row ">
        <div class="col-md-8">
            <div class="card-block">
                <div class="user-image car-image">
                    <img id="preview_image" src="{{$voiture->photo}}" style="width:300px;margin-left:20%"/><br>
                    @if($voiture->voitureimage)
                    <hr>
                        <input type="image" onclick="previewImageMain()" value="{{$voiture->photo}}" id="img{{$voiture->id}}" style="width:40px;text-align:center;border:1px solid gray;border-radius:10px;padding:5px" src="{{$voiture->photo}}">
                        @foreach($voiture->voitureimage as $i)
                            <input type="image" onclick="previewImage{{$i->id}}()" value="{{$i->image1}}" id="img{{$i->id}}" style="width:40px;text-align:center;border:1px solid gray;border-radius:10px" src="{{$i->image1}}">
                            <script>
                                function previewImage{{$i->id}}(){
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
        <div class="col-md-4">
                    <div class="card">
                        <div class="card-introduction card_gap">
                            <table class="table-details">
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
                                        <td style="border: none;"><strong><u><a href="/BoutiqueEocars/{{$voiture->boutique->nom_boutique}}">{{$voiture->boutique->nom_boutique}} >></a></u></strong></td>
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

    </div>
    <div class="row ">
        <div class="col-md-12">
            <div class="row ">
                <div class="col-md-4">
                    <div class="card">
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
                                </table>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-introduction card_gap">
                                <table class="table-details">
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
                                    <tr>
                                        <td>Options :</td>
                                        <td><strong>{{$voiture->options}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Type :</td>
                                        <td><strong>@if($voiture->voitureoccasion)Occasion @else Neuve @endif</strong></td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">Etat :</td>
                                        <td style="border: none;"><strong> @if ($voiture->voitureoccasion){{$voiture->voitureoccasion->etat}} @endif</strong></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    @if($voiture->voiturepub)
                    <div class="col-md-4">
                        <div class="card-block">
                            <div class="card-introduction card_gap">
                                <a href="{{ $voiture->voiturepub->lien}}"><img src="{{$voiture->voiturepub->image_path}}" width="100%"></a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div style="margin-top:100px">
@include('Components.footer')
@yield('footer')
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
