<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/articles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>
<body>
@include('Components.menu')
@yield('menu')
@if(Auth::check())
<div class="container-contact100">
    <div id="form1" class="wrap-contact100">
                <form method="POST" action="{{ action('ServiceController@ajouterdiagnostic') }}" enctype="multipart/form-data">
                @csrf
                    <span class="contact100-form-title">Service Diagnostic Voiture</span>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="marque" placeholder="Marque" >
                        <span class="focus-input100"></span>
                    </div>
                        
                        <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="model" placeholder="Model" >
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="version" placeholder="Version">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <input class="input100" type="number" name="carburant" placeholder="Carburant" >
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="boite_vitesse" placeholder="Boite Vitesse" >
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="annee" placeholder="Année" >
                <span class="focus-input100"></span>
            </div>
            <div class="container-contact100-form-btn">
                <a id="nextform2" class="contact100-form-btn">
                    Suivant
</a>
            </div>
</div>
      <div id="form2" class="wrap-contact100">
                        <span class="contact100-form-title">Étape 2</span>
                        <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="dedouane" placeholder="Véhicule Dédouané" >
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="kilometrage" placeholder="Kilométrage">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="couleur" placeholder="Couleur Voiture" >
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="carrosserie" placeholder="Carrosserie" >
                <span class="focus-input100"></span>
            </div>
                
            <div class="container-contact100-form-btn">
                <a id="previousform1" class="contact100-form-btn">
                    Précédent
</a> &nbsp&nbsp&nbsp&nbsp
                <a id="nextform3" class="contact100-form-btn">
                    Suivant
</a>
            </div>
</div>
    <div id="form3" class="wrap-contact100">
                        <span class="contact100-form-title">Étape 3</span>
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" name="nbt_porte" placeholder="Nombre Portes" >
                            <span class="focus-input100"></span>
                        </div>
                        
                        <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="puissance_fiscale" placeholder="Puissance Fiscale" >
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="premiere_main" placeholder="Première Main">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="prepare" placeholder="Véhicule Préparé" >
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <label>Image Voiture</label><br><br><input class="input100" type="file" name="voiture_image"  >
                <span class="focus-input100"></span>
                        </div>
            <div class="container-contact100-form-btn">
                <a id="previousform2" class="contact100-form-btn">
                    Précédent
</a> &nbsp&nbsp&nbsp&nbsp
                <button class="contact100-form-btn">
                    Envoyer
                </button>
            </div>
                    </form>
</div>
</div>
        
<script>
    $(document).ready(function(){
        $("#form1").show();
        $("#form2").hide();
        $("#form3").hide();
        $("#nextform2").click(function(){
            $("#form1").hide();
            $("#form2").show();
        });
         $("#previousform1").click(function(){
            $("#form2").hide();
            $("#form1").show();
        });
        $("#nextform3").click(function(){
            $("#form2").hide();
            $("#form3").show();
        });
        $("#previousform2").click(function(){
            $("#form3").hide();
            $("#form2").show();
        });
       
        
    });
</script>


@endif