<head>
    <title>{{$artc->titre}}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/articles.css">

    <link rel="stylesheet" type="text/css" href="/css/card.css">
    <link rel="stylesheet" type="text/css" href="/css/mainstyle.css">
    <link rel="stylesheet" type="text/css" href="/css/article.css">
    <link rel="stylesheet" type="text/css" href="/css/social.css">
    <link rel="stylesheet" type="text/css" href="/css/popup.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://rawgit.com/Belyash/jquery-social-buttons/master/src/jquery.social-buttons.min.js'></script>
</head>
<body>
    @include('Components.menu')
    @yield('menu')


    <div class="container">
        <div class="row justify-content-around">
            <h1 id="titres">{{$artc->titre}}</h1></div>
            <div class="header-banner" style="background-image: url('{{$artc->lien_image}}')"></div>
            <div class="row justify-content-around">
                <div class="col-md-12"> 
                    <div class="card user-card">
                        <div class="card-block">
                            <div class="card-introduction"><p class="m-t-13 text-muted">
                                {!!html_entity_decode($artc->texte)!!}
                                
                        </div>
                        @if($artc->lien_youtube)

                        <div class="responsive-video">
                            <input type="hidden" id="youtube" value = "{{$artc->lien_youtube}}" />
                            <iframe  id="video" class="video" frameborder="0" style="display: none" width="480" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                        </div>
                        @endif
                    </div>
                    
                </div>
            
            @if(Auth::check())
                @if($artc->user->count())
                    <h6 style="color:#441800">C'est article est dans votre collection de <u><a href="/User/myArticles">favoris</a></u></h6>
                @else
                    <h5 style="color:#FAB107">Ajouter au favoris : <a href="/User/AjouterArticle/{{$artc->id}}"><img src="/project_images/heart1.png" width="40px"></a></h5>
                @endif
            @else
                <h5 style="color:#FAB107">Ajouter au favoris : <a href="#new"><img src="/project_images/heart1.png" width="40px"></a></h5>
                <div id="new" class="overlay">
                    <div class="popup" style="margin-top:300px">
                        <a class="close_forum" href="#">&times;</a>
                        <div class="container-contact100 container_connect" >
                            <div class="wrap-forum">
                                Veuillez vous <a href="/login"><i><u>connecter</u></i></a>
                            </div>
                        </div>
                    </div>
                </div>          
            @endif
            <p style="color:#FAB107">Partagez l'article :
            <span class="twitter-share" data-js="twitter-share"><i class="fab fa-twitter"></i>&nbsp; Partager sur Twitter</span>
            <span class="facebook-share" data-js="facebook-share"><i class="fab fa-facebook"></i>&nbsp; Partager sur Facebook</span>
            @if($articles->count())
            <div class="container">
                <h4>Articles qui peuvent vous intéresser</h4>
                <div class="row">
                    @foreach($articles as $a)
                    <div class="col-md-6">
                        <div class="card">
                            <div class="row">
                            <div class="col-md-3"><img class="cars_article" src="{{$a->lien_image}}"></div>
                                <div class="col-md-8 article_card"><h8><strong>{{$a->titre}}</strong></h8>
                                    <p class="m-t-13 text-muted">{!!html_entity_decode(Str::limit($a->texte, 150))!!}</p><a href="/Articles/Article/{{$a->id}}">Lire Plus</a>
                                </div>
                            </div>
                        </div>               
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</body>

<style>

.responsive-video {
    overflow:hidden;
    padding-bottom:46.25%;
    position:relative;
    height:0;
}
.responsive-video iframe {
    left:0;
    top:0;
    height:100%;
    width:60%;
    position:absolute;
    margin-left:20%;
    margin-right:auto;
}


</style>
<script>


$(document).ready(function(){
    var url = $("#youtube").val();
    url = url.split('v=')[1];
    $("#video")[0].src = "https://www.youtube.com/embed/" + url;
    $("#video").show();


    var twitterShare = document.querySelector('[data-js="twitter-share"]');

    twitterShare.onclick = function(e) {
    e.preventDefault();
    var twitterWindow = window.open('https://twitter.com/share?url=' + document.URL, 'twitter-popup', 'height=350,width=600');
    if(twitterWindow.focus) { twitterWindow.focus(); }
        return false;
    }

    var facebookShare = document.querySelector('[data-js="facebook-share"]');

    facebookShare.onclick = function(e) {
    e.preventDefault();
    var facebookWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + document.URL, 'facebook-popup', 'height=350,width=600');
    if(facebookWindow.focus) { facebookWindow.focus(); }
        return false;
    }
});
</script>
    

