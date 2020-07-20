<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/articles.css">
    <link rel='stylesheet' href="/css/confirmation.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>
<body>
@include('Components.menu')
@yield('menu')
<div class="container-contact100">
    <div id="form1" class="wrap-contact100">
    @if(session('success'))
		        <div class="animated fadeOut success">{{session('success')}}</div>
	        @endif
        <form method="POST" action="{{ action('ServiceController@ajoutersuivi') }}" enctype="multipart/form-data">
        @csrf
            <span class="contact100-form-title">Étape 1: Informations Personnelles</span>
            <label>Votre Nom</label>
            <br>
            <span class="alert" id="alert1">Veuillez Remplire ce Champ</span>  
            <div class="wrap-input100 validate-input">
                <input id="nom" class="input100" type="text" name="nom">
                <span class="focus-input100"></span>
            </div>

            <label>Votre Prénom</label> 
            <br>
            <span class="alert" id="alert2">Veuillez Remplire ce Champ</span>   
            <div class="wrap-input100 validate-input">
                <input id="prenom" class="input100" type="text" name="prenom">
                <span class="focus-input100"></span>
            </div>
            <label>Votre Téléphone</label>
            <br>
            <span class="alert" id="alert3">Veuillez Remplire ce Champ</span>    
            <div class="wrap-input100 validate-input">
                <input id="tel" class="input100" type="number" name="telephone">
                <span class="focus-input100"></span>
            </div>
            <label>Votre Ville</label> 
            <br>
            <span class="alert" id="alert4">Veuillez Remplire ce Champ</span>   
            <div class="wrap-input100 validate-input">
                <input id="ville" class="input100" type="text" name="ville" >
                <span class="focus-input100"></span>
            </div>
            <label>Votre Age</label>   
            <div class="wrap-input100 validate-input">
                <input class="input100" type="number" name="age">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100">
                <select class="input100" name="sexe">
                    <option>Homme</option>
                    <option>Femme</option>
                </select>
            </div>
            <label>Votre Situation Familiale</label>
            <br>
            <span class="alert" id="alert5">Veuillez Remplire ce Champ</span>    
                <div class="wrap-input100 validate-input">
                <input id="situation" class="input100" type="text" name="situation_familiale">
            <span class="focus-input100"></span>
            </div>
            <div class="container-contact100-form-btn">
                <button type="button" id="nextform2" class="contact100-form-btn" >
                    Suivant
                </button>
            </div>
            </div>
            <div id="form2" class="wrap-contact100">
                <span class="contact100-form-title">Étape 2: Informations de Voitures</span>
                <label>Combien de km parcourez-vous par an ?</label>   
                <br>
                <span class="alert" id="alert6">Veuillez Remplire ce Champ</span> 
                <div class="wrap-input100 validate-input">
                    <input id="km" class="input100" type="text" name="km_parcouru">
                    <span class="focus-input100"></span>
                </div>
                <label>Sur quel type de route circulez-vous le plus ? </label>   
                <br>
                <span class="alert" id="alert7">Veuillez Remplire ce Champ</span> 
                <div class="wrap-input100 validate-input">
                    <input id="route" class="input100" type="text" name="type_route" placeholder="ville, voies rapides/autoroutes, chemins de campagne, montagne…">
                    <span class="focus-input100"></span>
                </div>
                <label>De combien de places avez-vous besoin ? </label>   
                <br>
                <span class="alert" id="alert8">Veuillez Remplire ce Champ</span> 
                <div class="wrap-input100 validate-input">
                    <input id="places" class="input100" type="text" name="places" placeholder="projet d'enfants, famille recomposée…" >
                    <span class="focus-input100"></span>
                </div>
                <label>Avez-vous besoin d'espace pour transporter des bagages ou du matériel ?</label>   
                <br>
                <span class="alert" id="alert9">Veuillez Remplire ce Champ</span> 
                <div class="wrap-input100 validate-input">
                    <input id="bagages" class="input100" type="text" name="bagages">
                    <span class="focus-input100"></span>
                </div>
                <label>Conduisez-vous pour un usage personnel ou professionnel (voiture commerciale) ?</label>   
                <br>
                <span class="alert" id="alert10">Veuillez Remplire ce Champ</span> 
                <div class="wrap-input100 validate-input">
                    <input id="usage" class="input100" type="text" name="type_usage">
                    <span class="focus-input100"></span>
                </div>
                <label>Quel carburant préférez-vous ?</label>   
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="type_carburant">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-contact100-form-btn">
                    <button type="button" id="previousform1" class="contact100-form-btn">
                        Précédent
                    </button> &nbsp&nbsp&nbsp&nbsp
                    <button type="button" id="nextform3" class="contact100-form-btn">
                        Suivant
                    </button>
                </div>
            </div>
            <div id="form3" class="wrap-contact100">
                <span class="contact100-form-title">Étape 1: Informations Finances</span>
                <label>Quel est votre budget total, assurance auto comprise ? </label>
                <br>
                <span class="alert" id="alert11">Veuillez Remplire ce Champ</span> 
                <div class="wrap-input100 validate-input">
                    <input id="budget" class="input100" type="text" name="budget">
                    <span class="focus-input100"></span>
                </div>
                <label>Comment vous compter financer votre voiture ? </label>
                <br>
                <span class="alert" id="alert12">Veuillez Remplire ce Champ</span> 
                <div class="wrap-input100 validate-input">
                    <input id="financement" class="input100" type="text" name="type_financement" placeholder="crédit, cash, les deux, pourcentage…" >
                    <span class="focus-input100"></span>
                </div>
                <label>Est ce que vous avez déjà une idée sur les crédits auto sur le marché ?</label>
                <div class="wrap-input100">
                    <select class="input100" name="idee_crédit">
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                    </select>
                </div>
                <label>Quel type de voiture préférez-vous ?</label>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="voiture_preference" placeholder="Citadine, berline, 4*4…" >
                    <span class="focus-input100"></span>
                </div>
                <label>Pourquoi</label>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="pourquoi_voiture_preference">
                    <span class="focus-input100"></span>
                </div>
                <label>Vous préférez une voiture neuve ou occasion ?  </label>
                <div class="wrap-input100 validate-input">
                    <select class="input100" name="type_voiture">
                        <option value="neuve">Neuve</option>
                        <option value="occasion">Oddcasion</option>
                    </select>
                </div>
                <label>Pourquoi</label>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="pourquoi_type_voiture">
                    <span class="focus-input100"></span>
                </div>
                <div class="container-contact100-form-btn">
                    <button type="button" id="previousform2" class="contact100-form-btn">
                        Précédent
                    </button> &nbsp&nbsp&nbsp&nbsp
                    <button id="submit" class="contact100-form-btn">
                        Envoyer
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
        
<script>
    $(document).ready(function(){
        $("#form1").fadeIn();
        $("#form2").fadeOut();
        $("#form3").fadeOut();
        $("#nextform2").prop("disabled", true);

        
        $("#nextform2").click(function(){
            $("#form1").fadeOut();
            $("#form2").fadeIn();
            $("#nextform3").prop("disabled", true)
        });
         $("#previousform1").click(function(){
            $("#form2").fadeOut();
            $("#form1").fadeIn();
            $("#nextform2").prop("disabled", true)
        });
        $("#nextform3").click(function(){
            $("#form2").fadeOut();
            $("#form3").fadeIn();
            $("#submit").prop("disabled", true)

        });
        $("#previousform2").click(function(){
            $("#form3").fadeOut();
            $("#form2").fadeIn();
            $("#nextform3").prop("disabled", true)

        });

    });
    (function() {
        var fieldsChecker = {
            init: function() {
            this.cacheDom();
            this.bindEvents();
            },
            cacheDom: function() {
            this.$form = $("form");
            this.$inputNom = $("#nom");
            this.$inputPrenom = $("#prenom");
            this.$inputTel = $("#tel");
            this.$inputVille = $("#ville");
            this.$inputSituation = $("#situation");
            this.$inputKm = $("#km");
            this.$inputRoute = $("#route");
            this.$inputPlaces = $("#places");
            this.$inputBagages = $("#bagages");
            this.$inputUsage = $("#usage");
            this.$inputBudget = $("#budget");
            this.$inputFinancement = $("#financement");



            this.$spanNom = $("#alert1");
            this.$spanPrenom = $("#alert2");
            this.$spanTel = $("#alert3");
            this.$spanVille = $("#alert4");
            this.$spanSituation = $("#alert5");
            this.$spanKm = $("#alert6");
            this.$spanRoute = $("#alert7");
            this.$spanPlaces = $("#alert8");
            this.$spanBagages = $("#alert9");
            this.$spanUsage = $("#alert10");
            this.$spanBudget = $("#alert11");
            this.$spanFinancement = $("#alert12");
            

            this.$submitButton1 = $("#nextform2");
            this.$submitButton3 = $("#nextform3");
            this.$submitButton5 = $("#submit");

            

            },
            bindEvents: function() {
            this.$inputNom.on("keyup", this.nomLongEnough.bind(this));
            this.$inputPrenom.on("keyup", this.prenomLongEnough.bind(this));
            this.$inputTel.on("keyup", this.telLongEnough.bind(this));
            this.$inputVille.on("keyup", this.villeLongEnough.bind(this));
            this.$inputSituation.on("keyup", this.situationLongEnough.bind(this));
            this.$inputKm.on("keyup", this.kmLongEnough.bind(this));
            this.$inputRoute.on("keyup", this.routeLongEnough.bind(this));
            this.$inputPlaces.on("keyup", this.placesLongEnough.bind(this));
            this.$inputBagages.on("keyup", this.bagagesLongEnough.bind(this));
            this.$inputUsage.on("keyup", this.usageLongEnough.bind(this));
            this.$inputBudget.on("keyup", this.budgetLongEnough.bind(this));
            this.$inputFinancement.on("keyup", this.financementLongEnough.bind(this));
            },
            nomLongEnough: function() {
            if (this.$inputNom.val().length == 0) {

                this.$spanNom.show();
            } else {
                this.$spanNom.hide();
            }
            this.submitButton1Disabled();
            },
            prenomLongEnough: function() {
            if (this.$inputPrenom.val().length == 0) {
                this.$spanPrenom.show();
            } else {
                this.$spanPrenom.hide();
            }
            this.submitButton1Disabled();
            },
            telLongEnough: function() {
            if (this.$inputTel.val().length == 0) {
                this.$spanTel.show();
            } else {
                this.$spanTel.hide();
            }
            this.submitButton1Disabled();
            },
            villeLongEnough: function() {
            if (this.$inputVille.val().length == 0) {
                this.$spanVille.show();
            } else {
                this.$spanVille.hide();
            }
            this.submitButton1Disabled();
            },
            situationLongEnough: function() {
            if (this.$inputSituation.val().length == 0) {
                this.$spanSituation.show();
            } else {
                this.$spanSituation.hide();
            }
            this.submitButton1Disabled();
            },
            kmLongEnough: function() {
            if (this.$inputKm.val().length == 0) {
                this.$spanKm.show();
            } else {
                this.$spanKm.hide();
            }
            this.submitButton2Disabled();
            },
            routeLongEnough: function() {
            if (this.$inputRoute.val().length == 0) {
                this.$spanRoute.show();
            } else {
                this.$spanRoute.hide();
            }
            this.submitButton2Disabled();
            },
            placesLongEnough: function() {
            if (this.$inputPlaces.val().length == 0) {
                this.$spanPlaces.show();
            } else {
                this.$spanPlaces.hide();
            }
            this.submitButton2Disabled();
            },
            bagagesLongEnough: function() {
            if (this.$inputBagages.val().length == 0) {
                this.$spanBagages.show();
            } else {
                this.$spanBagages.hide();
            }
            this.submitButton2Disabled();
            },
            usageLongEnough: function() {
            if (this.$inputUsage.val().length == 0) {
                this.$spanUsage.show();
            } else {
                this.$spanUsage.hide();
            }
            this.submitButton2Disabled();
            },
            budgetLongEnough: function() {
            if (this.$inputBudget.val().length == 0) {
                this.$spanBudget.show();
            } else {
                this.$spanBudget.hide();

            }
            this.submitButton3Disabled();
            },
            financementLongEnough: function() {
            if (this.$inputFinancement.val().length == 0) {
                this.$spanFinancement.show();
            } else {
                this.$spanFinancement.hide();
            }
            this.submitButton3Disabled();
            },
            submitButton1Disabled: function() {
            if (this.$spanNom.is(":visible") || this.$spanPrenom.is(":visible") || this.$spanTel.is(":visible") || this.$spanVille.is(":visible") || this.$spanSituation.is(":visible")) {
                this.$submitButton1.prop("disabled", true);
            } else {
                this.$submitButton1.prop("disabled", false);
            }
            },
            submitButton2Disabled: function() {
            if (this.$spanKm.is(":visible") || this.$spanRoute.is(":visible") || this.$spanPlaces.is(":visible") || this.$spanBagages.is(":visible") || this.$spanUsage.is(":visible")) {
                this.$submitButton3.prop("disabled", true);
            } else {
                this.$submitButton3.prop("disabled", false);
            }
            },
            submitButton3Disabled: function() {
            if (this.$spanBudget.is(":visible") || this.$spanFinancement.is(":visible") ) {
                this.$submitButton5.prop("disabled", true);
            } else {
                this.$submitButton5.prop("disabled", false);
            }
            }

        }

        fieldsChecker.init();
    })();
</script>


