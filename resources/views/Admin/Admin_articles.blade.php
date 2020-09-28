<link rel='stylesheet' href="/css/popup.css">
<link rel='stylesheet' href="/css/confirmation.css">
<link rel='stylesheet' href="/css/articles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>

@include('Components.dashboard')
@yield('dashboard')
	@if(session('success'))
		<div class="animated fadeOut success">{{session('success')}}</div>
	@endif
	<div class="text_header">Liste des Articles</div>
	<form class="contact100-form validate-form" method="post" action="{{ action('ArticleController@AjouterCategorie') }}" enctype="multipart/form-data">
			@csrf
			<table>
		<tr><td style="width:200px"><input class="input100" id="categorie" type="text" name="categorie" placeholder="Ajouter Categorie"></td>
		<td ><input type="image" src="/project_images/add.png" alt="Submit" width="30"></td></tr>
		<table>
	</form>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Titre</th>
      <th scope="col">Image</th>
      <th scope="col">Texte</th>
	  <th scope="col">Lien Video</th>
	  <th scope="col">Modifier</th>
      <th scope="col">Supprimer</th>

    </tr>
  </thead>
  <tbody>
	@foreach($artc as $a)
    <tr>
      <td>{{$a->titre}}</td>
		<td><div class="box"><a href="#popup1">Lien image</a></div>
			<div id="popup1" class="overlay">
				<div class="popup">
				<a class="close" href="#">&times;</a>
					<div class="content">
						<img class="content_image" src='{{$a->lien_image}}'>
					</div>
				</div>
			</div>
		</td>
      <td><a href="/Articles/Article/{{$a->id}}">Lien Article</a></td>
	  <td><a style="color:blue" href="//{{$a->lien_youtube}}">Lien</a></td>
	  <td><a href="/Admin/ModifierArticle/{{$a->id}}"><img src="/project_images/document.png" width="20%"></td>
	  <td><a href="/Admin/Admin_articles/{{$a->id}}"><img src="/project_images/bin.png" width="20%"></td>
	</tr>
	@endforeach
  </tbody>
</table>
    
    </div></div>
  </div>

<script>
$(document).ready(function(){
$("form").submit(function(e){
    if($("#categorie").val().length == 0){
	  e.preventDefault();
	}
});
});

</script>