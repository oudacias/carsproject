<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
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
                        </div>
                        
                        <div class="wrap-input100 validate-input">
                <input id='prenom' class="input100" type="text" name="prenom" placeholder="Votre Prénom" required>
            </div>
            <div class="wrap-input100 validate-input">
                <input id='email' class="input100" type="email" name="email" placeholder="Votre E-mail">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong style="color:#FAB107">Cet e-mail existe déjà</strong>
                    </span>
                @endif
            </div>
            <div class="wrap-input100 validate-input">
                <input id='telephone' class="input100" type="number" name="telephone" placeholder="Téléphone" required>
                <span id="spantel" style="color:#FAB107">Veuillez entrer un numéro valide</span>

            </div>
            <input id='role' type="hidden" name="role" value="utilisateur" >

            <div class="wrap-input100 validate-input">
                <input id='password' class="input100" type="password" name="password" placeholder="Mot de Passe" required>
                <span id="spanpass" style="color:#FAB107">Veuillez entrer un mot de passe avec au moins 8 caractères</span>
            </div>
            <div class="wrap-input100 validate-input">
                <input id="password_confirmation" class="input100" type="password" name="password_confirmation" placeholder="Confirmer Mot de Passe" required>
                <span id="spanpassconfirm" style="color:#FAB107">Veuiller confirmer le mot de passe</span>
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
    (function() {
  var passwordChecker = {
    init: function() {
      this.cacheDom();
      this.bindEvents();
    },
    cacheDom: function() {
      this.$form = $("form");
      this.$inputPassword = this.$form.find("#password");
      this.$inputConfirmPassword = this.$form.find("#password_confirmation");
      this.$inputTel = this.$form.find("#telephone");
      this.$spanPassword = this.$inputPassword.next("#spanpass");
      this.$spanConfirmPassword = this.$inputConfirmPassword.next("#spanpassconfirm");
      this.$spanTel = this.$inputTel.next("#spantel");
      this.$submitButton = this.$form.find("#submit");
      this.$submitButton.prop("disabled", true);
    },
    bindEvents: function() {
      this.$inputPassword.on("keyup", this.passwordLongEnough.bind(this));
      this.$inputPassword.on("keyup", this.passwordsAreMatching.bind(this));
      this.$inputConfirmPassword.on("keyup", this.passwordLongEnough.bind(this));
      this.$inputConfirmPassword.on("keyup", this.passwordsAreMatching.bind(this));
      this.$inputTel.on("keyup", this.telLongEnough.bind(this));
    },
    passwordLongEnough: function() {
      if (this.$inputPassword.val().length < 9) {
        this.$spanPassword.show();
      } else {
        this.$spanPassword.hide();
      }
      this.submitButtonDisabled();
    },
    telLongEnough: function() {
      if (this.$inputTel.val().length < 9) {
        this.$spanTel.show();
      } else {
        this.$spanTel.hide();
      }
      this.submitButtonDisabled();
    },
    passwordsAreMatching: function() {
      if (this.$inputPassword.val() !== this.$inputConfirmPassword.val()) {
        this.$spanConfirmPassword.show();
      } else {
        this.$spanConfirmPassword.hide();
      }
      this.submitButtonDisabled();
    },
    submitButtonDisabled: function() {
      if (this.$spanPassword.is(":visible") || this.$spanConfirmPassword.is(":visible") || this.$spanTel.is(":visible")) {
        this.$submitButton.prop("disabled", true);
      } else {
        this.$submitButton.prop("disabled", false);
      }
    }

  }

  passwordChecker.init();

})();
</script>
