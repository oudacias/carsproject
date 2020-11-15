
    <title>Service Conseil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/articles.css">
    <link rel='stylesheet' href="/css/confirmation.css">
    <link rel='stylesheet' href="/css/card.css">
    <link rel='stylesheet' href="/css/mainstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>

@include('Components.menu')
@yield('menu')
@if(session('success'))
    <div class="animated fadeOut success">{{session('success')}}</div>
@endif
<div class="container">
  <div class="row justify-content-around">
         <div class="col-md-12">
            <div class="card user-card">
                 <div class="user-image img-home">
                    <img src="/project_images/advice.png"></div>
                <div class="card-block">
                <div style="text-align:center">Service de Conseil</div>                   
                    <div class="card-introduction">
                        <p class="m-t-24 text-muted">ELAMDASSI ON CARS est une entreprise dédiée à l’accompagnement des acheteurs des vendeurs et des revendeurs de voitures à travers ses différents services présentés sur nos plateformes aussi bien que le suivis  terrain de nos clients pour leurs assurer toutes les conditions d’une bonne opération achat revente cette entreprise à été à l’instar d’une chaine YouTube en pleine évolutions crée en 2016 par l’équipe de EOCARS</p>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<div class="container-contact100">
    <div id="form1" class="wrap-contact100">
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
                <label style="position:absolute;top:18px">+212</label><input style="padding-left:45px" id="tel" class="input100" type="number" name="telephone">
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
                <input class="input100" type="number" id="age" name="age">
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
                <img src="/project_images/arrow_right.png" type="button" id="nextform2" width="10%" height="10%" class="img-form-change" />
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
                    <img src="/project_images/arrow_left.png" type="button" id="previousform1" width="10%" height="10%" class="img-form-change"/>
                    <img src="/project_images/arrow_right.png" type="button" id="nextform3" width="10%" height="10%" class="img-form-change">
                    </button>
                </div>
            </div>
            <div id="form3" class="wrap-contact100">
                <span class="contact100-form-title">Étape 3: Informations Finances</span>
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
                    <img src="/project_images/arrow_left.png"  type="button" id="previousform2" width="10%" height="10%" class="img-form-change"/>
                    <input type="image" src="/project_images/send.png" alt="submit" type="submit" width="10%" height="10%" class="img-form-change"/>
                </div>
            </div>
        </form>
    </div>
</div>
<div style="margin-top:100px">
@include('Components.footer')
@yield('footer')
</div>
        
<script>
    $(document).ready(function(){
        for(var i=0; i<13; i++){
            $("#alert"+i).hide();
        }
        
        $("#form1").fadeIn();
        $("#form2").fadeOut();
        $("#form3").fadeOut();
        
        
         $("#previousform1").click(function(){
            $("#form2").fadeOut();
            $("#form1").fadeIn();
        });
        
        $("#previousform2").click(function(){
            $("#form3").fadeOut();
            $("#form2").fadeIn();
        });

        $("#tel,#age").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });






        $("#nextform2").click(function(){
        if($("#nom").val().length == 0){
            $("#alert1").show();
            document.getElementById("alert1").style.color = "red";
        }else{
            $("#alert1").hide();
        }
        if($("#prenom").val().length == 0){
            $("#alert2").show();
            document.getElementById("alert2").style.color = "red";
        }else{
            $("#alert2").hide();
        }
        if($("#tel").val().length != 10 ){
            $("#alert3").show();
            document.getElementById("alert3").style.color = "red";
        }else{
            $("#alert3").hide();
        }
        if($("#ville").val().length == 0){
            $("#alert4").show();
            document.getElementById("alert4").style.color = "red";
        }else{
            $("#alert4").hide();
        }
        if($("#situation").val().length == 0){
            $("#alert5").show();
            document.getElementById("alert5").style.color = "red";
        }else{
            $("#alert5").hide();
        }
        if($("#nom").val().length > 0 && $("#prenom").val().length > 0 && $("#ville").val().length >0 && $("#tel").val().length ==10 && $("#situation").val().length > 0){
            $("#form1").hide();
            $("#form2").show();
        }
    });
    

        $("#nextform3").click(function(){
        if($("#km").val().length == 0){
            $("#alert6").show();
            document.getElementById("alert6").style.color = "red";
        }else{
            $("#alert6").hide();
        }
        if($("#route").val().length == 0){
            $("#alert7").show();
            document.getElementById("alert7").style.color = "red";
        }else{
            $("#alert7").hide();
        }
        if($("#places").val().length == 0){
            $("#alert8").show();
            document.getElementById("alert8").style.color = "red";
        }else{
            $("#alert8").hide();
        }
        if($("#bagages").val().length == 0){
            $("#alert9").show();
            document.getElementById("alert9").style.color = "red";
        }else{
            $("#alert9").hide();
        }
        if($("#usage").val().length == 0){
            $("#alert10").show();
            document.getElementById("alert10").style.color = "red";
        }else{
            $("#alert10").hide();
        }
        if($("#km").val().length > 0 && $("#route").val().length > 0 && $("#places").val().length >0 && $("#bagages").val().length > 0 && $("#usage").val().length > 0){
            $("#form2").hide();
            $("#form3").show();
        }
    });
    $("form").submit(function(e){
        if($("#budget").val().length == 0){
            $("#alert11").show();
            document.getElementById("alert11").style.color = "red";
            e.preventDefault();
        }else{
            $("#alert11").hide();
        }
        if($("#financement").val().length == 0){
            $("#alert12").show();
            document.getElementById("alert12").style.color = "red";
            e.preventDefault();
        }else{
            $("#alert12").hide();
        } 
    });
        
        
    });
</script>


