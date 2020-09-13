<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/articles.css">
</head>
<body>
@include('Components.menu')
@yield('menu')
<div class="container-contact100">
    <div class="wrap-contact100">
        <form method="POST" action="{{ route('login') }}">
        @csrf
        
            <span class="contact100-form-title">Bienvenue dans notre Plateforme</span>
            
            
            @if ($errors->has('password') or $errors->has('email'))
                <h7 style="color:#FAB107">Email ou mot de passe incorrect</h7>                    
            @endif
            
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

<script>


    
</script>

  
