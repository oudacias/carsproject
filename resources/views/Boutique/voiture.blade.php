<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/articles.css">
<link rel="stylesheet" href="/css/confirmation.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title>Nouvelle Voiture</title>

@include('Components.menu')
@yield('menu')

<div class="container-contact100">
<div class="wrap-contact100">
@if(session('success'))
		<div class="animated fadeOut success">{{session('success')}}</div>
@endif
    <form method="POST" action="{{ action('UserController@ajouterVoiture') }}" enctype="multipart/form-data">
        <div id="form1">
            @csrf
            <span class="contact100-form-title">Commencez à vendre des voitures </span>
            
            <label>Marque de la voiture</label>
            <br>
            <span class="alert" id="alert1">Veuillez Remplire ce Champ</span>  
            <div class="wrap-input100 validate-input">
                <input id="marque" class="input100" type="text" name="marque"/>
                <span class="focus-input100"></span>
            </div>
            <label>Model de la voiture</label>
            <br>
            <span class="alert" id="alert2">Veuillez Remplire ce Champ</span>  
            <div class="wrap-input100 validate-input">
                <input id="model" class="input100" type="text" name="model"/>
                <span class="focus-input100"></span>
            </div>
            <label>Version de la voiture</label>
            <br>
            <span class="alert" id="alert3">Veuillez Remplire ce Champ</span>  
            <div class="wrap-input100 validate-input">
                <input id="version" class="input100" type="text" name="version"/>
                <span class="focus-input100"></span>
            </div>
            <label>Carburant de la voiture</label>
            <br>
            <span class="alert" id="alert4">Veuillez Remplire ce Champ</span>  
            <div class="wrap-input100 validate-input">
                <input id="carburant" class="input100" type="text" name="carburant"/>
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
            <label>Année de la voiture</label>
            <br>
            <span class="alert" id="alert5">Veuillez Remplire ce Champ</span>  
            <div class="wrap-input100 validate-input">
                <input id="annee" class="input100" type="number" name="annee"/>
                <span class="focus-input100"></span>
            </div>
            <div class="container-contact100-form-btn">
                <button type="button" id="nextform2" class="contact100-form-btn">
                    Suivant
                </button>
            </div>
        </div>
        <div id="form2">
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
            <label>Kilométrage de la voiture</label>
            <br>
            <span class="alert" id="alert6">Veuillez Remplire ce Champ</span>  
            <div class="wrap-input100 validate-input">
                <input id="km" class="input100" type="text" name="kilometrage" />
                <span class="focus-input100"></span>
            </div>
            <label>Couleur de la voiture</label>
            <br>
            <span class="alert" id="alert7">Veuillez Remplire ce Champ</span>  
            <div class="wrap-input100 validate-input">
                <input id="couleur" class="input100" type="text" name="couleur" />
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
            <label>Nombre Portes</label>
            <br>
            <span class="alert" id="alert8">Veuillez Remplire ce Champ</span>  
            <div class="wrap-input100 validate-input">
                <input id="nbr_porte" class="input100" type="number" name="nbt_porte"/>
                <span class="focus-input100"></span>
            </div>
            <label>Puissance Fiscale</label>
            <br>
            <span class="alert" id="alert9">Veuillez Remplire ce Champ</span>  
            <div class="wrap-input100 validate-input">
                <input id="puissance" class="input100" type="text" name="puissance_fiscale"/>
                <span class="focus-input100"></span>
            </div>
            <div class="container-contact100-form-btn">
                <button type="button" id="previousform1" class="contact100-form-btn">
                    Précédent
                </button> &nbsp&nbsp&nbsp&nbsp
                <button type="button" id="nextform3" class="contact100-form-btn">
                    Suivant
                </button>
            </div>
        </div>
        <div id="form3">
            <span class="contact100-form-title">Étape 3</span>
            <label>Première Main</label>
            <br>
            <span class="alert" id="alert10">Veuillez Remplire ce Champ</span>    
            <div class="wrap-input100 validate-input">
                <input id="main" class="input100" type="text" name="premiere_main"/>
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
            <label>Description Véhicule</label>
            <br>
            <span class="alert" id="alert11">Veuillez Remplire ce Champ</span>    
            <div class="wrap-input100 validate-input">
                <input id="description" class="input100" type="text" name="description"/>
                <span class="focus-input100"></span>
            </div>
            <label>Options Véhicule</label>
            <br>
            <span class="alert" id="alert12">Veuillez Remplire ce Champ</span>    
            <div class="wrap-input100 validate-input">
                <input id="option" class="input100" type="text" name="option" />
                <span class="focus-input100"></span>
            </div>
            <label>Prix de la voiture</label> 
            <br>
            <span class="alert" id="alert13">Veuillez Remplire ce Champ</span>   
            <div class="wrap-input100 validate-input">
                <input id="prix" class="input100" type="number" name="prix"/>
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
            <div class="wrap-input100">
                <div style="color:#999999">Ville</div>
                <select class="input100" name="ville">
                <option title="agadir" value="agadir">AGADIR</option>
											
						<option title="ait benhaddou" value="ait benhaddou">AIT BENHADDOU</option>
											
						<option title="ait daoud" value="ait daoud">AIT DAOUD</option>
											
						<option title="ait ourir" value="ait ourir">AIT OURIR</option>
											
						<option title="al hoceima" value="al hoceima">AL HOCEIMA</option>
											
						<option title="amizmiz" value="amizmiz">AMIZMIZ</option>
											
						<option title="arfoud" value="arfoud">ARFOUD</option>
											
						<option title="asilah" value="asilah">ASILAH</option>
											
						<option title="azemmour" value="azemmour">AZEMMOUR</option>
											
						<option title="azrou" value="azrou">AZROU</option>
											
						<option title="ben ahmed" value="ben ahmed">BEN AHMED</option>
											
						<option title="ben slimane" value="ben slimane">BEN SLIMANE</option>
											
						<option title="benguerir" value="benguerir">BENGUERIR</option>
											
						<option title="beni mellal" value="beni mellal">BENI MELLAL</option>
											
						<option title="berkane" value="berkane">BERKANE</option>
											
						<option title="berrechid" value="berrechid">BERRECHID</option>
											
						<option title="bouskoura" value="bouskoura">BOUSKOURA</option>
											
						<option title="bouznika" value="bouznika">BOUZNIKA</option>
											
						<option title="casablanca" value="casablanca">CASABLANCA</option>
											
						<option title="chefchaouen" value="chefchaouen">CHEFCHAOUEN</option>
											
						<option title="chemaia" value="chemaia">CHEMAIA</option>
											
						<option title="chichaoua" value="chichaoua">CHICHAOUA</option>
											
						<option title="dakhla" value="dakhla">DAKHLA</option>
											
						<option title="dar bouazza" value="dar bouazza">DAR BOUAZZA</option>
											
						<option title="demnate" value="demnate">DEMNATE</option>
											
						<option title="el hajeb" value="el hajeb">EL HAJEB</option>
											
						<option title="el jadida" value="el jadida">EL JADIDA</option>
											
						<option title="errachidia" value="errachidia">ERRACHIDIA</option>
											
						<option title="essaouira" value="essaouira">ESSAOUIRA</option>
											
						<option title="fes" value="fes">FES</option>
											
						<option title="figuig" value="figuig">FIGUIG</option>
											
						<option title="fnideq" value="fnideq">FNIDEQ</option>
											
						<option title="fquih ben salah" value="fquih ben salah">FQUIH BEN SALAH</option>
											
						<option title="guelmim" value="guelmim">GUELMIM</option>
											
						<option title="guelta zemmour" value="guelta zemmour">GUELTA ZEMMOUR</option>
											
						<option title="guercif" value="guercif">GUERCIF</option>
											
						<option title="had soualem" value="had soualem">HAD SOUALEM</option>
											
						<option title="harhoura" value="harhoura">HARHOURA</option>
											
						<option title="ifrane" value="ifrane">IFRANE</option>
											
						<option title="imilchil" value="imilchil">IMILCHIL</option>
											
						<option title="imintanoute" value="imintanoute">IMINTANOUTE</option>
											
						<option title="inezgane" value="inezgane">INEZGANE</option>
											
						<option title="jerada" value="jerada">JERADA</option>
											
						<option title="kelaa sraghna" value="kelaa sraghna">KELAA SRAGHNA</option>
											
						<option title="kenitra" value="kenitra">KENITRA</option>
											
						<option title="khemis zemamra" value="khemis zemamra">KHEMIS ZEMAMRA</option>
											
						<option title="khemisset" value="khemisset">KHEMISSET</option>
											
						<option title="khenifra" value="khenifra">KHENIFRA</option>
											
						<option title="khouribga" value="khouribga">KHOURIBGA</option>
											
						<option title="ksar el kebir" value="ksar el kebir">KSAR EL KEBIR</option>
											
						<option title="laayoune" value="laayoune">LAAYOUNE</option>
											
						<option title="lagouira" value="lagouira">LAGOUIRA</option>
											
						<option title="larache" value="larache">LARACHE</option>
											
						<option title="marrakech" value="marrakech">MARRAKECH</option>
											
						<option title="martil" value="martil">MARTIL</option>
											
						<option title="mechra bel ksiri" value="mechra bel ksiri">MECHRA BEL KSIRI</option>
											
						<option title="mediek ou mdiq" value="mediek ou mdiq">MEDIEK OU MDIQ</option>
											
						<option title="mediouna" value="mediouna">MEDIOUNA</option>
											
						<option title="mehdia" value="mehdia">MEHDIA</option>
											
						<option title="meknes" value="meknes">MEKNES</option>
											
						<option title="midelt" value="midelt">MIDELT</option>
											
						<option title="mirleft" value="mirleft">MIRLEFT</option>
											
						<option title="missour" value="missour">MISSOUR</option>
											
						<option title="mohammedia" value="mohammedia">MOHAMMEDIA</option>
											
						<option title="moulay bousselham" value="moulay bousselham">MOULAY BOUSSELHAM</option>
											
						<option title="mrirt" value="mrirt">MRIRT</option>
											
						<option title="nador" value="nador">NADOR</option>
											
						<option title="oualidia" value="oualidia">OUALIDIA</option>
											
						<option title="ouarzazate" value="ouarzazate">OUARZAZATE</option>
											
						<option title="ouezzane" value="ouezzane">OUEZZANE</option>
											
						<option title="oujda" value="oujda">OUJDA</option>
											
						<option title="oulad berhil" value="oulad berhil">OULAD BERHIL</option>
											
						<option title="oulad teÔma" value="oulad teÔma">OULAD TEÔMA</option>
											
						<option title="rabat" value="rabat">RABAT</option>
											
						<option title="ras el ma" value="ras el ma">RAS EL MA</option>
											
						<option title="rissani" value="rissani">RISSANI</option>
											
						<option title="safi" value="safi">SAFI</option>
											
						<option title="saidia" value="saidia">SAIDIA</option>
											
						<option title="sale" value="sale">SALE</option>
											
						<option title="sefrou" value="sefrou">SEFROU</option>
											
						<option title="settat" value="settat">SETTAT</option>
											
						<option title="sidi bou othmane" value="sidi bou othmane">SIDI BOU OTHMANE</option>
											
						<option title="sidi kacem" value="sidi kacem">SIDI KACEM</option>
											
						<option title="sidi rahal" value="sidi rahal">SIDI RAHAL</option>
											
						<option title="sidi slimane" value="sidi slimane">SIDI SLIMANE</option>
											
						<option title="skhirat" value="skhirat">SKHIRAT</option>
											
						<option title="smara" value="smara">SMARA</option>
											
						<option title="taddert" value="taddert">TADDERT</option>
											
						<option title="tahannaout" value="tahannaout">TAHANNAOUT</option>
											
						<option title="taliouine" value="taliouine">TALIOUINE</option>
											
						<option title="talmest" value="talmest">TALMEST</option>
											
						<option title="tamanar" value="tamanar">TAMANAR</option>
											
						<option title="tamaris" value="tamaris">TAMARIS</option>
											
						<option title="tameslouht" value="tameslouht">TAMESLOUHT</option>
											
						<option title="tan-tan" value="tan-tan">TAN-TAN</option>
											
						<option title="tanger" value="tanger">TANGER</option>
											
						<option title="taounate" value="taounate">TAOUNATE</option>
											
						<option title="taourirte" value="taourirte">TAOURIRTE</option>
											
						<option title="tarfaya" value="tarfaya">TARFAYA</option>
											
						<option title="taroudannt" value="taroudannt">TAROUDANNT</option>
											
						<option title="tata" value="tata">TATA</option>
											
						<option title="taza" value="taza">TAZA</option>
											
						<option title="taznakht" value="taznakht">TAZNAKHT</option>
											
						<option title="temara" value="temara">TEMARA</option>
											
						<option title="tetouan" value="tetouan">TETOUAN</option>
											
						<option title="tiflet" value="tiflet">TIFLET</option>
											
						<option title="tinghir" value="tinghir">TINGHIR</option>
											
						<option title="tiznit" value="tiznit">TIZNIT</option>
											
						<option title="youssoufia" value="youssoufia">YOUSSOUFIA</option>
											
						<option title="zagora" value="zagora">ZAGORA</option>
											
						<option title="autre" value="autre">AUTRE</option>
                </select>
            </div>
            
            <div class="wrap-input100 validate-input">
                <label>Image Voiture</label><br />
                <br>
                <span class="alert" id="alert14">Veuillez Remplire ce Champ</span>  
                <br />
                <input id="image" class="input100" type="file" name="voiture_image"/>
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

            <label for="vehicle1">Voiture Occasion ?</label>
            <input type="checkbox" id="occasion" onclick="checkCar()">
            <div id="occasion_container">
                <label>Etat de la voiture</label>
                <br>
                <span class="alert" id="alert14">Veuillez Remplire ce Champ</span>   
                <div class="wrap-input100 validate-input">
                    <input id ="etat" class="input100" type="text" name="etat"/>
                    <span class="focus-input100"></span>
                </div>

            </div>
            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn">
                    Ajouter
                </button>
            </div>
        </div>
    </form>
</div>
<script>
    function checkCar(){
        var checkBox = document.getElementById("occasion");
            if (checkBox.checked == true){
                $("#occasion_container").fadeIn();
            } else {
                text.style.display = "none";
        }
    }
    $(document).ready(function(){
        $("#form1").fadeIn();
        $("#form2").fadeOut();
        $("#form3").fadeOut();


        $("#voiture").hide();
        $("#images2").hide();
        $("#images3").hide();

        $("#previousform1").click(function(){
            $("#form2").fadeOut();
            $("#form1").fadeIn();
        });
        
        $("#previousform2").click(function(){
            $("#form3").fadeOut();
            $("#form2").fadeIn();
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

        $("#nextform2").click(function(){
        if($("#marque").val().length == 0){
            $("#alert1").show();
            document.getElementById("alert1").style.color = "red";
        }else{
            $("#alert1").hide();
        }
        if($("#model").val().length == 0){
            $("#alert2").show();
            document.getElementById("alert2").style.color = "red";
        }else{
            $("#alert2").hide();
        }
        if($("#version").val().length == 0){
            $("#alert3").show();
            document.getElementById("alert3").style.color = "red";
        }else{
            $("#alert3").hide();
        }
        if($("#carburant").val().length == 0 ){
            $("#alert4").show();
            document.getElementById("alert4").style.color = "red";
        }else{
            $("#alert4").hide();
        }
        if($("#annee").val().length == 0 ){
            $("#alert5").show();
            document.getElementById("alert5").style.color = "red";
        }else{
            $("#alert5").hide();
        }
        if($("#marque").val().length > 0 && $("#model").val().length > 0 && $("#carburant").val().length >0 && $("#version").val().length >0 && $("#annee").val().length >0){
            $("#form1").fadeOut();
            $("#form2").fadeIn();
        }
    });
        $("#nextform3").click(function(){
        $("#occasion_container").fadeOut();
        if($("#km").val().length == 0){
            $("#alert6").show();
            document.getElementById("alert6").style.color = "red";
        }else{
            $("#alert6").hide();
        }
        if($("#couleur").val().length == 0){
            $("#alert7").show();
            document.getElementById("alert7").style.color = "red";
        }else{
            $("#alert7").hide();
        }
        if($("#nbr_porte").val().length == 0){
            $("#alert8").show();
            document.getElementById("alert8").style.color = "red";
        }else{
            $("#alert8").hide();
        }
        if($("#puissance").val().length == 0){
            $("#alert9").show();
            document.getElementById("alert9").style.color = "red";
        }else{
            $("#alert9").hide();
        }
        if($("#km").val().length > 0 && $("#couleur").val().length > 0 && $("#nbr_porte").val().length > 0 && $("#puissance").val().length >0 ){
            $("#form2").fadeOut();
            $("#form3").fadeIn();
        }
    });
    $("form").submit(function(e){
        if($("#main").val().length == 0){
            $("#alert10").show();
            document.getElementById("alert10").style.color = "red";
            e.preventDefault();
        }else{
            $("#alert10").hide();
        }
        if($("#description").val().length == 0){
            $("#alert11").show();
            document.getElementById("alert11").style.color = "red";
            e.preventDefault();
        }else{
            $("#alert11").hide();
        }
        if($("#option").val().length == 0){
            $("#alert12").show();
            document.getElementById("alert12").style.color = "red";
            e.preventDefault();
        }else{
            $("#alert12").hide();
        } 
        if($("#prix").val().length == 0){
            $("#alert13").show();
            document.getElementById("alert13").style.color = "red";
            e.preventDefault();
        }else{
            $("#alert13").hide();
        } 
        if($("#image").val().length == 0){
            $("#alert14").show();
            document.getElementById("alert14").style.color = "red";
            e.preventDefault();
        }else{
            $("#alert14").hide();
        } 
        if($("#etat").val().length == 0 && ('#occasion').is(':checked')){
            $("#alert15").show();
            document.getElementById("alert15").style.color = "red";
            e.preventDefault();
        }else{
            $("#alert15").hide();
        } 
    }); 
    });
</script>