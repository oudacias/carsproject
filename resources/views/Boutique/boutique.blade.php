<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/popup.css">
<link rel="stylesheet" href="/css/articles.css">
<link rel="stylesheet" href="/css/confirmation.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title>Eocars Boutique</title>

@include('Components.menu')
@include('Boutique.rechercheHeader')
@yield('menu')
@yield('recherche')
<div class="container other-sides">
    @if($voiture->count())
        @if($msg == " ")
            <h4>Résultat pour " @if(Request::get('marque')){{Request::get('marque')}}@endif @if(Request::get('model')){{Request::get('model')}}@endif @if(Request::get('carburant')){{Request::get('carburant')}}@endif @if(Request::get('vitesse')){{Request::get('vitesse')}}@endif @if(Request::get('ville')){{Request::get('ville')}}@endif @if(Request::get('prix')){{Request::get('prix')}}@endif @if(Request::get('nom_boutique')){{Request::get('nom_boutique')}}@endif @if(Request::get('ville_boutique')){{Request::get('ville_boutique')}}@endif   "</h4>
        @endif 
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





</html>