<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/popup.css">
<link rel="stylesheet" href="/css/articles.css">
<link rel="stylesheet" href="/css/pub.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<title>Forum</title>

@include('Components.menu')
@yield('menu')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="container_filter1" style="float:right">
                <div class="filter">
                    <a onclick="show_filter()"><img src="/project_images/arrow_down.png" width="20px"> &nbsp; Filter par catégorie :  </a>
                </div>
            <div class="container container_filter" id="filter_id">
                <div class="row">
                    <div class="row card_gap">
                        <div class="col-md-6">
                            <div class="card-block">
                            <ul>
                                @foreach($theme as $t)
                                    @if(Request::segment(2) != $t->theme)
                                        <li><a class="filter_link" href="/ForumEocars/{{$t->theme}}"> {{$t->theme}} </a></li>
                                    @else
                                        <li style="width:200px"><b>{{$t->theme}}</b>&nbsp;&nbsp; <a href="/ForumEocars/" > &nbsp;&nbsp; <img src="/project_images/cancel_filter.png" width=25px></a></li>
                                    @endif
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@if($pub_h->count())
    @foreach($pub_h as $h)
        @if($h->type == 'Youtube')
            <div class="responsive-video">
                <input type="hidden" id="youtube_h" value = "{{$h->lien_youtube}}"/>
                <iframe  id="video" class="video" frameborder="0" style="display: none" width="480" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
            </div>
        @elseif($h->type == 'Image')
            <center><a href="/{{$h->lien_publicite}}"><img class="pub_m" src="{{$h->lien_media}}"></a></center>
        @elseif($h->type == 'Javascript')
            <script>
                {{$h->script}}
            </script>
        @endif
    @endforeach
@endif
</div>
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
        <div class="col-12" ><label>Partagez vos questions et idées avec nous </label>
            <a href="#new"><img src="/project_images/plus.png" width="40px"></a>
            <div id="new" class="overlay">
                <div class="popup" >
                    <a class="close_forum" href="#">&times;</a>
                    @if(Auth::check())
                    <div class="container-contact100" >
                        <div class="wrap-forum">
                            <form method="post" action="{{ action('ForumController@Sujet') }}">
                                @csrf
                                <div class="wrap-input100">
                                    <input class="input100" type="text" name="titre" placeholder="Titre" required>
                                    <span class="focus-input100"></span>
                                </div>
                                <div class="wrap-input100">
                                    <div style="color:#999999">Theme</div>
                                        <select class="input100" name="theme">
                                            @foreach($theme as $t)
                                                <option value="{{$t->theme}}">{{$t->theme}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                <div class="wrap-input100">
                                    <textarea class="input100_forum" name="sujet" placeholder="Sujet" required></textarea>
                                    <span class="focus-input100"></span>
                                </div>
                                <div class="container-contact100-form-btn">
                                    <button class="contact100-form-btn">
                                        Ajouter
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="container-contact100 container_connect" >
                        <div class="wrap-forum">
                            Veuillez vous <a href="/login"><i><u>connecter</u></i></a> avant de poser votre Sujet </div>
                    @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div id="containers" class="container">
    @foreach($forums as $f)
        <div class="row">
            <div class="col-10">
                <div class="card user-card">
                    <div class="card-block">
                        <div class="card-introduction">
                            <div class="row">
                                <div class="col-1">
                                    <img src="/project_images/qa.png" width="80%">
                                </div>
                                <div class="col-10">
                                    <a href="/Forum/Forums/{{$f->id}}"><strong>{{$f->sujet}} ({{$f->users->count()}})</strong></a><br>
                                    {{$f->texte}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    </div>
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
    <br>
    <div class="d-flex justify-content-center">
        {!! $forums->links() !!}
    </div>
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
