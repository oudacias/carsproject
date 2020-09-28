<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/popup.css">
<link rel="stylesheet" href="/css/articles.css">
<title>{{$forum->sujet}}</title>
@include('Components.menu')
@yield('menu')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card user-card">
                <div class="card-block">
                    <div class="card-introduction">
                    <img class="forum-img" src="{{$user_pic}}">
                        <strong>{{$forum->sujet}}</strong><br><br>
                        {{$forum->texte}} 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-6">
        <div class="card user-card">
        <div class="card-block">
        @if(Auth::check())
        <form method="POST" action="{{ action('ForumController@insertComment')}}">
        @csrf
            <span><h6>Participez avec nous !</h6></span><br>
            <input type="text" name="id" value="{{$forum->id}}" hidden>
            <div class="wrap-input100 validate-input">
                <textarea class="input100_forum" name="commentaire" placeholder="Commentaire"></textarea>
            </div>
            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn">
                    Commenter
                </button>
            </div>
        </form>
        @else
        <span><p>Veuillez vous <a href="/login"><i><u>connecter</u></i></a> pour participer avec nous</p></span>
        @endif
    </div>
</div></div></div>
<hr>
<h3>Commentaires</h3>
@foreach($forum->users as $f)
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="card user-card">
                <div class="card-block">
                    <div class="card-introduction">
                    <img src="{{$f->user->Userimage->image_path}}" class="forum-img">&nbsp&nbsp<strong>{{$f->user->prenom}}</strong><br>
                        {{$f->pivot->commentaire}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach


@if($otherforums->count())
<div class="container">
    <br>
    <br>
    <br>
<h5>Forums qui peuvent vous intéresser</h5>
    @foreach($otherforums as $f)
    <div class="row">
        <div class="col-8">
            <div class="card user-card">
                <div class="card-block">
                    <div class="card-introduction">
                        <div class="row">
                            <div class="col-1"><img src="/project_images/qa.png" width="80%"> </div>
                            <div class="col-8">
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
@endif
</div>
    