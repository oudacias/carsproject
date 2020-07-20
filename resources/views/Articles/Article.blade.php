<head>
    <title>{{$artc->titre}}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/card.css">
    <link rel="stylesheet" type="text/css" href="/css/mainstyle.css">
    <link rel="stylesheet" type="text/css" href="/css/article.css">
    <link rel="stylesheet" type="text/css" href="/css/social.css">
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
                            <input type="hidden" id="youtube" value = "{{$artc->lien_youtube}}" />
                            <iframe  id="video" width="420" height="315" frameborder="0" style="display: none"
                            allowfullscreen></iframe>
                        @endif
                    </div>
                    
                </div>
            <p style="color:#FAB107">Partagez l'article : </p>
            <div class="social">
                <div class="social__item">
                    <span class="fa fa-facebook" data-social="fb"></span>
                </div>
                <div class="social__item">
                    <span class="fa fa-twitter" data-social="tw"></span>
                </div>
            </div>
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
    

