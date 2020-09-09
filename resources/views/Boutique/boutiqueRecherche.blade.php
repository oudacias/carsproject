<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/popup.css">
<link rel="stylesheet" href="/css/articles.css">
<link rel='stylesheet' href="/css/confirmation.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title>Boutique</title>

@include('Components.menu')
@yield('menu')
@if(session('success'))
		<div class="animated fadeOut success">{{session('success')}}</div>
	@endif
<div class="container">
    
    <div class="col-md-12">
        <div class="other-side second-side">
                Rechercher boutiques <a onclick="showGarage()"><img width="20px" style="float:right" src="/project_images/hamburger.png"></a>
        </div>
        <div id="garage" class="other-side second-side side-form">
            <button onclick="showBoutique()">Nom Boutique ⬇</button>
            <div id="nom_boutique">
                <form method="POST" action="{{ action('UserController@ChercherVoiture') }}" enctype="multipart/form-data">
                    @csrf   
                    <select class="recherche-select" name="id_boutique">  
                            <option value="0">Choisire la boutique</option>
                            @foreach($nom_boutique as $n)
                                <option value="{{$n->id}}">{{$n->nom_boutique}}</option>
                            @endforeach
                    </select>
                    <button name="action" value="nom_boutique" type="submit" class="recherche-cars">Lancer la recherche</button>
            </div>
            <br>
            <br>
            <button type="button" onclick="showAutres()">Autres ⬇</button>
            <br>
            <div id="autres">
                    <select class="recherche-select" name="type_boutique">  
                        <option value="0">Choisire type boutique</option>
                        <option value="Professionnelle">Professionnelle</option>
                        <option value="Standard">Standard</option>
                    </select>
                    <br>
                    <select class="recherche-select" name="ville_boutique">  
                        <option value="0">Choisire ville de boutique</option>  
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
                    <button name="action" value="autres_boutique" type="submit" class="recherche-cars">Lancer la recherche</button>
            </div>
        </div>
        <div class="other-side second-side">   
            Rechercher voitures <a onclick="showCars()"><img width="20px" style="float:right" src="/project_images/hamburger.png"></a>   
        </div>
        <div id="cars" class="other-side second-side side-form">
                <select class="recherche-select" name="type">  
                    <option value="0">Choisire type de voiture</option>  
                    <option value="neuve">Neuve</option>  
                    <option value="occasion">Occasion</option> 
                </select>  
                <br>
                <select class="recherche-select" name="ville">  
                    <option value="0">Choisire ville de voiture</option>  
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
                <br>
                <div class="up_select">
                    Prix  &nbsp:
                    <input type="radio" name="prix" value="prix_down" id="up" class="input-hidden" />
                    <label for="up">
                        <img src="/project_images/down.png" width="30px"/>
                    </label>
                    <input type="radio" name="prix" id="down" value="prix_up" class="input-hidden" />
                    <label for="down">
                        <img src="/project_images/up.png" width="30px"/>
                    </label>  
                    <br>
                    Date :
                    <input type="radio" name="date" value="date_down" id="date_up" class="input-hidden" />
                    <label for="date_up">
                        <img src="/project_images/down.png" width="30px"/>
                    </label>
                    <input type="radio" name="date" id="date_up" value="date_down" class="input-hidden" />
                    <label for="date_down">
                        <img src="/project_images/up.png" width="30px"/>
                    </label>
                </div> 
                <button name="action" value="detail_voiture" type="submit" class="recherche-cars">Lancer la recherche</button>
            </form>
        </div>
    </div>

    @if($voiture->count())
    @foreach($voiture as $v)
    <div class="boutique-border">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-block">
                        <div class="user-image car-image">
                            <img src="{{$v->photo}}">
                        </div>
                    </div>
                </div>
            <div class="col-md-8 info-border">
                <div class="card-block">
                    <div class="card-introduction card_gap">
                        <p class="m-t-13 text-muted">
                        Marque : <strong>{{$v->marque}}</strong><br>
                        Model : <strong>{{$v->model}}</strong><br>
                        Description : <strong>{{$v->description}}</strong><br>
                        Prix : <strong>{{$v->prix}}</strong><br>
                        Vendeur : <strong>{{$v->user->email}}</strong>
                        </p>
                        <a href="/Boutique/voitureDetails/{{$v->id}}"><button class="btn-boutique" type="button">Savoir Plus</button></a>
                    </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    
    @endforeach 
    @endif
       
</div>
</body>

<script>
    $(document).ready(function(){
        $("#cars").hide();
        $("#garage").hide();
        $("#autres").hide();
        $("#nom_boutique").hide();
    });
    function showCars(){
        $("#garage").hide();
        $("#cars").toggle();     
    }
    function showGarage(){
        $("#cars").hide();
        $("#garage").toggle();

    }
    function showBoutique(){
        $("#autres").hide();
        $("#nom_boutique").toggle();
    }
    function showAutres(){
        $("#nom_boutique").hide();
        $("#autres").toggle();

    }


</script>




</html>