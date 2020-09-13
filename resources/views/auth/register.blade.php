<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nouveau Compte</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/articles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>

</head>
<body>
@include('Components.menu')
@yield('menu')
<div class="container-contact100">
  <div class="wrap-contact100">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <span class="contact100-form-title">Créer Nouveau Compte</span>
        <div class="wrap-input100 validate-input">
            <input id="nom" class="input100" type="text" name="nom" placeholder="Votre Nom" required>
            <span class="focus-input100"></span>
        </div>
        <div class="wrap-input100 validate-input">
          <input id='prenom' class="input100" type="text" name="prenom" placeholder="Votre Prénom" required>
          <span class="focus-input100"></span>
        </div>
        <div class="wrap-input100 validate-input">
          <input id='email' class="input100" type="email" name="email" placeholder="Votre E-mail">
          <span class="focus-input100"></span>
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong style="color:red">Cet e-mail existe déjà</strong>
              </span>
          @endif
      </div>
      <div class="wrap-input100 validate-input" data-validate="Please enter your name">
        <label for="cars">Objectif de l'insription </label><br><br><br>
        <select class="select-form" name="objectif">
          <option value="fournisseur">Fourisseur</option>
          <option value="particuler">Vendeur Particulier</option>
          <option value="standard">Standard</option>
        </select>
      </div>
      <span id="spantel" style="color:red">Veuillez entrer un numéro valide</span>
      <div class="wrap-input100 validate-input">
        <label style="position:absolute;top:22px">+212</label><input style="padding-left:45px" id='telephone' class="input100" type="number" name="telephone" placeholder="Téléphone">
        <span class="focus-input100"></span>
        </div>
        <input id='role' type="hidden" name="role" value="utilisateur" >
        
      <span id="spanpass" style="color:red">Veuillez entrer un mot de passe avec au moins 8 caractères</span>
      <div class="wrap-input100 validate-input">
          <input id="password" class="input100" type="password" name="password" placeholder="Mot de Passe">
          <span class="focus-input100"></span>
      </div>
      <span id="spanpassconfirm" style="color:red">Veuiller confirmer le mot de passe</span>
      <div class="wrap-input100 validate-input">
          <input id="password_confirmation" class="input100" type="password" name="password_confirmation" placeholder="Confirmer Mot de Passe">
          <span class="focus-input100"></span>
      </div>
      <div class="container-contact100-form-btn">
          <button id="submit" class="contact100-form-btn">
              S'ENREGISTRER
          </button>
      </div>
    </form>
  </div>
</div>
<script>
  $(document).ready(function(){
    $("#spantel").hide();
    $("#spanpass").hide();
    $("#spanpassconfirm").hide();
  
  $("form").submit(function(e){
    if($("#telephone").val().length != 10){
      e.preventDefault();
      console.log("1")
      $("#spantel").show();
    }else{
      $("#spantel").hide();
    }
    if($("#password").val().length < 8) {
      e.preventDefault();
      $("#spanpass").show();
    }else{
      $("#spanpass").hide();
    }
    if($("#password_confirmation").val() != $("#password").val()){
      e.preventDefault();
      $("#spanpassconfirm").show();
    }else{
      $("#spanpassconfirm").hide();
    }
  });
});

   
</script>
