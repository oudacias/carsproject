<link rel='stylesheet' href="/css/popup.css">
<link rel='stylesheet' href="/css/confirmation.css">
<link rel='stylesheet' href="/css/articles.css">
<link rel='stylesheet' href="/css/select_css.css">
<link rel='stylesheet' href="/css/card.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>

@include('Components.dashboard')
@yield('dashboard')
	@if(session('success'))
		<div class="animated fadeOut success">{{session('success')}}</div>
	@endif
	<div class="text_header">Liste des Articles</div>
	<form class="contact100-form validate-form" method="post" action="{{ action('AdminController@AjouterCategorie') }}" enctype="multipart/form-data">
			@csrf
			<table>
		<tr><td style="width:200px"><input class="input100" id="categorie" type="text" name="categorie" placeholder="Ajouter Categorie" required></td>
		<td ><input type="image" src="/project_images/add.png" alt="Submit" width="30"></td></tr>
		<table>
	</form>
	
	



	<form class="contact100-form validate-form" method="post" action="{{ action('AdminController@searchArticle') }}">
	@csrf
	<div class="container">
  		<div class="row">
    		<div class="col-3">
				<div class="select">
					<select name="titre" id="slct">
						<option selected disabled>Choisire Titre</option>
						@foreach($articles->sortBy('titre') as $a)
							<option>{{$a->titre}}</option>
						@endforeach
					</select>
				</div>
    		</div>
			<div class="col-3">
			<div class="select">
				<select name="categorie" id="slct">
					<option selected disabled>Choisire Catégorie</option>
					@foreach($categorie as $c)
						<option>{{$c->categorie}}</option>
					@endforeach
				</select>
			</div>
    		</div>
    		<div class="col-3">
				<div class="select">
					<select name="date" id="slct">
						<option value="0">Choisire Date</option>
						@foreach($dates as $a)
							<option>{{$a}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-3">
				<input type="image" src="/project_images/search.png" style="width:70px">
			</div>
		</div>
	</div>
</form>









    <table class="table">
  <thead>
    <tr>
      <th scope="col">Titre</th>
      <th scope="col">Lien</th>
      <th scope="col">+ Publicité</th>
      <th scope="col">- Publicité</th>
	  <th scope="col">Modifier</th>
      <th scope="col">Supprimer</th>

    </tr>
  </thead>
  <tbody>
	@foreach($artc as $a)
	@if( date('Y-m-d')  == $a->created_at->format('Y-m-d'))
	<tr style="background-color:#FFCB8F">
	@else
	<tr>
	@endif
      <td style="text-align: left">{{$a->titre}}</td>
      <td style="text-align: left"><a href="/MagazineEocars/{{$a->id}}/{{$a->slug}}">Lien Article</a></td>
      <td style="text-align: left">@if(!$a->articlepub->count())<a href="#new{{$a->id}}" onclick="previewArticle{{$a->id}}()"><img src="/project_images/add_ads.png" width="15%"></a>@endif</td>
	  <div id="new{{$a->id}}" class="overlay" style="margin-left:300px">
		<div class="popup" >
			<a class="close_forum" href="#">&times;</a>
			<div class="container-contact100" >
				<div class="wrap-forum">
					<h4>Ajouter Publicité </h4>
					<div id="preview_section" class="wrap-contact100" style="zoom: 0.1;width:2000px;height:1200px;margin-left:1350px;margin-bottom:70px">
						<div id="preview_page{{$a->id}}"></div>
					</div>
					<script>
					function previewArticle{{$a->id}}(){
						$( "#preview_page{{$a->id}}" ).load("/Articles/Article/{{$a->id}}",+" #container");
					}
					</script>
					<form id="pub_form{{$a->id}}" method="post" action="{{ action('AdminController@AjouterPubArticle') }}" enctype="multipart/form-data">
						@csrf
						<div class="image-upload">
							<label for="file-input{{$a->id}}">Ajouter Image &nbsp;&nbsp;
								<img src="/project_images/plus.png" style="width:40px"/>
							</label>
							<input id="file-input{{$a->id}}" type="file" name="lien_image"/>
						</div>
						<input type="hidden" name="article_id" value="{{ $a->id}}">
						<div class="wrap-input100">
							<input class="input100" type="text" name="lien" placeholder="Lien Publicité" required>
							<span class="focus-input100"></span>
						</div>
						<div class="container-contact100-form-btn">
							<button class="contact100-form-btn">
								Ajouter
							</button>
						</div>
					</form>
					<script>
						$( "#pub_form{{$a->id}}" ).submit(function( event ) {
							if($("#file-input{{$a->id}}").val().length == 0){
								console.log("hello")
								event.preventDefault();
								alert("Veuillez ajouter une image")
							}
							
						});

					</script>
				</div>
			</div>
		</div>
		</div>
      <td style="text-align: left">@if($a->articlepub->count())<a href=""><img src="/project_images/remove_ads.png" width="15%"></a>@endif</td>
	  <td style="text-align: left"><a href="/Admin/ModifierArticle/{{$a->id}}"><img src="/project_images/document.png" width="15%"></td>
	  <td style="text-align: left"><a href="/Admin/Admin_articles/{{$a->id}}"><img src="/project_images/bin.png" width="15%"></td>
	</tr>
	@endforeach
  </tbody>
</table>
    
    </div></div>
  </div>