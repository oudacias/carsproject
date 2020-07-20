<link rel='stylesheet' href="/css/popup.css">
<link rel='stylesheet' href="/css/confirmation.css">
@include('Components.dashboard')
@yield('dashboard')
	@if(session('success'))
		<div class="animated fadeOut success">{{session('success')}}</div>
	@endif
	<div class="text_header">Liste des Messages</div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Email</th>
      <th scope="col">Sujet</th>
	  <th scope="col">Message</th>
      <th scope="col">Supprimer</th>

    </tr>
  </thead>
  <tbody>
	@foreach($contact as $c)
    <tr>
      <td>{{$c->created_at->format('d-m-Y')}}</td>
      <td>{{$c->email}}</td>
      <td>{{$c->sujet}}</td>
      <td>{{$c->texte}}</td>		
	  <td><a href="/Admin/Admin_contacts/{{$c->id}}"><img src="/project_images/bin.png" width="20%"></td>
	</tr>
	@endforeach
  </tbody>
</table>
    
    </div></div>
  </div>

