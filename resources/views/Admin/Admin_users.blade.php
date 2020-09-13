<link rel='stylesheet' href="/css/popup.css">
<link rel='stylesheet' href="/css/confirmation.css">
@include('Components.dashboard')
@yield('dashboard')
	@if(session('success'))
		<div class="animated fadeOut success">{{session('success')}}</div>
	@endif
	<div class="text_header">Liste des Utilisateurs</div>
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
    <tr>
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

