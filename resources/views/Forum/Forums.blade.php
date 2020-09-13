<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/popup.css">
<link rel="stylesheet" href="/css/articles.css">

<title>Forum</title>

@include('Components.menu')
@yield('menu')
<div style="float:left; margin-left:100px">
@if(Session::get('theme'))
    @foreach(Session::get('theme') as $s)
        <span class="filter-element">{{$s}}<a style="margin-left:5px" href="/Forum/Forum/{{$s}}">x</a></span>
    @endforeach
@endif
<hr/>
</div>
<form method="post" action="{{ action('ForumController@TrouverTheme') }}">
@csrf
<div style="float:right;margin-right:100px">
Rechercher par thème &nbsp;
<select class="filter-select" name="theme">
@foreach($theme as $t)
  <option value="{{$t->theme}}">{{$t->theme}}</option>
@endforeach
</select>
<input width="35px" style="position:absolute;margin-top:8px" type="image" src="/project_images/filter.png" alt="submit" />
</form>
</div>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="container">
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
                                        <input class="input100" type="text" name="titre" placeholder="Titre">
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
                                        <textarea class="input100_forum" name="sujet" placeholder="Sujet"></textarea>
                                        <span class="focus-input100"></span>
                                    </div>
                                    <div class="container-contact100-form-btn">
                                        <button class="contact100-form-btn">
                                            Ajouter
                                        </button>
                                    </div>
                                </form>
                            </div></div>
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
    <div class="container">

    @foreach($forums as $f)
    <div class="row">
        <div class="col-10">
            <div class="card user-card">
                <div class="card-block">
                    <div class="card-introduction">
                        <div class="row">
                            <div class="col-1"><img src="/project_images/qa.png" width="80%"> </div>
                            <div class="col-10">
                                <a href="/Forum/Forums/{{$f->id}}"><strong>{{$f->sujet}}</strong></a><br>
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
    
