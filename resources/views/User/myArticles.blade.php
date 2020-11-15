<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/popup.css">
<link rel="stylesheet" href="/css/articles.css">
<link rel="stylesheet" href="/css/confirmation.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title>Articles Favoris</title>

@include('Components.menu')
@yield('menu')
@if(session('success'))
		<div class="animated fadeOut success">{{session('success')}}</div>
@endif
<h4>Mes Articles Favoris</h4>
<div class="container">
@foreach($user->articles as $u)
    <div class="row card_gap">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-block">
                        <div class="user-image article-image">
                        <a href="/MagazineEocars/{{$u->id}}/{{$u->slug}}"><img src="{{$u->lien_image}}"></a>
                        </div>
                    </div>
                </div>
            <div class="col-md-4">
                <div class="card-block">
                    <div class="card-introduction">
                    <a href="/MagazineEocars/{{$u->id}}/{{$u->slug}}"><strong>{{$u->titre}}</strong></a>
                        <p class="m-t-13 text-muted">{!!html_entity_decode(Str::limit($u->texte, 450))!!}</p><a href="/MagazineEocars/{{$u->id}}/{{$u->slug}}">Lire Plus</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <a href="/User/SupprimerFavoris/{{$u->pivot->id}}"><img style="margin-top:30%;margin-left:90%" src="/project_images/trash.png" width="20%"></a>
            </div>
        </div>
    </div>
    @endforeach  
</div>  
</div>  
</div>    
<div style="margin-top:300px">
@include('Components.footer')
@yield('footer')
</div>