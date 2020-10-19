<link rel='stylesheet' href="/css/popup.css">
<link rel='stylesheet' href="/css/confirmation.css">
<link rel='stylesheet' href="/css/articles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@include('Components.dashboard')
@yield('dashboard')
	@if(session('success'))
		<div class="animated fadeOut success">{{session('success')}}</div>
	@endif
	<div class="text_header">Supprimer publicité</div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nom Page</th>
                <th scope="col">Emplacement</th>
                <th scope="col">Type</th>
                <th scope="col">Supprimer</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach($pub as $p)
                <tr style="text-align:left">
                <td style="text-align:left">{{$p->nom_page}}</td>
                <td style="text-align:left">{{$p->emplacement}}</td>
                <td style="text-align:left">{{$p->type}}</td>
                <td style="text-align:left"><a href="/Publicite/supprimerPub/{{$p->id}}"><img src="/project_images/bin.png" width="10%"></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>       
