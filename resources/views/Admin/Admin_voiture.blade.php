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
                <th scope="col">lien</th>
                <th scope="col">+ Publicité</th>
                <th scope="col">- Publicité</th>
                <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($voiture as $v)
                    @if( date('Y-m-d')  == $v->created_at->format('Y-m-d'))
                        <tr style="background-color:#FFCB8F">
                    @else
                        <tr>
                    @endif
                        <td style="text-align:left">{{$v->created_at->format('d-m-Y')}}</td>
                        <td style="text-align:left">{{$v->user->nom}} &nbsp {{$v->user->prenom}}</td>
                        <td style="text-align:left"><a id="details" href="/Services/voiturepdf/{{$v->id}}">Détails</a></td>
                        <td style="text-align:left"><a id="details" href="/BoutiqueEocars/voitureDetails/{{$v->id}}">Visiter</a></td>
                        <td style="text-align:left">@if(!$v->voiturepub)<a href="#new{{$v->id}}"><img src="/project_images/add_ads.png" width="20%">@endif</td>
                        <div id="new{{$v->id}}" class="overlay" style="margin-left:300px">
                            <div class="popup" >
                                <a class="close_forum" href="#">&times;</a>
                                <div class="container-contact100" >
                                    <div class="wrap-forum">
                                        <h4>Ajouter Publicité</h4>
                                        @if($v->voitureimage)@foreach($v->voitureimage as $i)<center><img src="{{$i->image1}}"></center>@break @endforeach @endif
                                        <form id="pub_form{{$v->id}}" method="post" action="{{ action('AdminController@AjouterPub') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="image-upload">
                                                <label for="file-input{{$v->id}}">Ajouter Image &nbsp;&nbsp;
                                                    <img src="/project_images/plus.png" style="width:40px"/>
                                                </label>
                                                <input id="file-input{{$v->id}}" type="file" name="lien_image" accept="image/x-png,image/jpeg"/>
                                            </div>
                                            <input type="hidden" name="voiture_id" value="{{ $v->id}}">
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
                                            $( "#pub_form{{$v->id}}" ).submit(function( event ) {
                                                if($("#file-input{{$v->id}}").val().length == 0){
                                                    event.preventDefault();
                                                    alert("Veuillez ajouter une image")
                                                }
                                               
                                            });

                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <td style="text-align:left">@if($v->voiturepub)<a href="/Admin/SupprimerPub/{{$v->voiturepub->id}}"><img src="/project_images/remove_ads.png" width="20%">@endif</td>
                        <td style="text-align:left"><a href="/Admin/supprimer_voiture/{{$v->id}}"><img src="/project_images/bin.png" width="20%"></td>
                        </tr>
                @endforeach

            </tbody>
        </table>
    </div>       
