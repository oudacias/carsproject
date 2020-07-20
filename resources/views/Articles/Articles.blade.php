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
@include('Components.menu')
@yield('menu')
<h4>Nos Articles</h4>
<div class="container">
    @foreach($artc as $a)
    <div class="row card_gap">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-block">
                        <div class="user-image article-image">
                            <img src="{{$a->lien_image}}">
                        </div>
                    </div>
                </div>
            <div class="col-md-8">
                <div class="card-block">
                    <div class="card-introduction">
                        <strong>{{$a->titre}}</strong>
                        <p class="m-t-13 text-muted">{!!html_entity_decode(Str::limit($a->texte, 650))!!}</p><a href="/Articles/Article/{{$a->id}}">Lire Plus</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach     
</div>
</body>
</html>