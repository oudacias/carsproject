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
                        <div class="container">
                            <input type="hidden" id="youtube" value = "{{$artc->lien_youtube}}" />
                            <iframe  id="video" class="video" frameborder="0" style="display: none"
                            allowfullscreen></iframe>
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
            <h5 style="color:#FAB107">Partagez l'article : </h5>
            <div class="social">
                <div class="social__item">
                    <span class="fa fa-facebook" data-social="fb"></span>
                </div>
                <div class="social__item">
                    <span class="fa fa-twitter" data-social="tw"></span>
                </div>
            </div>
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
<script>
$(function () {
    $('[data-social]').socialButtons({
    url: "{{$artc->titre}} " + "www.google.com"
  });
});

$(document).ready(function(){
   


    var url = $("#youtube").val();
    url = url.split('v=')[1];
    $("#video")[0].src = "https://www.youtube.com/embed/" + url;
    $("#video").show();
});
</script>
    

