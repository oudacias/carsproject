<link rel='stylesheet' href="/css/popup.css">
<link rel='stylesheet' href="/css/confirmation.css">
<link rel='stylesheet' href="/css/articles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@include('Components.dashboard')
@yield('dashboard')
	@if(session('success'))
		<div class="animated fadeOut success">{{session('success')}}</div>
	@endif
	<div class="text_header">Liste des Voitures</div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Date</th>
                <th scope="col">Client</th>
                <th scope="col">Détails</th>
                <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($voiture as $v)
                        <tr style="text-align:left">
                        <td style="text-align:left">{{$v->created_at->format('d-m-Y')}}</td>
                        <td style="text-align:left">{{$v->user->nom}} &nbsp {{$v->user->prenom}}</td>
                        <td style="text-align:left"><a id="details" href="/Services/voiturepdf/{{$v->id}}">Détails</a></td>
                        <td style="text-align:left"><a href="/Admin/supprimer_voiture/{{$v->id}}"><img src="/project_images/bin.png" width="20%"></td>
                        </tr>
                @endforeach

            </tbody>
        </table>
    </div>       
