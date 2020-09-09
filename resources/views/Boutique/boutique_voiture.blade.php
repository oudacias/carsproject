<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/popup.css">
<link rel="stylesheet" href="/css/articles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title>Boutique</title>

@include('Components.menu')
@yield('menu')

<h1>{{$boutique->nom_boutique}}</h1>
<div class="container">

@foreach($boutique->voiture as $b)
<div class="row boutique-border">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-block">
                        <div class="user-image car-image">
                            <img src="{{$b->photo}}">
                        </div>
                    </div>
                </div>
            <div class="col-md-8 info-border">
                <div class="card-block">
                    <div class="card-introduction card_gap">
                        <p class="m-t-13 text-muted">
                        Marque : <strong>{{$b->marque}}</strong><br>
                        Model : <strong>{{$b->model}}</strong><br>
                        Description : <strong>{{$b->description}}</strong><br>
                        Prix : <strong>{{$b->prix}}</strong><br>
                        Vendeur : <strong>{{$b->user->email}}</strong>
                        </p>
                        <a href="/Boutique/voitureDetails/{{$b->id}}"><button class="btn-boutique" type="button">Savoir Plus</button></a>

                    </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endforeach