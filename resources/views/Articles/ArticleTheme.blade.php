<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/popup.css">
<link rel="stylesheet" href="/css/articles.css">
<link rel="stylesheet" href="/css/pub.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<meta name="description" content="{{$seo_article->description}}">
<meta name="keywords" content="{{$seo_article->keywords}}">

@include('Components.menu')
@yield('menu')


<div class="container_filter1">
    <div class="filter"><a onclick="show_filter()"><img src="/project_images/arrow_down.png" width="20px"> &nbsp; Filter par thème :  </a></div>
<div class="container container_filter" id="filter_id">
    <div class="row">
        <div class="row card_gap">
            <div class="col-md-6">
                <div class="card-block">
                <ul>
                    @foreach($categories as $c)
                        @if(Request::segment(2) != $c->categorie)
                            <li><a class="filter_link" href="/MagazineEocars/{{$c->categorie}}"> {{$c->categorie}} </a></li>
                        @else
                        <li style="width:200px"><b>{{$c->categorie}}</b>&nbsp;&nbsp; <a href="/MagazineEocars/" > &nbsp;&nbsp; <img src="/project_images/cancel_filter.png" width=25px></a></li>
                        @endif
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>




<br>
<br>
<br>
<br>
<br>
<br>
<br>



<div class="container">
@if($pub_h->count())
    @foreach($pub_h as $h)
        @if($h->type == 'Youtube')
            <div class="responsive-video">
                <input type="hidden" id="youtube_h" value = "{{$h->lien_youtube}}"/>
                <iframe  id="video" class="video" frameborder="0" style="display: none" width="480" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
            </div>
        @elseif($h->type == 'Image')
            <center><a href="//{{$h->lien_publicite}}"><img class="pub_m" src="{{$h->lien_media}}"></a></center>
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
                        <center><a href="//{{$g->lien_publicite}}"><img src="{{$g->lien_media}}" class="pub_img"></a></center>
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
        @foreach($artc as $a)
            <div class="row card_gap">
                    <div class="col-md-4">
                        <div class="card-block">
                            <div class="user-image article-image">
                            <a href="/MagazineEocars/{{$a->id}}/{{$a->slug}}"><img src="{{$a->lien_image}}"></a>
                            </div>
                        </div>
                    </div>
                <div class="col-md-8">
                    <div class="card-block">
                        <div class="card-introduction">
                        <a href="/MagazineEocars/{{$a->id}}/{{$a->slug}}"><strong>{{$a->titre}}</strong></a>
                        <p>Rédigé : {{$a->created_at->format('d-m-Y')}}</p>
                            <p class="m-t-13 text-muted">{!!html_entity_decode(Str::limit($a->texte, 650))!!}</p><a href="/MagazineEocars/{{$a->id}}/{{$a->slug}}">Lire Plus</a>
                        </div>
                        </div>
                    </div>
                </div>
        @endforeach     
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
                        <center><a href="//{{$d->lien_publicite}}"><img src="{{$d->lien_media}}" class="pub_img"></a></center>
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
</div>
</div>
</div>

<br>
   
</body>
</div>
<div style="margin-top:400px">
@include('Components.footer')
@yield('footer')
</div>
<script>
    function show_filter(){
        $("#filter_id").toggle();
    }

$( document ).ready(function() {
    $("#filter_id").hide();

    
});



</script>
</html>