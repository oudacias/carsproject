<!DOCTYPE html>
<html lang="en">
<head>
    <title>Espace Admin</title>
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
                        <span class="contact100-form-title">Bienvenue Administrateur</span>
                        <div class="wrap-input100 validate-input">
                            <input id='email' class="input100" type="text" name="email" placeholder="Votre Email">
                            <span class="focus-input100"></span>
                        </div>
                        <input id='role' type="text" name="role" value="administrateur" hidden>

                        <div class="wrap-input100 validate-input">
                <input id='password' class="input100" type="password" name="password" placeholder="Votre Mote de Passe">
                <span class="focus-input100"></span>
            </div>
                       
            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn">
                    SE CONNECTER
                </button>
            </div>
                    </form>
</div>
</div>
  
