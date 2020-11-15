@section('recherche')
@if($msg)
	<div class="animated fadeOut success">{{$msg}}</div>
   
@endif
  
<div class="other-side">
    <div class="container shift-side">
        <div class="col-md-12">
            <div class="second-side">
                    Rechercher boutiques <a onclick="showGarage()"><img width="20px" style="float:right" src="/project_images/hamburger.png"></a>
            </div>
            <div id="garage" class="second-side side-form">
                <button onclick="showBoutique()">Nom Boutique ⬇</button>
                <div id="nom_boutique">
                    <form method="GET" action="{{ action('UserController@ChercherVoitureBoutique') }}" enctype="multipart/form-data">
                        <select id="select_boutique" class="recherche-select" name="nom_boutique">  
                                <option value="0">Choisire la boutique</option>
                                @foreach($nom_boutique as $n)
                                    <option value="{{$n->nom_boutique}}">{{$n->nom_boutique}}</option>
                                @endforeach
                        </select>
                        <button id="btn_boutique_id" type="submit" class="recherche-cars">Lancer la recherche</button>
                    </form>
                </div>
                <br>
                <br>
                <button type="button" onclick="showAutres()">Ville Boutique ⬇</button>
                <br>
                <div id="autres">
                <form method="GET" action="{{ action('UserController@ChercherBoutiqueVille') }}" enctype="multipart/form-data">
                        <select id="ville_select_id" class="recherche-select" name="ville_boutique">  
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
                        <button id="ville_select_btn" type="submit" class="recherche-cars">Lancer la recherche</button>
                    </form>
                </div>
            </div>
            <div class="second-side">   
                Rechercher voitures <a onclick="showCars()"><img width="20px" style="float:right" src="/project_images/hamburger.png"></a>   
            </div>
            <div id="cars" class="second-side side-form">
                <form method="GET" action="{{ action('UserController@ChercherVoiture') }}" enctype="multipart/form-data">
                    <select id="ville_id_recherche" class="recherche-select" name="ville">  
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
                    <br>
                        <label style="margin-left:40px">Prix  Max: </label>
                        <input id="prix_id" type="number" name="prix" class="input-prix"/>
                        <br>
                    <button id="btn_recherche_voiture" type="submit" class="recherche-cars">Lancer la recherche</button>
                </form>
            </div>
            <div class="second-side">
                Recherche détaillée<a onclick="showGarage()"><img width="20px" style="float:right" src="/project_images/hamburger.png"></a>
            </div>
            <div id="details" class="second-side side-form">
                <div id="Rdetail">
                    <form id="recherche_detaillee" method="GET" action="{{ action('UserController@ChercherVoitureDetail') }}">
                        <select id="marque" class="recherche-select" name="marque">  
                                <option value="0" selected="selected">ℨ Choisire Marque</option>
                                <option value="Renault">Renault</option>
                                <option value="Peugeot">Peugeot</option>
                                <option value="Opel">Opel</option>
                                <option value="Citroen">Citroen</option>
                                <option value="Volkswagen">Volkswagen</option>
                                <option value="Mercedes">Mercedes</option>
                                <option value="BMW">BMW</option>
                                <option value="Nissan">Nissan</option>
                                <option value="Toyota">Toyota</option>
                                <option value="Ford">Ford</option>
                                <option value="Audi">Audi</option>
                                <option value="Fiat">Fiat</option>
                                <option value="Abarth">Abarth</option>
                                <option value="AC">AC</option>
                                <option value="Aixam">Aixam</option>
                                <option value="Alfa Romeo">Alfa Romeo</option>
                                <option value="Alpine">Alpine</option>
                                <option value="AMC">AMC</option>
                                <option value="Aston Martin">Aston Martin</option>
                                <option value="Austin Healey">Austin Healey</option>
                                <option value="Autobianchi">Autobianchi</option>
                                <option value="Auverland">Auverland</option>
                                <option value="Bellier">Bellier</option>
                                <option value="Bentley">Bentley</option>
                                <option value="Bellier">Bellier</option>
                                <option value="Bluecar">Bluecar</option>
                                <option value="Buick">Buick</option>
                                <option value="Cadillac">Cadillac</option>
                                <option value="Bellier">Casalini</option>
                                <option value="Bellier">Chatenet</option>
                                <option value="Bellier">Chevrolet</option>
                                <option value="Bellier">Chrysler</option>
                                <option value="Bellier">Cord</option>
                                <option value="Bellier">Corvette</option>
                                <option value="Dacia">Dacia</option>
                                <option value="Daihatsu">Daihatsu</option>
                                <option value="Dodge">Dodge</option>
                                <option value="Honda">Honda</option>
                                <option value="Hyundai">Hyundai</option>
                                <option value="Land rover">Land rover</option>
                                <option value="Jaguar">Jaguar</option>
                                <option value="Volvo">Volvo</option>
                                <option value="Kia">Kia</option>
                        </select>
                        <select id="model" class="recherche-select" name="model">  
                                <option value="0">Choisire modèle</option>
                        </select>
                        <select class="recherche-select" name="carburant">  
                            <option value="0" selected="selected">Choisire Carburant</option>
                            <option value="Essence">Essence</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Electrique">Electrique</option>
                            <option value="Hybride">Hybride</option>
                        </select>
                        <select class="recherche-select" name="vitesse">  
                            <option selected="selected" value="0">Boite à vitesse</option>
                            <option value="Manuelle ">Manuelle </option>
                            <option value="Automatique">Automatique</option>
                        </select>
                        <button name="action" value="plusdetails" type="submit" class="recherche-cars">Lancer la recherche</button>
                    </div>    
                </div>
            </div>
        </div>
    </div>
<div>
<script>
    $(document).ready(function(){
            var options = $("#marque option"); 
            options.detach().sort(function(a, b) { 
                var at = $(a).text(); 
                var bt = $(b).text(); 
                return (at > bt) ? 1 : ((at < bt) ? -1 : 0); 
            }); 
            options.appendTo("#marque"); 

            $("#btn_boutique_id").click(function(e){
                
                if($("#select_boutique").val() == 0)
                e.preventDefault();
            });
            $("#ville_select_btn").click(function(e){
                if($("#ville_select_id").val() ==0)
                    e.preventDefault();
            });
            $("#btn_recherche_voiture").click(function(e){
                if($("#prix_id").val() == "" && $("#ville_id_recherche").val() == 0)
                    e.preventDefault();
            })

        $( "#marque" ).change(function() {
            if($("#marque").val() == "Renault"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="Clio">Clio</option>`);
                $('#model').append(`<option value="Alaskan">Alaskan</option>`);
                $('#model').append(`<option value="Avantime">Avantime</option>`);
                $('#model').append(`<option value="captur">captur</option>`);
                $('#model').append(`<option value="Espace">Espace</option>`);
                $('#model').append(`<option value="Fluence">Fluence</option>`);
                $('#model').append(`<option value="Grand espace">Grand espace</option>`);
                $('#model').append(`<option value="Grand modus">Grand modus</option>`);
                $('#model').append(`<option value="Grand scenic">Grand scenic</option>`);
                $('#model').append(`<option value="Kadjar">Kadjar</option>`);
                $('#model').append(`<option value="Kangoo">Kangoo</option>`);
                $('#model').append(`<option value="Koleos">Koleos</option>`);
                $('#model').append(`<option value="Laguna">Laguna</option>`);
                $('#model').append(`<option value="Laguna">Laguna</option>`);
                $('#model').append(`<option value="Latitude">Latitude</option>`);
                $('#model').append(`<option value="Master">Master</option>`);
                $('#model').append(`<option value="Master transport">Master transport</option>`);
                $('#model').append(`<option value="Modus">Modus</option>`);
                $('#model').append(`<option value="R5">R5</option>`);
                $('#model').append(`<option value="Safrane">Safrane</option>`);
                $('#model').append(`<option value="Scenic">Scenic</option>`);
                $('#model').append(`<option value="Talisman">Talisman</option>`);
                $('#model').append(`<option value="Trafic">Trafic</option>`);
                $('#model').append(`<option value="Trafic passenger">Trafic passenger</option>`);
                $('#model').append(`<option value="Twingo">Twingo</option>`);
                $('#model').append(`<option value="Twizy">Twizy</option>`);
                $('#model').append(`<option value="Vel satis">Vel satis</option>`);
                $('#model').append(`<option value="Zoe">Zoe</option>`);
            }
            if($("#marque").val() == "Peugeot"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="206+">206+</option>`);
                $('#model').append(`<option value="Bipper Tepee">Bipper Tepee</option>`);
                $('#model').append(`<option value="Boxer">Boxer</option>`);
                $('#model').append(`<option value="E-208">E-208</option>`);
                $('#model').append(`<option value="Expert">Expert</option>`);
                $('#model').append(`<option value="Expert Tepee">Expert Tepee</option>`);
                $('#model').append(`<option value="ION">ION</option>`);
                $('#model').append(`<option value="Partner">Partner</option>`);
                $('#model').append(`<option value="Partner Tepee">Partner Tepee</option>`);
                $('#model').append(`<option value="RCZ">RCZ</option>`);
                $('#model').append(`<option value="Rifter">Rifter</option>`);
                $('#model').append(`<option value="Traveller">Traveller</option>`);
                $('#model').append(`<option value="106">106</option>`);
                $('#model').append(`<option value="107">107</option>`);
                $('#model').append(`<option value="108">108</option>`);
                $('#model').append(`<option value="206">206</option>`);
                $('#model').append(`<option value="207">207</option>`);
                $('#model').append(`<option value="207+">207+</option>`);
                $('#model').append(`<option value="208">208</option>`);
                $('#model').append(`<option value="306">306</option>`);
                $('#model').append(`<option value="307">307</option>`);
                $('#model').append(`<option value="405">405</option>`);
                $('#model').append(`<option value="406">406</option>`);
                $('#model').append(`<option value="407">407</option>`);
                $('#model').append(`<option value="508 RXH">508 RXH</option>`);
                $('#model').append(`<option value="508">508</option>`);
                $('#model').append(`<option value="607">607</option>`);
                $('#model').append(`<option value="807">807</option>`);
                $('#model').append(`<option value="1007">1007</option>`);
                $('#model').append(`<option value="2008">2008</option>`);
                $('#model').append(`<option value="3008">3008</option>`);
                $('#model').append(`<option value="3008 Hybrid4">3008 Hybrid4</option>`);
                $('#model').append(`<option value="4007">4007</option>`);
                $('#model').append(`<option value="4008">4008</option>`);
                $('#model').append(`<option value="5008">5008</option>`);
            }
            if($("#marque").val() == "Opel"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="Adam">Adam</option>`);
                $('#model').append(`<option value="Agila">Agila</option>`);
                $('#model').append(`<option value="Antara">Antara</option>`);
                $('#model').append(`<option value="Astra">Astra</option>`);
                $('#model').append(`<option value="Astra GTC">Astra GTC</option>`);
                $('#model').append(`<option value="Astra sports">Astra sports</option>`);
                $('#model').append(`<option value="Atelier">Atelier</option>`);
                $('#model').append(`<option value="Cascada">Cascada</option>`);
                $('#model').append(`<option value="Combo life">Combo life</option>`);
                $('#model').append(`<option value="Combo tour">Combo tour</option>`);
                $('#model').append(`<option value="Corsa">Corsa</option>`);
                $('#model').append(`<option value="Corssland X">Corssland X</option>`);
                $('#model').append(`<option value="Grandland">Grandland</option>`);
                $('#model').append(`<option value="Insigniaa">Insigniaa</option>`);
                $('#model').append(`<option value="Karl">Karl</option>`);
                $('#model').append(`<option value="Meriva">Meriva</option>`);
                $('#model').append(`<option value="Mokka">Mokka</option>`);
                $('#model').append(`<option value="Tigra">Tigra</option>`);
                $('#model').append(`<option value="Vectra">Vectra</option>`);
                $('#model').append(`<option value="Vivaro">Vivaro</option>`);
                $('#model').append(`<option value="Zafira">Zafira</option>`);
            }
            if($("#marque").val() == "Citroen"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="2 CV">2 CV</option>`);
                $('#model').append(`<option value="Berlingo">Berlingo</option>`);
                $('#model').append(`<option value="C elysee">C elysee</option>`);
                $('#model').append(`<option value="C zero">C zero</option>`);
                $('#model').append(`<option value="C. Crosser">C. Crosser</option>`);
                $('#model').append(`<option value="C1">C1</option>`);
                $('#model').append(`<option value="C2">C2</option>`);
                $('#model').append(`<option value="C3">C3</option>`);
                $('#model').append(`<option value="C3 Aircross">C3 Aircross</option>`);
                $('#model').append(`<option value="C3 Picasso">C3 Picasso</option>`);
                $('#model').append(`<option value="C3 Pluriel">C3 Pluriel</option>`);
                $('#model').append(`<option value="C4 Aircross">C4 Aircross</option>`);
                $('#model').append(`<option value="C4 Cactus">C4 Cactus</option>`);
                $('#model').append(`<option value="C4 picasso">C4 picasso</option>`);
                $('#model').append(`<option value="C4 Spacetourer">C4 Spacetourer</option>`);
                $('#model').append(`<option value="C5">C5</option>`);
                $('#model').append(`<option value="C5 Aircross">C5 Aircross</option>`);
                $('#model').append(`<option value="C6">C6</option>`);
                $('#model').append(`<option value="C8">C8</option>`);
                $('#model').append(`<option value="E-Mehari">E-Mehari</option>`);
                $('#model').append(`<option value="Grand C4 Picasso">Grand C4 Picasso</option>`);
                $('#model').append(`<option value="Jumper">Jumper</option>`);
                $('#model').append(`<option value="Nemo">Nemo</option>`);
                $('#model').append(`<option value="Nemo multispace">Nemo multispace</option>`);
                $('#model').append(`<option value="Saxo">Saxo</option>`);
                $('#model').append(`<option value="Spacetourer">Spacetourer</option>`);
                $('#model').append(`<option value="XSara">XSara</option>`);
                $('#model').append(`<option value="XSara Picasso">XSara Picasso</option>`);
            }
            if($("#marque").val() == "Volkswagen"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="Amarok">Amarok</option>`);
                $('#model').append(`<option value="Arteon">Arteon</option>`);
                $('#model').append(`<option value="CC">CC</option>`);
                $('#model').append(`<option value="Caddy">Caddy</option>`);
                $('#model').append(`<option value="Caddy Maxi">Caddy Maxi</option>`);
                $('#model').append(`<option value="California">California</option>`);
                $('#model').append(`<option value="Caravelle">Caravelle</option>`);
                $('#model').append(`<option value="Coccinelle">Coccinelle</option>`);
                $('#model').append(`<option value="EOS">EOS</option>`);
                $('#model').append(`<option value="FOX">FOX</option>`);
                $('#model').append(`<option value="Golf">Golf</option>`);
                $('#model').append(`<option value="Golf plus">Golf plus</option>`);
                $('#model').append(`<option value="Golf Sportsvan">Golf Sportsvan</option>`);
                $('#model').append(`<option value="Jetta">Jetta</option>`);
                $('#model').append(`<option value="Multivan">Multivan</option>`);
                $('#model').append(`<option value="New Beetle">New Beetle</option>`);
                $('#model').append(`<option value="Polo">Polo</option>`);
                $('#model').append(`<option value="Scirocco">Scirocco</option>`);
                $('#model').append(`<option value="Sharan">Sharan</option>`);
                $('#model').append(`<option value="T-Cross">T-Cross</option>`);
                $('#model').append(`<option value="T-Roc">T-Roc</option>`);
                $('#model').append(`<option value="Tiguan">Tiguan</option>`);
                $('#model').append(`<option value="Touareg">Touareg</option>`);
                $('#model').append(`<option value="Touran">Touran</option>`);
                $('#model').append(`<option value="Transporter">Transporter</option>`);
                $('#model').append(`<option value="UP">UP</option>`);
            }
            if($("#marque").val() == "Mercedes"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="450 SEL">450 SEL</option>`);
                $('#model').append(`<option value="AMG GT">AMG GT</option>`);
                $('#model').append(`<option value="CL">CL</option>`);
                $('#model').append(`<option value="CLA">CLA</option>`);
                $('#model').append(`<option value="CLC">CLC</option>`);
                $('#model').append(`<option value="CLK">CLK</option>`);
                $('#model').append(`<option value="CLS">CLS</option>`);
                $('#model').append(`<option value="Classe A">Classe A</option>`);
                $('#model').append(`<option value="Classe B">Classe B</option>`);
                $('#model').append(`<option value="Classe C">Classe C</option>`);
                $('#model').append(`<option value="Classe E">Classe E</option>`);
                $('#model').append(`<option value="Classe G">Classe G</option>`);
                $('#model').append(`<option value="Classe M">Classe M</option>`);
                $('#model').append(`<option value="Classe R">Classe R</option>`);
                $('#model').append(`<option value="Classe S">Classe S</option>`);
                $('#model').append(`<option value="Classe V">Classe V</option>`);
                $('#model').append(`<option value="EQC">EQC</option>`);
                $('#model').append(`<option value="GL">GL</option>`);
                $('#model').append(`<option value="GLA">GLA</option>`);
                $('#model').append(`<option value="GLC">GLC</option>`);
                $('#model').append(`<option value="GLE">GLE</option>`);
                $('#model').append(`<option value="GLK">GLK</option>`);
                $('#model').append(`<option value="GLS">GLS</option>`);
                $('#model').append(`<option value="Marco Polo">Marco Polo</option>`);
                $('#model').append(`<option value="SL">SL</option>`);
                $('#model').append(`<option value="SLC">SLC</option>`);
                $('#model').append(`<option value="SLK">SLK</option>`);
                $('#model').append(`<option value="Sprinter">Sprinter</option>`);
                $('#model').append(`<option value="Viano">Viano</option>`);
                $('#model').append(`<option value="Vito">Vito</option>`);
                $('#model').append(`<option value="280">280</option>`);
                $('#model').append(`<option value="560">560</option>`);
            }
            if($("#marque").val() == "BMW"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="I3">I3</option>`);
                $('#model').append(`<option value="I8">I8</option>`);
                $('#model').append(`<option value="M2">M2</option>`);
                $('#model').append(`<option value="M3">M3</option>`);
                $('#model').append(`<option value="M4">M4</option>`);
                $('#model').append(`<option value="M6">M6</option>`);
                $('#model').append(`<option value="Série 1">Série 1</option>`);
                $('#model').append(`<option value="Série 2">Série 2</option>`);
                $('#model').append(`<option value="Série 2 Active">Série 2 Active</option>`);
                $('#model').append(`<option value="Série 3">Série 3</option>`);
                $('#model').append(`<option value="Série 4">Série 4</option>`);
                $('#model').append(`<option value="Série 4 GRAND">Série 4 GRAND</option>`);
                $('#model').append(`<option value="Série 5">Série 5</option>`);
                $('#model').append(`<option value="Série 6">Série 6</option>`);
                $('#model').append(`<option value="Série 6 GRAND">Série 6 GRAND</option>`);
                $('#model').append(`<option value="Série 7">Série 7</option>`);
                $('#model').append(`<option value="Série 8">Série 8</option>`);
                $('#model').append(`<option value="X1">X1</option>`);
                $('#model').append(`<option value="X2">X2</option>`);
                $('#model').append(`<option value="X3">X3</option>`);
                $('#model').append(`<option value="X4">X4</option>`);
                $('#model').append(`<option value="X6">X6</option>`);
                $('#model').append(`<option value="X6 M">X6 M</option>`);
                $('#model').append(`<option value="X7">X7</option>`);
                $('#model').append(`<option value="Z3">Z3</option>`);
                $('#model').append(`<option value="Z4">Z4</option>`);
                $('#model').append(`<option value="Z4 Roadstar">Z4 Roadstar</option>`);
            }
            if($("#marque").val() == "Nissan"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="370 Z">370 Z</option>`);
                $('#model').append(`<option value="EVALIA">EVALIA</option>`);
                $('#model').append(`<option value="GT R">GT R</option>`);
                $('#model').append(`<option value="Juke">Juke</option>`);
                $('#model').append(`<option value="Leaf">Leaf</option>`);
                $('#model').append(`<option value="Micra">Micra</option>`);
                $('#model').append(`<option value="Murano">Murano</option>`);
                $('#model').append(`<option value="NV 200">NV 200</option>`);
                $('#model').append(`<option value="Navara">Navara</option>`);
                $('#model').append(`<option value="Note">Note</option>`);
                $('#model').append(`<option value="Pathfinder">Pathfinder</option>`);
                $('#model').append(`<option value="Pixo">Pixo</option>`);
                $('#model').append(`<option value="Primastar Avantour">Primastar Avantour</option>`);
                $('#model').append(`<option value="Primera">Primera</option>`);
                $('#model').append(`<option value="Pulsar">Pulsar</option>`);
                $('#model').append(`<option value="Qashqai">Qashqai</option>`);
                $('#model').append(`<option value="Qashqai +2">Qashqai +2</option>`);
                $('#model').append(`<option value="Xtrail">Xtrail</option>`);
            }
            if($("#marque").val() == "Toyota"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="Auris">Auris</option>`);
                $('#model').append(`<option value="Auris Sports">Auris Sports</option>`);
                $('#model').append(`<option value="Avensis">Avensis</option>`);
                $('#model').append(`<option value="Aygo">Aygo</option>`);
                $('#model').append(`<option value="C-hr">C-hr</option>`);
                $('#model').append(`<option value="Corolla">Corolla</option>`);
                $('#model').append(`<option value="GT86">GT86</option>`);
                $('#model').append(`<option value="IQ">IQ</option>`);
                $('#model').append(`<option value="Land cruiser">Land cruiser</option>`);
                $('#model').append(`<option value="MR">MR</option>`);
                $('#model').append(`<option value="Pirus">Pirus</option>`);
                $('#model').append(`<option value="Pirus+">Pirus+</option>`);
                $('#model').append(`<option value="Porace verso">Porace verso</option>`);
                $('#model').append(`<option value="RAV 4">RAV 4</option>`);
                $('#model').append(`<option value="Supra">Supra</option>`);
                $('#model').append(`<option value="Urban cruiser">Urban cruiser</option>`);
                $('#model').append(`<option value="Verso">Verso</option>`);
                $('#model').append(`<option value="Versos">Versos</option>`);
                $('#model').append(`<option value="Yaris">Yaris</option>`);
            }
            if($("#marque").val() == "Ford"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="Bmax">Bmax</option>`);
                $('#model').append(`<option value="Bronco">Bronco</option>`);
                $('#model').append(`<option value="Cmax">Cmax</option>`);
                $('#model').append(`<option value="Deluxe">Deluxe</option>`);
                $('#model').append(`<option value="Ecosport">Ecosport</option>`);
                $('#model').append(`<option value="Edge">Edge</option>`);
                $('#model').append(`<option value="Exploror">Exploror</option>`);
                $('#model').append(`<option value="F 100">F 100</option>`);
                $('#model').append(`<option value="F 150">F 150</option>`);
                $('#model').append(`<option value="F 250">F 250</option>`);
                $('#model').append(`<option value="FOCUS">FOCUS</option>`);
                $('#model').append(`<option value="Fusion">Fusion</option>`);
                $('#model').append(`<option value="Galaxie 500">Galaxie 500</option>`);
                $('#model').append(`<option value="GRAND Cmax">GRAND Cmax</option>`);
                $('#model').append(`<option value="KA">KA</option>`);
                $('#model').append(`<option value="Kuga">Kuga</option>`);
                $('#model').append(`<option value="Model A">Model A</option>`);
                $('#model').append(`<option value="Mondeo">Mondeo</option>`);
                $('#model').append(`<option value="Mustang">Mustang</option>`);
                $('#model').append(`<option value="puma">puma</option>`);
                $('#model').append(`<option value="Ranchero">Ranchero</option>`);
                $('#model').append(`<option value="Ranger">Ranger</option>`);
                $('#model').append(`<option value="Smax">Smax</option>`);
                $('#model').append(`<option value="Thunderbird">Thunderbird</option>`);
                $('#model').append(`<option value="Tourneo connect">Tourneo connect</option>`);
                $('#model').append(`<option value="Tourneo courier">Tourneo courier</option>`);
                $('#model').append(`<option value="Tourneo custom">Tourneo custom</option>`);
                $('#model').append(`<option value="Transit Fourgon">Transit Fourgon</option>`);
                $('#model').append(`<option value="Transit kombi">Transit kombi</option>`);
                $('#model').append(`<option value="Vignale">Vignale</option>`);
            }
            if($("#marque").val() == "Audi"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="A1">A1</option>`);
                $('#model').append(`<option value="A3">A3</option>`);
                $('#model').append(`<option value="A4">A4</option>`);
                $('#model').append(`<option value="A5">A5</option>`);
                $('#model').append(`<option value="A6">A6</option>`);
                $('#model').append(`<option value="A7">A7</option>`);
                $('#model').append(`<option value="A8">A8</option>`);
                $('#model').append(`<option value="Allroad">Allroad</option>`);
                $('#model').append(`<option value="E-TRON">E-TRON</option>`);
                $('#model').append(`<option value="Q2">Q2</option>`);
                $('#model').append(`<option value="Q3">Q3</option>`);
                $('#model').append(`<option value="Q5">Q5</option>`);
                $('#model').append(`<option value="Q8">Q8</option>`);
                $('#model').append(`<option value="R8 GT">R8 GT</option>`);
                $('#model').append(`<option value="R8 SPYDER">R8 SPYDER</option>`);
                $('#model').append(`<option value="RS Q3">RS Q3</option>`);
                $('#model').append(`<option value="RS3">RS3</option>`);
                $('#model').append(`<option value="RS4">RS4</option>`);
                $('#model').append(`<option value="RS5">RS5</option>`);
                $('#model').append(`<option value="RS6">RS6</option>`);
                $('#model').append(`<option value="RS7">RS7</option>`);
                $('#model').append(`<option value="S1">S1</option>`);
                $('#model').append(`<option value="S3">S3</option>`);
                $('#model').append(`<option value="S4">S4</option>`);
                $('#model').append(`<option value="S5">S5</option>`);
                $('#model').append(`<option value="S6">S6</option>`);
                $('#model').append(`<option value="SQ5">SQ5</option>`);
                $('#model').append(`<option value="SQ7">SQ7</option>`);
                $('#model').append(`<option value="TT">TT</option>`);
                $('#model').append(`<option value="TT Roadstar">TT Roadstar</option>`);
                $('#model').append(`<option value="200">200</option>`);
            }
            if($("#marque").val() == "Fiat"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="124 Spider">124 Spider</option>`);
                $('#model').append(`<option value="500 C">500 C</option>`);
                $('#model').append(`<option value="500 L">500 L</option>`);
                $('#model').append(`<option value="500 L LIVING">500 L LIVING</option>`);
                $('#model').append(`<option value="500 X">500 X</option>`);
                $('#model').append(`<option value="Bravo">Bravo</option>`);
                $('#model').append(`<option value="Doblo">Doblo</option>`);
                $('#model').append(`<option value="Ducato">Ducato</option>`);
                $('#model').append(`<option value="Freemont">Freemont</option>`);
                $('#model').append(`<option value="Fullback">Fullback</option>`);
                $('#model').append(`<option value="Grande Punto">Grande Punto</option>`);
                $('#model').append(`<option value="Idea">Idea</option>`);
                $('#model').append(`<option value="Panda">Panda</option>`);
                $('#model').append(`<option value="Punto">Punto</option>`);
                $('#model').append(`<option value="Qubo">Qubo</option>`);
                $('#model').append(`<option value="Scudo">Scudo</option>`);
                $('#model').append(`<option value="Stilo">Stilo</option>`);
                $('#model').append(`<option value="Tipo">Tipo</option>`);
                $('#model').append(`<option value="500">500</option>`);
            }
            if($("#marque").val() == "Abarth"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="124 Spider">124 Spider</option>`);
                $('#model').append(`<option value="500 C">500 C</option>`);
                $('#model').append(`<option value="500">500</option>`);
                $('#model').append(`<option value="595">595</option>`);
                $('#model').append(`<option value="695">695</option>`);

            }
            if($("#marque").val() == "AC"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="Cobra">Cobra</option>`);

            }
            if($("#marque").val() == "Aixam"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="City">City</option>`);
                $('#model').append(`<option value="Coupe">Coupe</option>`);
                $('#model').append(`<option value="Crossline">Crossline</option>`);
                $('#model').append(`<option value="Crossover">Crossover</option>`);
                $('#model').append(`<option value="D-Truck">D-Truck</option>`);
                $('#model').append(`<option value="400">400</option>`);
                $('#model').append(`<option value="721">721</option>`);
                $('#model').append(`<option value="741">741</option>`);

            }
            if($("#marque").val() == "Alfa Romeo"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="GT">GT</option>`);
                $('#model').append(`<option value="GTV">GTV</option>`);
                $('#model').append(`<option value="Giulia">Giulia</option>`);
                $('#model').append(`<option value="Giulietta">Giulietta</option>`);
                $('#model').append(`<option value="Mito">Mito</option>`);
                $('#model').append(`<option value="Spider">Spider</option>`);
                $('#model').append(`<option value="Stelvio">Stelvio</option>`);
                $('#model').append(`<option value="147">147</option>`);
                $('#model').append(`<option value="159">159</option>`);
                $('#model').append(`<option value="159 Sportwagon">159 Sportwagon</option>`);

            }
            if($("#marque").val() == "Alpine"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="A110">A110</option>`);

            }
            if($("#marque").val() == "AMC"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="Javelin">Javelin</option>`);
                $('#model').append(`<option value="Rambler Martin">Rambler Martin</option>`);

            }
            if($("#marque").val() == "Aston Martin"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="Cygnet">Cygnet</option>`);
                $('#model').append(`<option value="DB11">DB11</option>`);
                $('#model').append(`<option value="DB 9 GT">DB 9 GT</option>`);
                $('#model').append(`<option value="DBS">DBS</option>`);
                $('#model').append(`<option value="Rapide S">Rapide S</option>`);
                $('#model').append(`<option value="V8">V8</option>`);
                $('#model').append(`<option value="Vantage">Vantage</option>`);
                $('#model').append(`<option value="Vanquish">Vanquish</option>`);
            }
            if($("#marque").val() == "Austin Healey"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="Healey Spirit">Healey Spirit</option>`);
                $('#model').append(`<option value="7">7</option>`);
                $('#model').append(`<option value="100">100</option>`);
                $('#model').append(`<option value="3000">3000</option>`);

            }
            if($("#marque").val() == "Autobianchi"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value=""></option>`);

            }
            if($("#marque").val() == "Auverland"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value=""></option>`);

            }
            if($("#marque").val() == "Bellier"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="Docker">Docker</option>`);

            }
            if($("#marque").val() == "Bentley"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="Arnage">Arnage</option>`);
                $('#model').append(`<option value="Bentayga">Bentayga</option>`);
                $('#model').append(`<option value="Continenetal">Continenetal</option>`);
                $('#model').append(`<option value="Flying Spur">Flying Spur</option>`);
                $('#model').append(`<option value="Mark 6">Mark 6</option>`);
                $('#model').append(`<option value="S1">S1</option>`);
                $('#model').append(`<option value="S3">S3</option>`);
                $('#model').append(`<option value="T1">T1</option>`);
                $('#model').append(`<option value="Turbo R">Turbo R</option>`);
            }
            if($("#marque").val() == "Bluecar"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="Bluesummer">Bluesummer</option>`);
            }
            if($("#marque").val() == "Buick"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="Electra">Electra</option>`);
                $('#model').append(`<option value="Gransport">Gransport</option>`);
                $('#model').append(`<option value="lesabre">lesabre</option>`);
                $('#model').append(`<option value="Riviera">Riviera</option>`);
                $('#model').append(`<option value="Roadmaster">Roadmaster</option>`);
                $('#model').append(`<option value="skylark">skylark</option>`);
                $('#model').append(`<option value="Special">Special</option>`);
                $('#model').append(`<option value="Super riviera Hardtop">Super riviera Hardtop</option>`);

            }
            if($("#marque").val() == "Cadillac"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="60S">60S</option>`);
                $('#model').append(`<option value="CTS">CTS</option>`);
                $('#model').append(`<option value="Deville">Deville</option>`);
                $('#model').append(`<option value="Eldorado">Eldorado</option>`);
                $('#model').append(`<option value="Escalade">Escalade</option>`);
                $('#model').append(`<option value="Fleetwood">Fleetwood</option>`);
                $('#model').append(`<option value="SRX">SRX</option>`);
                $('#model').append(`<option value="Série 61">Série 61</option>`);
                $('#model').append(`<option value="XT 5">XT 5</option>`);
                $('#model').append(`<option value="62">62</option>`);

            }
            if($("#marque").val() == "Casalini"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="M14">M14</option>`);
                $('#model').append(`<option value="M20">M20</option>`);
            }
            if($("#marque").val() == "Chatenet"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="CH 26">CH 26</option>`);
                $('#model').append(`<option value="CH 40">CH 40</option>`);
                $('#model').append(`<option value="CH 46">CH 46</option>`);
            }
            if($("#marque").val() == "Chevrolet"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="Aveo">Aveo</option>`);
                $('#model').append(`<option value="Bel Air">Bel Air</option>`);
                $('#model').append(`<option value="Blazer">Blazer</option>`);
                $('#model').append(`<option value="C10">C10</option>`);
                $('#model').append(`<option value="C2">C2</option>`);
                $('#model').append(`<option value="Camaro">Camaro</option>`);
                $('#model').append(`<option value="Caprice">Caprice</option>`);
                $('#model').append(`<option value="Captiva">Captiva</option>`);
                $('#model').append(`<option value="Chevelle">Chevelle</option>`);
                $('#model').append(`<option value="Corvair">Corvair</option>`);
                $('#model').append(`<option value="Corvette">Corvette</option>`);
                $('#model').append(`<option value="Cruze">Cruze</option>`);
                $('#model').append(`<option value="El camino">El camino</option>`);
                $('#model').append(`<option value="Impala">Impala</option>`);
                $('#model').append(`<option value="Kalos">Kalos</option>`);
                $('#model').append(`<option value="Malibu">Malibu</option>`);
                $('#model').append(`<option value="Matiz">Matiz</option>`);
                $('#model').append(`<option value="Monte Carlo">Monte Carlo</option>`);
                $('#model').append(`<option value="Nova">Nova</option>`);
                $('#model').append(`<option value="Nubira">Nubira</option>`);
                $('#model').append(`<option value="Orlando">Orlando</option>`);
                $('#model').append(`<option value="Silverado">Silverado</option>`);
                $('#model').append(`<option value="Spark">Spark</option>`);
                $('#model').append(`<option value="Trax">Trax</option>`);
                $('#model').append(`<option value="210">210</option>`);
                $('#model').append(`<option value="3100">3100</option>`);
            }
            if($("#marque").val() == "Chrysler"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="300C">300C</option>`);
                $('#model').append(`<option value="Grand Voyager">Grand Voyager</option>`);
                $('#model').append(`<option value="Le baron">Le baron</option>`);
                $('#model').append(`<option value="New yorker">New yorker</option>`);
                $('#model').append(`<option value="PT Cruiser">PT Cruiser</option>`);
                $('#model').append(`<option value="Sebring">Sebring</option>`);
            }
            if($("#marque").val() == "Cord"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="810">810</option>`);
            }
            if($("#marque").val() == "Corvette"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="C3">C3</option>`);
                $('#model').append(`<option value="C6">C6</option>`);
                $('#model').append(`<option value="C7">C7</option>`);
                $('#model').append(`<option value="Grand sport">Grand sport</option>`);
                $('#model').append(`<option value="ZO 6">ZO 6</option>`);
            }
            if($("#marque").val() == "Dacia"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="Dokker">Dokker</option>`);
                $('#model').append(`<option value="Duster">Duster</option>`);
                $('#model').append(`<option value="Logan">Logan</option>`);
                $('#model').append(`<option value="Lodgy">Lodgy</option>`);
                $('#model').append(`<option value="Logan MCV">Logan MCV</option>`);
                $('#model').append(`<option value="Sandero">Sandero</option>`);
                $('#model').append(`<option value="Sandero stepway">Sandero stepway</option>`);
                $('#model').append(`<option value="Techroad">Techroad</option>`);
            }
            if($("#marque").val() == "Daihatsu"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="Cuore">Cuore</option>`);
                $('#model').append(`<option value="Sirion">Sirion</option>`);
                $('#model').append(`<option value="Trevis">Trevis</option>`);
            }
            if($("#marque").val() == "Dodge"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="Caliber">Caliber</option>`);
                $('#model').append(`<option value="Challenger">Challenger</option>`);
                $('#model').append(`<option value="Charger">Charger</option>`);
                $('#model').append(`<option value="Coronet">Coronet</option>`);
                $('#model').append(`<option value="D100">D100</option>`);
                $('#model').append(`<option value="Dart">Dart</option>`);
                $('#model').append(`<option value="Ram">Ram</option>`);
            }
            if($("#marque").val() == "Honda"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="Accord">Accord</option>`);
                $('#model').append(`<option value="Civic">Civic</option>`);
                $('#model').append(`<option value="Cr-V">Cr-V</option>`);
                $('#model').append(`<option value="E">E</option>`);
                $('#model').append(`<option value="Hr-V">Hr-V</option>`);
                $('#model').append(`<option value="Jazz">Jazz</option>`);
                $('#model').append(`<option value="NSX">NSX</option>`);
                $('#model').append(`<option value="Cr-Z">Cr-Z</option>`);
                $('#model').append(`<option value="Insight">Insight</option>`);
                $('#model').append(`<option value="Integra">Integra</option>`);
                $('#model').append(`<option value="Legend">Legend</option>`);
                $('#model').append(`<option value="stream">stream</option>`);
            }
            if($("#marque").val() == "Hyundai"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="i10">i10</option>`);
                $('#model').append(`<option value="i20">i20</option>`);
                $('#model').append(`<option value="I30">I30</option>`);
                $('#model').append(`<option value="Kona">Kona</option>`);
                $('#model').append(`<option value="ioniq">ioniq</option>`);
                $('#model').append(`<option value="Nexo">Nexo</option>`);
                $('#model').append(`<option value="Tucson">Tucson</option>`);
                $('#model').append(`<option value="Santa FE">Santa FE</option>`);
                $('#model').append(`<option value="Accent">Accent</option>`);
                $('#model').append(`<option value="Coupe">Coupe</option>`);
                $('#model').append(`<option value="Elantra">Elantra</option>`);
                $('#model').append(`<option value="I40">I40</option>`);
                $('#model').append(`<option value="IX20">IX20</option>`);
                $('#model').append(`<option value="IX35">IX35</option>`);
                $('#model').append(`<option value="IX55">IX55</option>`);

            }
            if($("#marque").val() == "Land rover"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="Defender">Defender</option>`);
                $('#model').append(`<option value="Discovery">Discovery</option>`);
                $('#model').append(`<option value="Discovery sport">Discovery sport</option>`);
                $('#model').append(`<option value="Range Rover">Range Rover</option>`);
                $('#model').append(`<option value="Range rover sport">Range rover sport</option>`);
                $('#model').append(`<option value="Range Rover Velar">Range Rover Velar</option>`);
                $('#model').append(`<option value="Freelander">Freelander</option>`);
                $('#model').append(`<option value="Land">Land</option>`);
                $('#model').append(`<option value="DC100">DC100</option>`);
                $('#model').append(`<option value="DC100 sport">DC100 sport</option>`);
                $('#model').append(`<option value="Hybride rechargeable">Hybride rechargeable</option>`);

            }
            if($("#marque").val() == "Jaguar"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="E-Pace">E-Pace</option>`);
                $('#model').append(`<option value="F-Pace">F-Pace</option>`);
                $('#model').append(`<option value="F-type">F-type</option>`);
                $('#model').append(`<option value="I-Pace">I-Pace</option>`);
                $('#model').append(`<option value="Xe">Xe</option>`);
                $('#model').append(`<option value="Xf">Xf</option>`);
                $('#model').append(`<option value="Xj">Xj</option>`);
                $('#model').append(`<option value="S-type">S-type</option>`);
                $('#model').append(`<option value="X-type">X-type</option>`);
                $('#model').append(`<option value="Xk">Xk</option>`);

            }
            if($("#marque").val() == "Volvo"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="Fm9">Fm9</option>`);
                $('#model').append(`<option value="S60">S60</option>`);
                $('#model').append(`<option value="S90">S90</option>`);
                $('#model').append(`<option value="V40">V40</option>`);
                $('#model').append(`<option value="V40 Cross country">V40 Cross country</option>`);
                $('#model').append(`<option value="V60">V60</option>`);
                $('#model').append(`<option value="V60 Cross country">V60 Cross country</option>`);
                $('#model').append(`<option value="V90">V90</option>`);
                $('#model').append(`<option value="S60">S60</option>`);
                $('#model').append(`<option value="S90">S90</option>`);
                $('#model').append(`<option value="Xc 40">Xc 40</option>`);
                $('#model').append(`<option value="Xc 90">Xc 90</option>`);
                $('#model').append(`<option value="Xc 60">Xc 60</option>`);
                $('#model').append(`<option value="V90 Cross country">V90 Cross country</option>`);
                $('#model').append(`<option value="C70">C70</option>`);
                $('#model').append(`<option value="C30">C30</option>`);
                $('#model').append(`<option value="S40">S40</option>`);
                $('#model').append(`<option value="S80">S80</option>`);
                $('#model').append(`<option value="Xc70">Xc70</option>`);
            }
            if($("#marque").val() == "Kia"){
                $('#model').empty();
                $('#model').append(`<option value="0">Choisire modèle</option>`);
                $('#model').append(`<option value="Ceed">Ceed</option>`);
                $('#model').append(`<option value="E-Niro">E-Niro</option>`);
                $('#model').append(`<option value="E-Soul">E-Soul</option>`);
                $('#model').append(`<option value="Niro">Niro</option>`);
                $('#model').append(`<option value="Optima">Optima</option>`);
                $('#model').append(`<option value="Picanto">Picanto</option>`);
                $('#model').append(`<option value="Proceed">Proceed</option>`);
                $('#model').append(`<option value="Rio">Rio</option>`);
                $('#model').append(`<option value="Sorento">Sorento</option>`);
                $('#model').append(`<option value="Stinger">Stinger</option>`);
                $('#model').append(`<option value="Sportage">Sportage</option>`);
                $('#model').append(`<option value="Xceed">Xceed</option>`);
                $('#model').append(`<option value="Stonic">Stonic</option>`);
                $('#model').append(`<option value="Carens">Carens</option>`);
                $('#model').append(`<option value="Cerato">Cerato</option>`);
                $('#model').append(`<option value="Rocsta">Rocsta</option>`);
                $('#model').append(`<option value="Venga">Venga</option>`);
                $('#model').append(`<option value="Cross GT">Cross GT</option>`);
                $('#model').append(`<option value="GT">GT</option>`);
                $('#model').append(`<option value="KCV">KCV</option>`);
            }
        });
        $("#autres").hide();
        $("#nom_boutique").hide();
    });
    
    function showBoutique(){
        $("#autres").hide();
        $("#nom_boutique").toggle();
    }
    function showAutres(){
        $("#nom_boutique").hide();
        $("#autres").toggle();

    }


</script>
@endsection