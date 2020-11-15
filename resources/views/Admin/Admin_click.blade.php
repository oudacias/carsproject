<link rel='stylesheet' href="/css/popup.css">
<link rel='stylesheet' href="/css/confirmation.css">
<link rel='stylesheet' href="/css/articles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@include('Components.dashboard')
@yield('dashboard')
	@if(session('success'))
		<div class="animated fadeOut success">{{session('success')}}</div>
	@endif
	<div class="text_header">Nombre de click</div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Lien Voiture</th>
                <th scope="col">Description</th>
                <th scope="col">Nombre de click</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach($voiture as $v)
                @if( date('Y-m-d')  == $v->created_at->format('Y-m-d'))
                    <tr style="background-color:#FFCB8F">
                @else
                    <tr>
                @endif
                <td style="text-align:left"><a href="/Boutique/voitureDetails/{{$v->id}}">Lien</td>
                <td style="text-align:left"><a id="details" href="/Services/voiturepdf/{{$v->id}}">Détails</a></td>
                <td style="text-align:left">@if($v->voitureclick){{$v->voitureclick->click_nbr}}@else 0 @endif</a></td>
                
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>       
