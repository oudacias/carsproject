<link rel='stylesheet' href="/css/popup.css">
<link rel='stylesheet' href="/css/confirmation.css">
<link rel='stylesheet' href="/css/articles.css">
@include('Components.dashboard')
@yield('dashboard')
	@if(session('success'))
		<div class="animated fadeOut success">{{session('success')}}</div>
	@endif
	<div class="text_header">Liste des Forums</div>
	<form class="contact100-form validate-form" method="post" action="{{ action('ForumController@AjouterTheme') }}" enctype="multipart/form-data">
			@csrf
			<table>
		<tr><td style="width:200px"><input class="input100" type="text" name="theme" placeholder="Ajouter Thème"></td>
		<td ><input type="image" src="/project_images/add.png" alt="Submit" width="30"></td></tr>
		<table>
	</form>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Utilisateur</th>
      <th scope="col">Titre</th>
	  <th scope="col">Sujet</th>
	  <th scope="col">Confirmer</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
		@foreach($frm as $f)
		<tr>
		<td>{{$f->created_at->todatestring()}}</td>
		<td>{{$f->user->nom}} &nbsp {{$f->user->prenom}}</td>
		<td>{{$f->sujet}}</td>
			<td> <div class="content_forum">
					<div class="box"><a href="#popup1">Contenu</a></div>
					<div id="popup1" class="overlay">
						<div class="popup_forum1">
							<a class="close" href="#">&times;</a>
								<p>{{$f->texte}}</p>
						</div>
					</div>
				</div>
			</td>
			<td><a href="/Admin/Admin_forum_confirm/{{$f->id}}"><img src="/project_images/confirm.png" width="20%"></td>
			<td><a href="/Admin/Admin_forum/{{$f->id}}"><img src="/project_images/bin.png" width="20%"></a></td>
		</tr>
		@endforeach
  </tbody>
</table> 
    </div>
	</div>
  </div>

