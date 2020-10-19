<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/popup.css">
<link rel="stylesheet" href="/css/articles.css">
@include('Components.menu')
@yield('menu')
<div style="float:left; margin-left:100px">
@if(Session::get('categorie'))
    @foreach(Session::get('categorie') as $s)
        <span class="filter-element">{{$s}}<a style="margin-left:5px" href="/Article/Articles/{{$s}}">x</a></span>
    @endforeach
@endif
<hr/>
</div>
<form method="post" action="{{ action('ArticleController@TrouverCategorie') }}">
@csrf
<div style="float:right;margin-right:100px">Categorie :
<select class="filter-select" name="categorie">
@foreach($categories as $c)
  <option value="{{$c->categorie}}">{{$c->categorie}}</option>
@endforeach
</select>
<input width="35px" style="position:absolute;margin-top:8px" type="image" src="/project_images/filter.png" alt="submit" />
</form>
</div>
<br>
<br>
<br>
<br>
<h4>Nos Articles</h4>
<div id="container" class="container">
    @foreach($artc as $a)
    <div class="row card_gap">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-block">
                        <div class="user-image article-image">
                        <a href="/Articles/Article/{{$a->id}}"><img src="{{$a->lien_image}}"></a>
                        </div>
                    </div>
                </div>
            <div class="col-md-8">
                <div class="card-block">
                    <div class="card-introduction">
                    <a href="/Articles/Article/{{$a->id}}"><strong>{{$a->titre}}</strong></a>
                    <p>Rédigé : {{$a->created_at->format('d-m-Y')}}</p>
                        <p class="m-t-13 text-muted">{!!html_entity_decode(Str::limit($a->texte, 650))!!}</p><a href="/Articles/Article/{{$a->id}}">Lire Plus</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach     
</div>
<br>
    <div class="d-flex justify-content-center">
        {!! $artc->links() !!}
    </div>
</body>
</html>