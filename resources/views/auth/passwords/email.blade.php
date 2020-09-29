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
   
        <form method="POST" action="{{ route('password.email') }}">
        @csrf
            <span class="contact100-form-title">Confirmer Email</span>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    <span>Un email est envoyé à cette adresse</span>
                </div>
            @endif
            <div class="wrap-input100 validate-input">
                <input id='email' class="input100" type="text" name="email" placeholder="Votre Email">
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
  
