<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href='/css/card.css'>
<link rel="stylesheet" href='/css/articles.css'>
<link rel="stylesheet" href='/css/pub.css'>

<link rel="stylesheet" href="/css/carousel.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="/javascript/carousel.js"></script>




@include('Components.menu')
@yield('menu')
<title>ELAMDASSI ON CARS</title>
<div class="container">
@if($pub_h->count())
    @foreach($pub_h as $h)
        @if($h->type == 'Youtube')
            <div class="responsive-video">
                <input type="hidden" id="youtube_h" value = "{{$h->lien_youtube}}"/>
                <iframe  id="video" class="video" frameborder="0" style="display: none" width="480" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
            </div>
        @elseif($h->type == 'Image')
            <center><a href="{{$h->lien_publicite}}"><img src="{{$h->lien_media}}"></a></center>
        @elseif($h->type == 'Javascript')
            <script>
                {{$h->script}}
            </script>
        @endif
    @endforeach
@endif

<div class="row">
@if($pub_g->count())
    @foreach($pub_g as $g)
        <div class="col-md-2">
            <div class="user-card container_pub"> 
                <div class="card-block">
                    <div class="card-introduction">
                    @if($g->type == 'Image')
                        <center><a href="{{$g->lien_publicite}}"><img src="{{$g->lien_media}}" class="pub_img"></a></center>
                    @elseif($g->type == 'Javascript')
                        <script>
                            {{$g->script}}
                        </script>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
@if($pub_g->count() && $pub_d->count())
    <div class="col-md-8">
@elseif($pub_g->count() && !$pub_d->count() || !$pub_g->count() && $pub_d->count())
    <div class="col-md-10">
@elseif(!$pub_g->count() && !$pub_d->count())
    <div class="col-md-12">
@endif
        <div class="container" id="container">
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
        <h4 class="tile-carousel">Nos Derniers Boutiques</h4>
        <section class="customer-logos slider">               
            @foreach($boutique as $b)
                <div style="text-align:center" class="slide"><a href="/Boutique/boutique_voiture/{{$b->id}}"><img src="{{$b->lien_image}}">{{$b->nom_boutique}}</a></div>
                <div style="text-align:center" class="slide"><a href="/Boutique/boutique_voiture/{{$b->id}}"><img src="{{$b->lien_image}}">{{$b->nom_boutique}}</a></div>
                <div style="text-align:center" class="slide"><a href="/Boutique/boutique_voiture/{{$b->id}}"><img src="{{$b->lien_image}}">{{$b->nom_boutique}}</a></div>
                <div style="text-align:center" class="slide"><a href="/Boutique/boutique_voiture/{{$b->id}}"><img src="{{$b->lien_image}}">{{$b->nom_boutique}}</a></div>
            @endforeach  
        </section>
        @if($pub_m->count())
        @foreach($pub_m as $m)
        <div class="col-md-12">
            <div class="user-card"> 
                <div class="card-block">
                    <div class="card-introduction">
                        @if($m->type == 'Image')
                            <center><a href="{{$m->lien_publicite}}"><img src="{{$m->lien_media}}" class="pub_m"></a></center>
                        @elseif($m->type == 'Javascript')
                            <script>
                                {{$m->script}}
                            </script>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif
    </div>
@if($pub_d->count())
    @foreach($pub_d as $d)
    <div class="col-md-2">
            <div class="user-card container_pub container_pub_d"> 
                <div class="card-block">
                    <div class="card-introduction">
                    @if($d->type == 'Youtube')
                        <div class="responsive-video">
                            <input type="hidden" id="youtube_d" value = "{{$d->lien_youtube}}"/>
                            <iframe  id="video" class="video" frameborder="0" style="display: none" width="480" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                        </div>
                    @elseif($d->type == 'Image')
                        <center><a href="{{$d->lien_publicite}}"><img src="{{$d->lien_media}}" class="pub_img"></a></center>
                    @elseif($d->type == 'Javascript')
                        <script>
                            {{$d->script}}
                        </script>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif


<div class="container" id="containers">
<!-- ********* -->
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
</div>
<style>
.responsive-video {
    overflow:hidden;
    height:0;
    padding-bottom:25%;
}
.responsive-video iframe {
    left:0;
    top:100px;
    height:40%;
    width:60%;
    position:absolute;
    margin-left:20%;
    margin-right:auto;
}
</style>
</body>


<script>
$(document).ready(function(){
    var url = $("#youtube_h").val();
    url = url.split('v=')[1];
    $("#video")[0].src = "https://www.youtube.com/embed/" + url;
    $("#video").show();
});
</script>
<html>


