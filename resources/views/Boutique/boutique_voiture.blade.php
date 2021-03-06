<meta name="description" content="{{$boutique->nom_boutique}} {{$boutique->description_boutique}}">



<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/popup.css">
<link rel="stylesheet" href="/css/articles.css">
<link rel="stylesheet" href="/css/article.css">
<link rel='stylesheet' href="/css/confirmation.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title>Eocars {{$boutique->nom_boutique}}</title>

@include('Components.menu')
@include('Boutique.rechercheHeader')
@yield('menu')
@yield('recherche')

<div class="container other-sides">
<h2>&nbsp;&nbsp;&nbsp;&nbsp;{{$boutique->nom_boutique}}</h2>
<br>
<div class="description-border">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card-block">

                @if($boutique->type)<img  style="float:right" src="/project_images/pro_tag.png" width="50px">@endif

                    <div class="card-introduction">
                    <img src="{{$boutique->lien_image}}" style="display: block;margin-left: auto;margin-right: auto;width: 140px;">
                        <p class="m-t-24 text-muted"><strong>Description :</strong>{{$boutique->description_boutique}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if($boutique->voiture->count())
    @foreach($boutique->voiture as $v)
    @if(!$v->achatvoiture)
    <div class="boutique-border">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-block">
                        <div class="user-image car-image">
                            <img src="{{$v->photo}}" alt="{{$v->ville}}-{{$v->marque}}">
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
@else
<br>

    <i>Cette boutique est encore vide</i>

@endif
       
</div>
</body>
<div class="row" style="width:104%">
    <div class="col-12" >
        <div style="margin-top:300px">
            @include('Components.footer')
            @yield('footer')
        </div> 
    </div>
</div>

</html>