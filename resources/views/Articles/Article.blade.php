<head>
    <title>{{$artc->titre}}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/card.css">
    <link rel="stylesheet" type="text/css" href="/css/mainstyle.css">
    <link rel="stylesheet" type="text/css" href="/css/article.css">
</head>
<body>
@include('Components.menu')
@yield('menu')


        <div class="container">
  <div class="row justify-content-around">
  <h1>{{$artc->titre}}</h1></div>
  <div class="header-banner" style="background-image: url('{{$artc->lien_image}}')"></div>
  <div class="row justify-content-around">
        <div class="col-md-12"> 
            <div class="card user-card">
                <div class="card-block">
                    <div class="card-introduction"><p class="m-t-13 text-muted">
                        {!!html_entity_decode($artc->texte)!!}
                </div>
            </div>
        </div>
    </div>

  