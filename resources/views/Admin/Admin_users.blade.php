<link rel='stylesheet' href="/css/popup.css">
<link rel='stylesheet' href="/css/confirmation.css">
<link rel='stylesheet' href="/css/select_css.css">

@include('Components.dashboard')
@yield('dashboard')
	@if(session('success'))
		<div class="animated fadeOut success">{{session('success')}}</div>
	@endif
	<div class="text_header">Liste des Utilisateurs</div>
	<form class="contact100-form validate-form" method="post" action="{{ action('AdminController@searchUsers') }}">
	@csrf
		<div class="container">
			<div class="row">
				<div class="col-3">
					<div class="select">
						<select name="objectif" id="slct">
							<option selected disabled>Choisire Objectif</option>
								<option>fournisseur</option>
								<option>particulier</option>
								<option>Standard</option>
							</select>
					</div>
				</div>
				<div class="col-3">
					<div class="select">
						<select name="confirmer" id="slct">
							<option value="default">Confirmé ?</option>
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
					<input type="image" src="/project_images/search.png" style="width:70px">
				</div>
			</div>
		</div>
	</form>






    <table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Nom </th>
      <th scope="col">Prenom </th>
	  <th scope="col">Email </th>
	  <th scope="col">Telephone</th>
	  <th scope="col">Objectif</th>
      <th scope="col">Confirmer</th>
      <th scope="col">Supprimer</th>

    </tr>
  </thead>
  <tbody>
	@foreach($user as $u)
		@if( date('Y-m-d')  == $u->created_at->format('Y-m-d'))
			<tr style="background-color:#FFCB8F">
		@else
			<tr>
		@endif
		<td>{{$u->created_at->todatestring()}}</td>
		<td>{{$u->nom}}</td>
		<td>{{$u->prenom}}</td>
		<td>{{$u->email}}</td>
		<td>{{$u->telephone}}</td>
		<td>{{$u->objectif}}</td>
		<td>@if($u->objectif !='standard')<a href="/Admin/confirmer_users/{{$u->id}}"><img src="/project_images/confirm.png" width="20%"></a>@endif</td>
		<td><a href="/Admin/supprimer_users/{{$u->id}}"><img src="/project_images/bin.png" width="20%"></a></td>
	</tr>
	@endforeach
  </tbody>
</table>
    
    </div></div>
  </div>

