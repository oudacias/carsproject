<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/popup.css">
<link rel="stylesheet" href="/css/articles.css">

<title>Forum</title>

@include('Components.menu')
@yield('menu')
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
    
