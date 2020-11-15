<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/popup.css">
<link rel="stylesheet" href="/css/articles.css">
<link rel='stylesheet' href="/css/confirmation.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title>Boutique</title>

@include('Components.menu')
@include('Boutique.rechercheHeader')
@yield('menu')
@yield('recherche')
    @if($voiture->count())
        @foreach($voiture as $v)
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
                            <a href="/Boutique/voitureDetails/{{$v->id}}"><button class="btn-boutique" type="button">Savoir Plus</button></a>
                        </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        
        @endforeach 
    @else
        <i><strong>Cette boutique est encore vide</strong></i>

    @endif
       
</div>
</body>
</html>