<link rel='stylesheet' href="/css/popup.css">
<link rel='stylesheet' href="/css/confirmation.css">
<link rel='stylesheet' href="/css/articles.css">
<link rel='stylesheet' href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/carousel.css">
<link rel="stylesheet" href="/css/carousel.css">



@include('Components.dashboard')
@yield('dashboard')
	@if(session('success'))
		<div class="animated fadeOut success">{{session('success')}}</div>
	@endif
<div class="text_header">Ajouter Votre Publicité</div>
<form class="contact100-form validate-form" method="post" action="{{ action('PubliciteController@ajouterPublicite') }}" enctype="multipart/form-data">
    @csrf
<div class="wrap-contact100">
    <h7>Sélectionnez la page</h7>
    <div class="wrap-input100">
        <select name="nom_page" id="preview" onchange="preview_page()" class="input100">
            <option value="0">-----</option>
            <option value="/">Accueil</option>
            <option value="/Articles/Articles">Magazine</option>
            <option value="/Forum/Forums/">Forum</option>
        </select>
    </div>
</div>
<div id="preview_section" class="wrap-contact100" style="zoom: 0.4;width:2000px;height:700px;margin-top:50px">
    <div id="preview_page"></div>
</div>
<br>
<div class="wrap-contact100">
    <h7>Sélectionnez type de publicité</h7>
    <div class="wrap-input100">
        <select id="type_pub" onchange="check_type()" name="type_pub" class="input100">
            <option>Image</option>
            <option>Youtube</option>
            <option>Javascript</option>
        </select>
    </div>
</div>
<br>
<div class="wrap-contact100">
    <h7>Sélectionnez l'emplacement</h7>
    <div class="wrap-input100">
        <select id="emplacement_pub" name="emplacement" class="input100">
            <option>Haut</option>
            <option>Gauche</option>
            <option>Droite</option>
            <option>Milieu</option>
        </select>
    </div>
</div>

<div id="lien_media" style="margin-top:20px" class="wrap-contact100">
    <h7>Importez Média</h7>
    <div class="image-upload">
        <label for="file-input">
            <img src="/project_images/cloud.png"/>
        </label>
        <input id="file-input" type="file" name="lien_media"/>
    </div>
</div>
<div id="lien_youtube_section" style="margin-top:20px" class="wrap-contact100">
    <h7>Entrer lien Youtube</h7>
    <div class="wrap-input100">
        <input  id="lien_youtube" style="background-color:#F5F5F5;border-radius:20px" class="input100" type="text" name="lien_pub_youtube">
    </div>
</div>
<div id="lien_js" style="margin-top:20px" class="wrap-contact100">
    <h7>Entrez Script</h7>
    <textarea id="script" style="height:180px;width:500px;margin-top:20px;border:1px solid grey;padding:20px" name="script" placeholder="Script JS"></textarea>
</div>
<br>
<div id="lien_pub_section" class="wrap-contact100">
    <h7>Lien de la publicité</h7>
    <div class="wrap-input100">
        <input  id="lien_pub" style="background-color:#F5F5F5;border-radius:20px" class="input100" type="text" name="lien_pub">
    </div>
</div>
<br>
<div class="wrap-contact100" style="background-color:#FFF9F3">
    <button class="contact100-form-btn">
        Ajouter Publicité
    </button>
</div>
</form>

<script>
$("#preview_section").hide();
$("#lien_js").hide();
$("#lien_youtube_section").hide();

function preview_page(){
    if($("#preview").val() != "0"){
        $( "#preview_page" ).load($("#preview").val() +" #container" +", #containers");
        $("#preview_section").show();
    }else{
        $("#preview_section").hide();
    }
}
function check_type(){
    if($("#type_pub").val() == "Javascript"){
        $("#lien_js").show();
        $("#lien_media").hide();
        $("#lien_youtube_section").hide();
        $("#lien_pub_section").hide();
        $('#emplacement_pub').empty();
        $('#emplacement_pub').append(`<option>Haut</option>`);
        $('#emplacement_pub').append(`<option>Gauche</option>`);
        $('#emplacement_pub').append(`<option>Droite</option>`);
    }
    if($("#type_pub").val() == "Image"){
        $("#lien_js").hide();
        $("#lien_youtube_section").hide();
        $("#lien_media").show()
        $("#lien_pub_section").show()
        $('#emplacement_pub').empty();
        $('#emplacement_pub').append(`<option>Haut</option>`);
        $('#emplacement_pub').append(`<option>Gauche</option>`);
        $('#emplacement_pub').append(`<option>Droite</option>`);
        $('#emplacement_pub').append(`<option>Milieu</option>`);
    }
    if($("#type_pub").val() == "Youtube"){
        $("#lien_js").hide();
        $("#lien_youtube_section").show();
        $("#lien_media").hide()
        $("#lien_pub_section").hide()
        $('#emplacement_pub').empty();
        $('#emplacement_pub').append(`<option>Haut</option>`);
        
    }
}
$("form").submit(function(e){
    if($("#preview").val() == "0"){
        e.preventDefault();
        alert("Veuillez choisire une page");
    }
    if($("#type_pub").val() == "Javascript" && $("#script").val().length == 0){
        e.preventDefault();
        alert("Veuillez entrer le script");
    }
    if($("#type_pub").val() == "Image" && $("#file-input").val().length == 0){
        e.preventDefault();
        alert("Veuillez importer Image");
    }
    if($("#type_pub").val() == "Image" && $("#lien_pub").val().length == 0){
        e.preventDefault();
        alert("Veuillez entrer lien de publicité");
    }
    if($("#type_pub").val() == "Youtube" && $("#lien_youtube").val().length == 0){
        e.preventDefault();
        alert("Veuillez entrer lien Youtube");
    }
});
</script>
 