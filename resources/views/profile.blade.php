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
            <div class="card user-card"  style="min-height:355px;">
            <h4>{{$user->nom}} &nbsp; {{$user->prenom}}</h4>
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
                                @if(Auth::user()->objectif != 'standard' && Auth::user()->confirmer)
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
                <div class="container">
                        <div class="row">@if(Auth::user()->objectif == 'fournisseur')
                            <div class="col-md-6"><a href="/boutique/nouvelle_boutique">
                                <div class="card profile-card">
                                    Ajouter Boutique<br><br>
                                    <img class="cars_profile" src="/project_images/garage_profile.png"> 
                                </div>               
                            </div></a>@endif
                            <div class="col-md-6"><a href="/boutique/voiture">
                                    <div class="card profile-card">
                                        Ajouter Voiture<br><br>
                                        <img class="cars_profile" src="/project_images/cars_profile.png" >
                                    </div>
                                </div>
                            </div></a>
                        </div>
                    @if(Auth::user()->objectif == 'fournisseur' && $user->boutique->count())
                    <div class="card user-card">
                        <div class="card-block">
                            <div style="text-align:center">Vos Boutiques</div>   
                            @foreach($user->boutique as $u)
                                <div class="boutique-card">{{$u->nom_boutique}} ({{$u->voiture->count()}} voitures) 
                                    <img id="info_boutiques{{$u->id}}" style="float:right;margin-right:16%" width="25px" src="/project_images/edit_file.png"/>
                                    <img id="remove_boutiques{{$u->id}}" style="float:right;margin-right:5%" width="25px" src="/project_images/removeCar.png"/></a>
                                    <div class="arrow-down" id="arrow{{$u->id}}"></div>
                                </div>
                                <div id="supprimerBoutique{{$u->id}}" style="background-color:white;border-radius:20px;padding:40px">
                                        <center>Supprimer la boutique va automatiquement
                                        <br>supprimer les voitures de la boutique<center>
                                        <br>
                                        <div class="container-contact100-form-btn">
                                            <button class="contact100-form-btn">
                                                <a href="/profile/supprimerBoutique/{{$u->id}}">Supprimer</a>
                                            </button>
                                        </div>
                                </div>
                                <script>
                                    $(document).ready(function(){
                                        $("#supprimerBoutique{{$u->id}}").hide();
                                        $("#remove_boutiques{{$u->id}}").click(function(){
                                            $("#table{{$u->id}}").hide();
                                            $("#info_boutique{{$u->id}}").hide();
                                            $("#supprimerBoutique{{$u->id}}").toggle();
                                        });

                                    });
                                </script>
                                <div id="info_boutique{{$u->id}}" class="container-contact100" style="background-color:white;border-radius:20px">
                                <div class="container">
                                    <div class="row justify-content-around">
                                        <div class="col-md-4">        
                                                <div  class="user-image img-home">
                                                    <img class="img-profile" src="{{$u->lien_image}}"></div>
                                                    <form id="image_form{{$u->id}}" method="post" action="{{ action('BoutiqueController@modifierImage') }}" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="image-upload">
                                                            <br>
                                                            <br>
                                                            <label class="image-boutique-label" for="file-inputs{{$u->id}}">Changer
                                                            </label>
                                                            <input type="hidden" name="boutique_id" value="{{$u->id}}"/>
                                                            <input id="file-inputs{{$u->id}}" type="file" name="imageBoutique" accept="image/x-png,image/jpeg"/>
                                                            <input type="submit">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                    </div>

                                
                                    <form class="contact100-form validate-form" method="post" action="{{ action('BoutiqueController@modifyBoutique') }}" enctype="multipart/form-data">
                                            @csrf
                                        <input type="texte" name="id_boutique" value="{{$u->id}}" hidden>
                                        <label class="info-boutique-label">Nom de la boutique</label> 
                                        <br>
                                        <span class="alert" id="alert1{{$u->id}}">Veuillez Remplire ce Champ</span>  
                                        <div class="wrap-input100 validate-input" >
                                            <input class="input100" id="nom_boutique{{$u->id}}" type="text" name="nom_boutique" value="{{$u->nom_boutique}}" placeholder="Nom Boutique">
                                            <span class="focus-input100"></span>
                                        </div>
                                        <label class="info-boutique-label">Description de la boutique</label>
                                        <br>
                                        <span class="alert" id="alert2{{$u->id}}">Veuillez Remplire ce Champ</span>
                                        <div class="wrap-input100 validate-input">
                                            <textarea class="input100" id="description_boutique{{$u->id}}" style="min-height:150px" name="description_boutique" placeholder="Description Boutique">{{$u->description_boutique}}</textarea>
                                            <span class="focus-input100"></span>
                                        </div>
                                        <label class="info-boutique-label">Ville de la boutique</label>  
                                        <br>
                                        <span class="alert" id="alert3{{$u->id}}">Veuillez Remplire ce Champ</span>
                                        <div class="wrap-input100 validate-input" >
                                            <input class="input100" id="ville_boutique{{$u->id}}" type="text" name="ville_boutique" value="{{$u->ville_boutique}}">
                                            <span class="focus-input100"></span>
                                        </div>
                                        <div class="container-contact100-form-btn">
                                            <button class="contact100-form-btn">
                                                Modifier Boutique
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                    <script>
                                         $(document).ready(function(){
                                            $("#info_boutique{{$u->id}}").hide();
                                            $("#alert1{{$u->id}}").hide();
                                            $("#alert2{{$u->id}}").hide();
                                            $("#alert3{{$u->id}}").hide();
                                            $("#info_boutiques{{$u->id}}").click(function(){
                                                $("#table{{$u->id}}").hide();
                                                $("#supprimerBoutique{{$u->id}}").hide();
                                                $("#info_boutique{{$u->id}}").toggle()                                
                                            });   
                                            
                                            $('#file-inputs{{$u->id}}').bind('change', function() {
                                                document.getElementById('image_form{{$u->id}}').submit(); 
                                                console.log('{{$u->id}}')
                                            });


                                            $("#form").submit(function(e){
                                                if($("#nom_boutique{{$u->id}}").val().length == 0){
                                                    $("#alert1{{$u->id}}").show();
                                                    document.getElementById("alert1{{$u->id}}").style.color = "red";
                                                    e.preventDefault();
                                                }else{
                                                    $("#alert1{{$u->id}}").hide();
                                                }
                                                if($("#description_boutique{{$u->id}}").val().length == 0){
                                                    $("#alert2{{$u->id}}").show();
                                                    document.getElementById("alert2{{$u->id}}").style.color = "red";
                                                    e.preventDefault();
                                                }else{
                                                    $("#alert2{{$u->id}}").hide();
                                                } 
                                                if($("#ville_boutique{{$u->id}}").val().length == 0){
                                                    $("#alert3{{$u->id}}").show();
                                                    document.getElementById("alert3{{$u->id}}").style.color = "red";
                                                    e.preventDefault();
                                                }else{
                                                    $("#alert3{{$u->id}}").hide();
                                                } 
                                            });
                                        });
                                           
                                    </script>
                                    @if($u->voiture->count())
                                    <table class="table" id="table{{$u->id}}">
                                        <thead>
                                            <tr>
                                            <td scope="col"><strong>Model</strong></td>
                                            <td scope="col"><strong>Lien</strong></td>
                                            <td scope="col"><strong>Acheté</strong></td>
                                            <td scope="col"><strong>Vendue</strong></td>
                                            <td scope="col"><strong>Annuler</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($u->voiture as $v)
                                            <tr>
                                                <td>{{$v->model}}</td>
                                                <td><u><a href="/Boutique/voitureDetails/{{$v->id}}">Lien</a></u></td>
                                                @if($v->achatvoiture)
                                                    <td>Oui</td>
                                                @else
                                                    <td>Non</td>
                                                    <td><a href="/voitureVendre/{{$v->id}}"><img src="/project_images/ihandshake.png" width="20%"></a></td>
                                                    <td><a href="/Voiture/remove/{{$v->id}}"><img src="/project_images/removeCar.png" width="20%"></a></td>

                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <script>
                                        $(document).ready(function(){
                                            $("#table{{$u->id}}").hide();
                                            $("#arrow{{$u->id}}").click(function(){
                                                $("#info_boutique{{$u->id}}").hide();
                                                $("#supprimerBoutique{{$u->id}}").hide();
                                                $("#table{{$u->id}}").toggle();                                     
                                            });
                                        });
                                    </script>
                                    @endif
                            @endforeach                
                        </div>
                    </div>
                        @elseif(Auth::user()->objectif == 'particulier')
                        <div class="card user-card">
                            <div class="card-block">
                                <div style="text-align:center">Vos Voitures</div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">Model</th>
                                            <th scope="col">Lien</th>
                                            <th scope="col">Acheté</th>
                                            <th scope="col">Vendue</th>
                                            <th scope="col">Annuler</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(Auth::user()->voiture as $v)
                                            <tr>
                                                <td>{{$v->model}}</td>
                                                <td><u><a href="/Boutique/voitureDetails/{{$v->id}}">Lien</a></u></td>
                                                @if($v->achatvoiture)
                                                    <td>Oui</td>
                                                @else
                                                    <td>Non</td>
                                                    <td><a href="/voitureVendre/{{$v->id}}"><img src="/project_images/ihandshake.png" width="20%"></a></td>
                                                    <td><a href="/Voiture/remove/{{$v->id}}"><img src="/project_images/removeCar.png" width="20%"></a></td>

                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif
                    @elseif((Auth::user()->objectif != 'standard' && !Auth::user()->confirmer))
                        <i><center>Votre demande pour commencer à vendre est en cours</center></i>
                    @endif
                    @if(Auth::user()->objectif == 'standard' || !Auth::user()->confirmer)
                                </div>
                            </div>                    
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">@if($user->articles->count())<a href="/User/myArticles">@endif
                                <div class="card profile-card">
                                    Article Farvoris ({{$user->articles->count()}})<br><br>
                                    <img class="cars_profile" src="/project_images/favorite.png"> 
                                </div>               
                            </div></a>
                            <div class="col-md-6">@if($user->forum->count())<a href="/User/myForums">@endif
                                <div class="card profile-card">
                                    Forum Ajouté ({{$user->forum->count()}})<br><br>
                                    <img class="cars_profile" src="/project_images/forum.png" >
                                </div>
                            </div>
                        </div></a>
                        <div class="row">
                            <div class="col-md-6">@if($user->forums->count())<a href="/User/myComments">@endif
                                <div class="card profile-card">
                                    Commentaire Ajouté ({{$user->forums->count()}})<br><br>
                                    <img class="cars_profile" src="/project_images/comment.png" >
                                </div>
                            </div>
                        </div></a>
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






