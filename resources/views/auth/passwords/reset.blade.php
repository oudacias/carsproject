<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/articles.css">
</head>
<body>
@include('Components.menu')
@yield('menu')
<div class="container-contact100">
    <div class="wrap-contact100">
        <form method="POST" action="{{ route('password.update') }}">
        @csrf
            <span class="contact100-form-title">Changer Mot de Passe</span>
            <input type="hidden" name="token" value="{{ $token }}">
            <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" hidden>
            <div class="col-md-6">
            <div class="wrap-input100 validate-input">
                <input id='password' class="input100" type="password" name="password" placeholder="Votre Nouveau Mot de Passe">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <input id='password-confirm' class="input100" type="password" name="password_confirmation" placeholder="Confirmer Nouveau Mot de Passe">
                <span class="focus-input100"></span>
            </div>
               
            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn">
                    Envoyer
                </button>
            </div>
        </form>
    </div>
</div>
  
