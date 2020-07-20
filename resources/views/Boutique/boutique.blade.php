<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/popup.css">
<link rel="stylesheet" href="/css/articles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title>Boutique</title>

@include('Components.menu')
@yield('menu')
<div class="container">
    <div class="row">
        <div class="col-12"><label>Créer votre nouvelle boutique</label>
            <a href="#new"><img src="/project_images/plus.png" width="40px"></a>
            <div id="new" class="overlay">
                <div class="popup" >
                    <a class="close_forum" href="#">&times;</a>
                            @if(Auth::check())
                            <div class="container-contact100" >
                            <div class="wrap-forum">
                                <form method="post" action="{{ action('BoutiqueController@ajouterBoutique') }}">
                                    @csrf
                                    <h4>Nouvelle Boutique</h4>
                                    <div class="wrap-input100">
                                        <input class="input100" type="text" name="nom_boutique" placeholder="Nom Boutique">
                                        <span class="focus-input100"></span>
                                    </div>
                                    <div class="wrap-input100">
                                        <textarea class="input100_forum" name="description_boutique" placeholder="Description Boutique"></textarea>
                                        <span class="focus-input100"></span>
                                    </div>
                                    <div class="wrap-input100">
                                        <div style="color:#999999">Type de Boutique</div>
                                        <select class="input100" name="type_boutique" placeholder="Type Boutique">
                                            <option>Professionnel</option>
                                            <option>Standard</option>
                                        </select>
                                    </div>
                                    <div class="container-contact100-form-btn">
                                        <button class="contact100-form-btn">
                                            Ajouter
                                        </button>
                                    </div>
                                </form>
                            </div></div>
                            @else
                            <div class="container-contact100 container_connect" >
                            <div class="wrap-forum">
                                Veuillez vous <a href="/login"><i><u>connecter</u></i></a> avant de créer votre Boutique </div>
                            @endif
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Articles</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/card.css">
    <link rel="stylesheet" type="text/css" href="/css/mainstyle.css">
</head>
<body>
<div class="container">
    @if($voiture->count())
    @foreach($voiture as $v)
    <div class="row boutique-border">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-block">
                        <div class="user-image car-image">
                            <img src="{{$v->photo}}">
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
                        <a href="/Services/service_suivi"><button class="btn-boutique" type="button">Savoir Plus</button></a>
                        <a href="/Services/service_suivi"><button class="btn-boutique" type="button">Contacter</button></a>

                    </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row boutique-border">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-block">
                        <div class="user-image car-image">
                            <img src="{{$v->photo}}">
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
                        <a href="/Services/service_suivi"><button class="btn-boutique" type="button">Savoir Plus</button></a>
                        <a href="/Services/service_suivi"><button class="btn-boutique" type="button">Contacter</button></a>

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach 
    @endif
    <div class="row other-side">
        <div class="card-block">
            <div class="card-introduction card_gap">
                <p class="m-t-13 text-muted">
                Hello
                </p>
            </div>
        </div>
    </div>    
</div>
</body>
</html>