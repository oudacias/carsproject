<link rel="stylesheet" href="/css/mainstyle.css">

<link rel="stylesheet" href='/css/card.css'>

@include('Components.menu')
@yield('menu')
<title>ELAMDASSI ON CARS</title>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card user-card">
                <div class="card-block">
                    <div class="card-introduction">
                    <p class="m-t-24 text-muted">ELAMDASSI ON CARS est une entreprise dédiée à l’accompagnement des acheteurs des vendeurs et des revendeurs de voitures à travers ses différents services présentés sur nos plateformes aussi bien que le suivis  terrain de nos clients pour leurs assurer toutes les conditions d’une bonne opération achat revente cette entreprise à été à l’instar d’une chaine YouTube en pleine évolutions crée en 2016 par l’équipe de EOCARS</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-block">
                <div class="user-image">
                    <img src="cars.jpg">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
  <div class="row justify-content-around">
        <div class="col-md-4">        
            <div class="card user-card">
                <div class="user-image img-home">
                    <img src="Caranalysis.svg"></div>
                <div class="card-block">                   
                    <div class="card-introduction">
                        <p class="m-t-24 text-muted">ELAMDASSI ON CARS est une entreprise dédiée à l’accompagnement des acheteurs des vendeurs et des revendeurs de voitures à travers ses différents services présentés sur nos plateformes aussi bien que le suivis  terrain de nos clients pour leurs assurer toutes les conditions d’une bonne opération achat revente cette entreprise à été à l’instar d’une chaine YouTube en pleine évolutions crée en 2016 par l’équipe de EOCARS</p>
                        <button type="button" class="btn-original">Continuer</button>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-md-4">
            <div class="card user-card">
                 <div class="user-image img-home">
                    <img src="Caranalysis.svg"></div>
                <div class="card-block">
                    <div class="card-introduction">
                        <p class="m-t-24 text-muted">ELAMDASSI ON CARS est une entreprise dédiée à l’accompagnement des acheteurs des vendeurs et des revendeurs de voitures à travers ses différents services présentés sur nos plateformes aussi bien que le suivis  terrain de nos clients pour leurs assurer toutes les conditions d’une bonne opération achat revente cette entreprise à été à l’instar d’une chaine YouTube en pleine évolutions crée en 2016 par l’équipe de EOCARS</p>
                        <button type="button" class="btn-original">Continuer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
<div class="container border-articles">
    <h5>Nos Dérniers Articles</h5>
    <div class="row">
    @foreach($artc as $a)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-block">
                        <div class="user-image">
                            <img src="{{$a->lien_image}}">
                        </div>
                    </div>
                </div>
            <div class="col-md-8">
                <div class="card-block">
                    <div class="card-introduction">
                        <strong  STYLE="text-transform:uppercase">{{$a->titre}}</strong>
                        <p class="m-t-13 text-muted">{!!html_entity_decode(Str::limit($a->texte, 250))!!}<a class="link_article" href="/Articles/Article/{{$a->id}}">Lire Plus</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>  
    @endforeach     
    </div>

</div>
</body>
<html>

