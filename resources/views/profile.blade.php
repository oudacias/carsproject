<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/popup.css">
<link rel="stylesheet" href="/css/articles.css">
<link rel="stylesheet" href="/css/confirmation.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title>Forum</title>

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
                        <label class="change-profile" for="file-input">Changer
                        </label>
                        <input id="file-input" type="file" name="image"/>
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

<div class="container">
    <div class="row">
        <div class="col-12">
            <label>Commencez à vendre des voitures </label>
            <a  href="#new" id="nouvelle_voiture"><img src="/project_images/plus.png" width="40px" /></a>
            @if($user->boutique->count())
            <div id="voiture">
                <div id="form1" class="wrap-contact100">
                    <form method="POST" action="{{ action('UserController@ajouterVoiture') }}" enctype="multipart/form-data">
                        @csrf
                        <span class="contact100-form-title">Fiche Voiture</span>
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" name="marque" placeholder="Marque" required />
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" name="model" placeholder="Model" required />
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" name="version" placeholder="Version" />
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" name="carburant" placeholder="Carburant" required />
                            <span class="focus-input100"></span>
                        </div>
                        <label>Boite à vitesse</label>
                            <div class="wrap-input100 validate-input">
                                <span class="focus-input100"></span>
                                <select class="input100" name="boite_vitesse">
                                    <option>Manuelle</option>
                                    <option>Automatique</option>                                  
                                </select>
                            </div>
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="number" name="annee" placeholder="Année" required />
                            <span class="focus-input100"></span>
                        </div>
                        
                            <span class="contact100-form-title">Étape 2</span>
                            <label>Origine</label>

                            <div class="wrap-input100 validate-input">
                                <span class="focus-input100"></span>
                                <select class="input100" name="origine" >
                                    <option>Dédouanée</option>
                                    <option>Importée neuve</option>
                                    <option>Pas encore dédouanée</option>
                                    <option>WW (achetée au Maroc)</option>
                                </select>
                            </div>
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="text" name="kilometrage" placeholder="Kilométrage" />
                                <span class="focus-input100"></span>
                            </div>
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="text" name="couleur" placeholder="Couleur Voiture" required />
                                <span class="focus-input100"></span>
                            </div>
                            <label>Carrosserie</label>

                            <div class="wrap-input100 validate-input">
                                <span class="focus-input100"></span>
                                <select class="input100" name="carrosserie">
                                    <option>Break</option>
                                    <option>Monospace </option>
                                    <option>Ludospace </option>
                                    <option>Crossover </option>
                                    <option>SUV</option>
                                    <option>4x4</option>
                                    <option>Berline </option>
                                    <option>Grande routière</option>
                                    <option>Coupés</option>
                                    <option>Cabriolet</option>
                                    <option>Citadine</option>                                    
                                </select>
                            </div>
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="number" name="nbt_porte" placeholder="Nombre Portes" required />
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="text" name="puissance_fiscale" placeholder="Puissance Fiscale" required />
                                <span class="focus-input100"></span>
                            </div>
                            
                        </div>
                        <div id="form3" class="wrap-contact100">
                            <span class="contact100-form-title">Étape 3</span>

                            
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="text" name="premiere_main" placeholder="Première Main" />
                                <span class="focus-input100"></span>
                            </div>
                            <label>Préparé</label>
                            <div class="wrap-input100 validate-input">
                                <span class="focus-input100"></span>
                                <select class="input100" name="prepare">
                                    <option value="1">Oui</option>
                                    <option value="0">Non</option>                                  
                                </select>
                            </div>
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="text" name="description" placeholder="Description Véhicule" required />
                                <span class="focus-input100"></span>
                            </div>
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="text" name="option" placeholder="Options Véhicule" required />
                                <span class="focus-input100"></span>
                            </div>
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="text" name="prix" placeholder="Prix" />
                                <span class="focus-input100"></span>
                            </div>
                            <div class="wrap-input100">
                                <div style="color:#999999">Mes Boutiques</div>
                                <select class="input100" name="boutique" placeholder="Boutique">
                                @foreach($user->boutique as $u)
                                    <option value="{{$u->id}}">{{$u->nom_boutique}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="wrap-input100 validate-input">
                                <label>Image Voiture</label><br />
                                <br />
                                <input class="input100" type="file" name="voiture_image" required />
                                <span class="focus-input100"></span>
                            </div>
                            <div class="image-upload">
                                <label for="image1">Autres Images<br>
                                    <img src="/project_images/addCar.png"/>
                                </label>
                                <input id="image1" type="file" name="image1"/>
                            </div>
                            <div id="images2" class="image-upload">
                                <label id="label2" for="image2"><br>
                                    <img src="/project_images/addCar.png"/>
                                </label>
                                <input id="image2" type="file" name="image2"/>
                            </div>
                            <div id="images3" class="image-upload">
                                <label id="label3" for="image3"><br>
                                    <img src="/project_images/addCar.png"/>
                                </label>
                                <input id="image3" type="file" name="image3"/>
                            </div>


                            <a href="" id="occasion">Voiture Occasion ?</a>
                            <div id="occasion_container">
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" type="text" name="ville" placeholder="Ville" />
                                    <span class="focus-input100"></span>
                                </div>
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" type="text" name="etat" placeholder="Etat" />
                                    <span class="focus-input100"></span>
                                </div>

                            </div>
                            <div class="container-contact100-form-btn">
                                <button class="contact100-form-btn">
                                    Envoyer
                                </button>
                            </div>
                            <a href="" id="fermer_boutique">Fermer</a>
                        </div>
                    </form>
                </div>
            </div>
            @else
            <div id="new" class="overlay">
                <div class="popup" >
                    <a class="close_forum" href="#">&times;</a>
                        <div class="container-contact100" >
                            <div class="wrap-forum">
            <form method="post" action="{{ action('BoutiqueController@ajouterBoutique') }}">
                @csrf
                <h4>Veuillez Créer Une Nouvelle Boutique</h4>
                <div class="wrap-input100">
                    <input class="input100" type="text" name="nom_boutique" placeholder="Nom Boutique">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100">
                    <textarea class="input100_forum" name="description_boutique" placeholder="Description Boutique"></textarea>
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100">
                    <div style="color:#999999">Type de Boutique</div>
                    <select class="input100" name="type_boutique" placeholder="Type Boutique">
                        <option>Professionnel</option>
                        <option>Standard</option>
                    </select>
                </div>
                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn">
                        Ajouter
                    </button>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>
<script>
    $('#file-input').bind('change', function() {
        $("#profile_form").submit();
    });



    $(document).ready(function(){
        $("#voiture").hide();
        $("#images2").hide();
        $("#images3").hide();
        
        $("#nouvelle_voiture").click(function(){
            $("#voiture").show();
            $("#occasion_container").hide();
        });
        $("#fermer_boutique").click(function(){
            $("#voiture").hide();
        });
        $("#occasion").click(function(){
            $("#occasion_container").show();
            return false;
        });
        $('#image1').bind('change', function() {
		    if(image1.size > 0){
                $("#images2").show();
                $('#image2').bind('change', function() {
                    if(image2.size > 0){
                        $("#images3").show();
                    }
                });
            }
        });
        
        
    });
</script>






