<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/popup.css">
<link rel="stylesheet" href="/css/articles.css">
@include('Components.menu')
@yield('menu')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card user-card">
                <div class="card-block">
                    <div class="card-introduction">
                        <strong>{{$forum->sujet}}</strong><br>
                        {{$forum->texte}} 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-4">
        <div class="card user-card">
        <div class="card-block">
        @if(Auth::check())
        <form method="POST" action="{{ route('login') }}">
        @csrf
            <span><h6>Participez avec nous !</h6></span><br>
            <div class="wrap-input100 validate-input">
                <textarea class="input100_forum" name="texte" placeholder="Rédiger Article"></textarea>
                <span class="focus-input100"></span>
            </div>
            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn">
                    Ecrire un Commentaire
                </button>
            </div>
        </form>
        @else
        <span><p>Veuillez vous connecter pour participer avec nous</p></span>
        @endif
    </div>
</div>