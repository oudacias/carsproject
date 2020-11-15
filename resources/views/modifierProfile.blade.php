<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/popup.css">
<link rel="stylesheet" href="/css/articles.css">
<link rel="stylesheet" href="/css/confirmation.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title>Modification du compte</title>
@include('Components.menu')
@yield('menu')
@if(session('success'))
    <div class="animated fadeOut success">{{session('success')}}</div>
@endif
<div class="container-contact100">
    <div class="wrap-contact100">
        <form class="contact100-form validate-form" method="post" action="{{ action('UserController@modifiermonProfile') }}" enctype="multipart/form-data">
                @csrf
			<span class="contact100-form-title">
				Modifier Compte
            </span>
            <label>Votre Nom</label>
            <br>
            <span class="alert" id="alert1">Veuillez Remplire ce Champ</span> 
            <div class="wrap-input100 validate-input" >
                <input class="input100" type="text" id="nom" name="nom" placeholder="{{Auth::user()->nom}}" value="{{Auth::user()->nom}}">
                <span class="focus-input100"></span>
            </div>
            <label>Votre Prénom</label>
            <br>
            <span class="alert" id="alert2">Veuillez Remplire ce Champ</span> 
            <div class="wrap-input100 validate-input" >
                <input class="input100" type="text" id="prenom" name="prenom" placeholder="{{Auth::user()->prenom}}" value="{{Auth::user()->prenom}}">
                <span class="focus-input100"></span>
            </div>
            <label>Votre Email</label>
            <br>
            <span class="alert" id="alert3">Veuillez Remplire ce Champ</span> 
            <div class="wrap-input100 validate-input" >
                <input class="input100" type="email" id="email" name="email" placeholder="{{Auth::user()->email}}" value="{{Auth::user()->email}}">
                <span class="focus-input100"></span>
            </div>
            <label>Votre téléphone</label>
            <br>
            <span class="alert" id="alert4">Veuillez Remplire ce Champ</span> 
            <div class="wrap-input100 validate-input" >
            <label style="position:absolute;top:18px">+212</label><input style="padding-left:45px" class="input100" type="number" id="tel" name="tel" placeholder="{{Auth::user()->telephone}}" value="{{Auth::user()->telephone}}">
                <span class="focus-input100"></span>
            </div>
            <label>Vous êtes : </label>
            <br>
            <div class="wrap-input100 validate-input" >
                <input class="input100" type="text" name="objectif" placeholder="{{Auth::user()->objectif}}" value="{{Auth::user()->objectif}}" readonly>
                <span class="focus-input100"></span>
            </div>
            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn">
                    <a>Modifier Compte</a>
                </button>
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
        for(var i=0; i<5; i++){
            $("#alert"+i).hide();
        }

        $("form").submit(function(e){
            if($("#nom").val().length == 0){
                $("#alert1").show();
                document.getElementById("alert1").style.color = "red";
                e.preventDefault();
            }else{
                $("#alert1").hide();
            }
            if($("#prenom").val().length == 0){
                $("#alert2").show();
                document.getElementById("alert2").style.color = "red";
                e.preventDefault();
            }else{
                $("#alert2").hide();
            }
            if($("#email").val().length == 0){
                $("#alert3").show();
                document.getElementById("alert3").style.color = "red";
                e.preventDefault();
            }else{
                $("#alert3").hide();
            }
            if($("#tel").val().length != 10){
                $("#alert4").show();
                document.getElementById("alert4").style.color = "red";
                e.preventDefault();
            }else{
                $("#alert4").hide();
            }

        });


    });

</script>