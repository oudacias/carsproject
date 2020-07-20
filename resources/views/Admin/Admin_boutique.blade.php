<link rel='stylesheet' href="/css/popup.css">
<link rel='stylesheet' href="/css/confirmation.css">
<link rel='stylesheet' href="/css/articles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@include('Components.dashboard')
@yield('dashboard')
	@if(session('success'))
		<div class="animated fadeOut success">{{session('success')}}</div>
	@endif
	<div class="text_header">Liste des Boutiques Professionnels</div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Date</th>
                <th scope="col">Boutique</th>
                <th scope="col">Description</th>
                <th scope="col">Client</th>
                <th scope="col">Email</th>
                <th scope="col">Telephone</th>
                <th scope="col">Confirmer</th>
                <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($boutique as $b)
                <tr style="text-align:left">
                <td style="text-align:left">{{$b->created_at->format('d-m-Y')}}</td>
                <td style="text-align:left">{{$b->nom_boutique}}</td>
                <td style="text-align:left">{{$b->description_boutique}}</td>
                <td style="text-align:left">{{$b->user->nom}} &nbsp {{$b->user->prenom}}</td>
                <td style="text-align:left">{{$b->user->email}}</td>
                <td style="text-align:left">{{$b->user->telephone}} </td>

                <td style="text-align:left"><a href="/Admin/confirmer_boutique/{{$b->id}}"><img src="/project_images/confirm.png" width="20%"></td>
                <td style="text-align:left"><a href="/Admin/supprimer_supprimer/{{$b->id}}"><img src="/project_images/bin.png" width="20%"></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>       
