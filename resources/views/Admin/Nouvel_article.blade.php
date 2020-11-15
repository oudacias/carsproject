<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" 
      type="image/png" 
      href="/project_images/landscape.png" />
    <title>Articles</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/articles.css">
</head>
<body>
@include('Components.dashboard')
@yield('dashboard')
@if(session('success'))
		<div class="animated fadeOut success">{{session('success')}}</div>
	@endif
<div class="container-contact100">
    <div class="wrap-contact100">
        <form class="contact100-form validate-form" method="post" action="{{ action('AdminController@insererArticle') }}" enctype="multipart/form-data">
                @csrf
			<h4>
				Ajouter Article
            </h4>
            <div class="wrap-input100 validate-input">
                <input class="input100" id="first" type="text" name="titre" placeholder="Titre" required>
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <input class="input100" id="second" type="text" name="slug" placeholder="Slug">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" >
                <textarea class="input100" name="texte" placeholder="Rédiger Article" required></textarea>
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="lien_youtube" placeholder="Lien Youtube">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input">
            <label for="cars">Categorie de l'article : </label>
                <select class="select-form" name="categorie">
                    @foreach($categorie as $c)
                        <option value="{{$c->categorie}}">{{$c->categorie}}</option>
                    @endforeach
                </select>
            </div>
            <div class="image-upload">
                <label for="file-input">
                    <img src="/project_images/landscape.png"/>
                </label>
                <input id="file-input" type="file" onchange="check_img()" name="lien_image" accept="image/x-png,image/jpeg">&nbsp;&nbsp;
                <img src="/project_images/cancel.png" id="img_check" style="width:30px"/>

            </div>
            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn">
                    Ajouter Article
                </button>
            </div>
        </form>
    </div>
</div>
</body>
<script>
$("input#first").keyup(function(e){
  var val = $(this).val();
  val = val.replace(/[^\w]+/g, "-").toLowerCase();
  $("input#second").val(val);
});

$("form").submit(function(e){
    if($("#file-input").val().length==0){
        e.preventDefault();
        alert("Veuillez insérer une image");
    }
});

function check_img(){
    if($("#file-input").val().length > 0){
        $("#img_check").attr("src","/project_images/checked.png");
    }
    if($("#file-input").val().length == 0){
        $("#img_check").attr("src","/project_images/cancel.png");
    }
}

</script>

</html>
