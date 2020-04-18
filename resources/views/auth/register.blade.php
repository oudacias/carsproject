<!DOCTYPE html>
<html lang="en">
<head>
    <title>Articles</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/articles.css">
</head>
<body>
@include('Components.menu')
@yield('menu')
<div class="container-contact100">
    <div class="wrap-contact100">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <span class="contact100-form-title">Ajouter Article</span>
                        <div class="wrap-input100 validate-input">
                            <input id='nom' class="input100" type="text" name="nom" placeholder="Votre Nom">
                            <span class="focus-input100"></span>
                        </div>
                        
                        <div class="wrap-input100 validate-input">
                <input id='prenom' class="input100" type="text" name="prenom" placeholder="Votre Prénom">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <input id='email' class="input100" type="text" name="email" placeholder="Votre E-mail">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <input id='telephone' class="input100" type="number" name="telephone" placeholder="Téléphone">
                <span class="focus-input100"></span>
            </div>
            <input id='role' type="text" name="role" value="utilisateur" hidden>

            <div class="wrap-input100 validate-input">
                <input id='password' class="input100" type="password" name="password" placeholder="Mot de Passe">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <input id='password-confirm' class="input100" type="password" name="password_confirmation" placeholder="Confirmer Mot de Passe">
                <span class="focus-input100"></span>
            </div>
                        
                        

                       
            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn">
                    S'ENREGISTRER
                </button>
            </div>
                    </form>
</div>
</div>
  
