<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/popup.css">
<link rel="stylesheet" href="/css/articles.css">
<link rel="stylesheet" href="/css/confirmation.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<meta name="description" content="{{$seo_boutique->description}}">
<meta name="keywords" content="{{$seo_boutique->keywords}}">
<title>Eocars Boutique</title>

@include('Components.menu')
@include('Boutique.rechercheHeader')
@yield('menu')
@yield('recherche')
<div class="container other-sides">
@if($page_boutique->introduction)
<div class="container">
    <div class="row">
        <div class="col-10">
            <div class="user-card" style="margin-bottom:50px"> 
                <div class="card">
                    @if($page_boutique->lien_img)
                    <div class="user-image img-home">
                        <img src="{{$page_boutique->lien_img}}">
                    </div>
                    @endif
                    <div class="card-introduction">
                        <p  style="padding:50px">{{$page_boutique->introduction}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif

    @if(!$msg == " ")
        <p>Résultat pour " @if(Request::get('marque'))marque : {{Request::get('marque')}}@endif @if(Request::get('model')) Model : {{Request::get('model')}}@endif @if(Request::get('carburant')) Carburant : {{Request::get('carburant')}}@endif @if(Request::get('vitesse')) Vitesse : {{Request::get('vitesse')}}@endif @if(Request::get('ville')) Ville :{{Request::get('ville')}}@endif @if(Request::get('prix')) Prix : {{Request::get('prix')}}@endif @if(Request::get('nom_boutique')) Nom Boutique : {{Request::get('nom_boutique')}}@endif @if(Request::get('ville_boutique')) Ville Boutique : {{Request::get('ville_boutique')}}@endif   "</p>
    @endif 
        <form id="tri_form" method="GET" action="{{ action('BoutiqueController@trierBoutique') }}">
            <select class="recherche-select" name="tri" id="tri_id" style="width:300px;margin-left:10px">  
                <option value="0">Trier par : </option>
                <option value="ajout_croissant">Date d'ajout croissant</option>
                <option value="ajout_decroissant">Date d'ajout décroissant</option>
                <option value="nbr_vue">Nombre de vues</option>
            </select>
        </form>
        @if(!Request::get('ville_boutique') || $msg != " ")
        @if($voiture_pro->count())
        @foreach($voiture_pro as $v)
        @if(!$v->achatvoiture)
            <div class="boutique-border">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-block">
                                <div class="user-image car-image">
                                    <img src="{{$v->photo}}" alt="{{$v->ville}}-{{$v->marque}}" style="width:200px">
                                </div>
                            </div>
                        </div>
                    <div class="col-md-8 info-border">
                        <div class="card-block">
                        <img  style="float:right" src="/project_images/pro_tag.png" width="50px">

                            <div class="card-introduction card_gap">

                                <p class="m-t-13 text-muted">
                                Boutique : <a href="/BoutiqueEocars/{{$v->boutique->nom_boutique}}"><strong class="m-t-13 text-muted">{{$v->boutique->nom_boutique}} >> </strong></a><br>
                                Marque : <strong>{{$v->marque}}</strong><br>
                                Model : <strong>{{$v->model}}</strong><br>
                                Description : <strong>{{$v->description}}</strong><br>
                                Prix : <strong>{{$v->prix}}</strong><br>
                                @if($v->nbr_vu)Nombre de vues : <strong>{{$v->nbr_vu}}</strong><br>@endif
                                Vendeur : <strong>{{$v->user->email}}</strong>
                                </p>
                                <a href="/BoutiqueEocars/voitureDetails/{{$v->id}}"><button class="btn-boutique" type="button">Savoir Plus</button></a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach 
    @endif
    @if($voiture->count())
    @foreach($voiture as $v)
        @if(!$v->achatvoiture)
            <div class="boutique-border">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-block">
                                <div class="user-image car-image">
                                    <img src="{{$v->photo}}" alt="{{$v->ville}}-{{$v->marque}}" style="width:200px">
                                </div>
                            </div>
                        </div>
                    <div class="col-md-8 info-border">
                        <div class="card-block">
                            <div class="card-introduction card_gap">
                                <p class="m-t-13 text-muted">
                                Marque : <strong>{{$v->marque}}</strong><br>
                                Model : <strong>{{$v->model}}</strong><br>
                                Description : <strong>{{$v->description}}</strong><br>
                                Prix : <strong>{{$v->prix}}</strong><br>
                                @if($v->nbr_vu)Nombre de vues : <strong>{{$v->nbr_vu}}</strong><br>@endif
                                Vendeur : <strong>{{$v->user->email}}</strong>
                                </p>
                                <a href="/BoutiqueEocars/voitureDetails/{{$v->id}}"><button class="btn-boutique" type="button">Savoir Plus</button></a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach 
@endif
@else
@foreach($boutique_pro as $pro)
<div class="boutique-border">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="card-block">
                    <div class="user-image car-image">
                        <img src="{{$pro->lien_image}}" alt="{{$pro->ville_boutique}}-{{$pro->description}}" style="width:200px">
                    </div>
                </div>
            </div>
        <div class="col-md-8 info-border">
            <div class="card-block">
            <img  style="float:right" src="/project_images/pro_tag.png" width="50px">

                <div class="card-introduction card_gap">
                    <p class="m-t-13 text-muted">
                    Nom Boutique: <strong>{{$pro->nom_boutique}}</strong><br>
                    Date de création : <strong>{{$pro->created_at}}</strong><br>
                    Nombre de voitures : <strong>{{$pro->voiture->count()}}</strong><br>
                    Ville : <strong>{{$pro->ville_boutique}}</strong><br>
                    Vendeur : <strong>{{$pro->user->email}}</strong>
                    </p>
                    <a href="/BoutiqueEocars/{{$pro->nom_boutique}}"><button class="btn-boutique" type="button">Savoir Plus</button></a>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endforeach
@foreach($boutique as $b)
<div class="boutique-border">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="card-block">
                    <div class="user-image car-image">
                        <img src="{{$b->lien_image}}" alt="{{$b->ville_boutique}}-{{$b->description}}" style="width:200px">
                    </div>
                </div>
            </div>
        <div class="col-md-8 info-border">
            <div class="card-block">
                <div class="card-introduction card_gap">
                    <p class="m-t-13 text-muted">
                    Nom Boutique: <strong>{{$b->nom_boutique}}</strong><br>
                    Date de création : <strong>{{$b->created_at}}</strong><br>
                    Nombre de voitures : <strong>{{$b->voiture->count()}}</strong><br>
                    Ville : <strong>{{$b->ville_boutique}}</strong><br>
                    Vendeur : <strong>{{$b->user->email}}</strong>
                    </p>
                    <a href="/BoutiqueEocars/{{$b->nom_boutique}}"><button class="btn-boutique" type="button">Savoir Plus</button></a>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endforeach
@endif
</div>
</div>
</div>
<div class="row" style="width:104%">
    <div class="col-12" >
        <div style="margin-top:300px">
            @include('Components.footer')
            @yield('footer')
        </div> 
    </div>
</div>
</body>

<script>
    
  $("#tri_id").change(function(e){
      if($("#tri_id").val() == "0"){
        e.preventDefault();
      }else{
        $('#tri_form').submit();
      }
  });
</script>
</html>