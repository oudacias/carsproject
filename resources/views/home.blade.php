<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href='/css/card.css'>
<link rel="stylesheet" href='/css/articles.css'>

<link rel="stylesheet" href="/css/carousel.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="/javascript/carousel.js"></script>




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
                    <img src="/project_images/cars.jpg">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Carousel  -->


<div class="container">
<h4 class="tile-carousel">Nos Derniers Boutiques</h4>
    <section class="customer-logos slider">               
        @foreach($boutique as $b)
            <div style="text-align:center" class="slide"><a href="/Boutique/boutique_voiture/{{$b->id}}"><img src="{{$b->lien_image}}">{{$b->nom_boutique}}</a></div>
            <div style="text-align:center" class="slide"><a href="/Boutique/boutique_voiture/{{$b->id}}"><img src="{{$b->lien_image}}">{{$b->nom_boutique}}</a></div>
            <div style="text-align:center" class="slide"><a href="/Boutique/boutique_voiture/{{$b->id}}"><img src="{{$b->lien_image}}">{{$b->nom_boutique}}</a></div>
            <div style="text-align:center" class="slide"><a href="/Boutique/boutique_voiture/{{$b->id}}"><img src="{{$b->lien_image}}">{{$b->nom_boutique}}</a></div>
            @endforeach  
    </section>
</div>





<!-- ********* -->
<div class="container">
    <h4>Nos Dérniers Articles</h4>
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

