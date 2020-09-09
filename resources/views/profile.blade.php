<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/popup.css">
<link rel="stylesheet" href="/css/articles.css">
<link rel="stylesheet" href="/css/confirmation.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title>{{$user->nom}}</title>

@include('Components.menu')
@yield('menu')
@if(session('success'))
		<div class="animated fadeOut success">{{session('success')}}</div>
@endif
<div class="container">
    <div class="row justify-content-around">
        <div class="col-md-4">        
            <div class="card user-card"  style="background-color:#FFF4DA">
                <div  class="user-image img-home">
                    <img class="img-profile" src="{{$user->Userimage->image_path}}"></div>
                    <form id="profile_form" method="post" action="{{ action('UserController@modifierProfile') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="image-upload">
                        <label class="change-profile" for="file-inputs">Changer
                        </label>
                        <input id="file-inputs" type="file" name="image" accept="image/x-png,image/jpeg"/>
                        <input type="submit">
                    </div>
                    </form>
                        <div class="card-block">
                            <div class="container">
                                <div class="row justify-content-around">
                                    <div class="col-md-12">        
                                        <div style="background-color:white" class="card user-card">
                                            <div class="card-block">
                                                <div class="card-car-text">Voitures Vendues</div>
                                                <div class="card-car-number">{{$user->achatvoiture->count()}}</div>
                   
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div style="background-color:white" class="card user-card">
                                            <div class="card-block">
                                                <div class="card-car-text">Nombre Boutique</div>
                                                    <div class="card-car-number">{{$user->boutique->count()}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div style="background-color:white" class="card user-card">
                                            <div class="card-block">
                                                <div class="card-car-text">Nombre Forum @if($user->forum->count())<a href="/User/myForums"><img src="/project_images/view1.png" width="20px"></a>@endif</div>
                                                    <div class="card-car-number">{{$user->forum->count()}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div style="background-color:white" class="card user-card">
                                            <div class="card-block">
                                                <div class="card-car-text">Nombre Commentaire @if($user->forums->count())<a href="/User/myComments"><img src="/project_images/view1.png" width="20px"></a>@endif</div>
                                                    <div class="card-car-number">{{$user->forums->count()}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div style="background-color:white" class="card user-card">
                                            <div class="card-block">
                                                <div class="card-car-text">Articles Sauvegardés @if($user->articles->count())<a href="/User/myArticles"><img src="/project_images/view1.png" width="20px"></a>@endif</div>
                                                    <div class="card-car-number">{{$user->articles->count()}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                    
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card user-card">
                        <div class="card-block">
                            <div style="text-align:center">Vos Boutiques</div>   
                            @foreach($user->boutique as $u)
                                <div class="boutique-card">{{$u->nom_boutique}}
                                    <div class="arrow-down" id="arrow{{$u->id}}"></div>
                                </div>
                                    @if($u->voiture->count())
                                    <table class="table" id="table{{$u->id}}">
                                        <thead>
                                            <tr>
                                            <th scope="col">Marque</th>
                                            <th scope="col">Model</th>
                                            <th scope="col">Version</th>
                                            <th scope="col">Année</th>
                                            <th scope="col">Confirmé</th>
                                            <th scope="col">Acheté</th>
                                            <th scope="col">Annuler</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($u->voiture as $v)
                                            <tr>
                                                <td>{{$v->marque}}</td>
                                                <td>{{$v->model}}</td>
                                                <td>{{$v->version}}</td>
                                                <td>{{$v->annee}}</td>
                                                @if($v->confirme)
                                                    <td>Oui</td>
                                                @else
                                                    <td>Non</td>
                                                @endif
                                                @if($v->achatvoiture)
                                                    <td>Oui</td>
                                                @else
                                                    <td>Non</td>
                                                    <td><a href="/Voiture/remove/{{$v->id}}"><img src="/project_images/removeCar.png" width="20%"></a></td>

                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <script>
                                        $(document).ready(function(){
                                            var open = true;
                                            $("#table{{$u->id}}").hide();
                                            $("#arrow{{$u->id}}").click(function(){
                                                if(open){
                                                    $("#table{{$u->id}}").fadeIn();
                                                    open = false;
                                                }else{
                                                    $("#table{{$u->id}}").fadeOut(1);
                                                    open = true;
                                                }                                        
                                            });
                                        });
                                    </script>
                                    @endif
                            @endforeach                
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    
    <br>
    <br>
    <div class="container">
    <div class="row">
        <div class="col-12"><label>Créer votre nouvelle boutique</label>
            <a href="/boutique/nouvelle_boutique" id="nouvelle_voiture"><img src="/project_images/plus.png" width="40px" /></a>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <label>Commencez à vendre des voitures </label>
                @if($user->boutique->count())
                <a href="/boutique/voiture" id="nouvelle_voiture"><img src="/project_images/plus.png" width="40px" /></a>
                @else
                    <a  href="#new" id="nouvelle_voiture"><img src="/project_images/plus.png" width="40px" /></a>
                    <div id="new" class="overlay">
                        <div class="popup" style="margin-top:300px">
                            <a class="close_forum" href="#">&times;</a> 
                            <div class="container-contact100 container_connect">
                                <div class="wrap-forum">
                                    Veuillez ajouter une nouvelle Boutique d'abord 
                                </div>
                            </div>
                        </div>
                    </div>      
                @endif
            </div>
        </div>
    </div>
</div>
<script>
    $('#file-inputs').bind('change', function() {
        $("#profile_form").submit();
    });
</script>





