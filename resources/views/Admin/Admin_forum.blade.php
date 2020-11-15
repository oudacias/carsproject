<link rel='stylesheet' href="/css/popup.css">
<link rel='stylesheet' href="/css/confirmation.css">
<link rel='stylesheet' href="/css/articles.css">
<link rel='stylesheet' href="/css/select_css.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>

@include('Components.dashboard')
@yield('dashboard')
	@if(session('success'))
		<div class="animated fadeOut success">{{session('success')}}</div>
	@endif
	<div class="text_header">Liste des Forums</div>
	<form class="contact100-form validate-form" method="post" action="{{ action('AdminController@AjouterTheme') }}" enctype="multipart/form-data">
			@csrf
			<table>
		<tr><td style="width:200px"><input class="input100" id="theme" type="text" name="theme" placeholder="Ajouter Thème" required></td>
		<td ><input type="image" src="/project_images/add.png" alt="Submit" width="30"></td></tr>
		<table>
	</form>
	<form class="contact100-form validate-form" method="post" action="{{ action('AdminController@searchForum') }}">
	@csrf
	<div class="container">
  		<div class="row">
			<div class="col-3">
				<div class="select">
					<select name="theme" id="slct">
						<option selected disabled>Choisire Thème</option>
						@foreach($theme as $t)
							<option>{{$t->theme}}</option>
						@endforeach
					</select>
				</div>
    		</div>
			<div class="col-3">
				<div class="select">
					<select name="approuve" id="slct">
						<option value="default">Approuvé ?</option>
						<option value="1">Oui</option>
						<option value="0">Non</option>
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
				<input type="image" alt="submit" src="/project_images/search.png" style="width:70px">
			</div>
		</div>
	</div>
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
				<td>{{$f->texte}}</td>
				<td><a href="/Admin/Admin_forum_confirm/{{$f->id}}"><img src="/project_images/confirm.png" width="20%"></td>
				<td><a href="/Admin/Admin_forum/{{$f->id}}"><img src="/project_images/bin.png" width="20%"></a></td>
			</tr>
		@endforeach
  </tbody>
</table> 
    </div>
	</div>
  </div>

