
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/articles.css">
@include('Components.menu')
@yield('menu')
@php $design= App\Design::first() @endphp

<div class="container-contact100">
    <div class="wrap-contact100">
        <form method="POST" action="{{ route('login') }}">
        @csrf 
            <span class="contact100-form-title">Bienvenue dans Eocars</span>
            <img src="{{$design->logo}}" alt="Eocars" style="display: block;margin-left: auto;margin-right: auto;width: 60px;">
            @if ($errors->has('password') or $errors->has('email'))
                <h7 style="color:#FAB107">Email ou mot de passe incorrect</h7>                    
            @endif   
            <br>    
            <div class="wrap-input100 validate-input">
                <input id='email' class="input100" type="text" name="email" placeholder="Votre Email" required>
                <span class="focus-input100"></span>
            </div>
            <input id='role' type="text" name="role" value="utilisateur" hidden>
            <div class="wrap-input100 validate-input">
                <input id='password' class="input100" type="password" name="password" placeholder="Votre Mote de Passe" required>
                <span class="focus-input100"></span>
            </div>       
            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn">
                    SE CONNECTER
                </button>
            </div>
        </form>
        <a class="btn btn-link" style="float:right" href="{{ route('password.request') }}">
            Mot de passe oublié ?
        </a>
        </div>
</div>
