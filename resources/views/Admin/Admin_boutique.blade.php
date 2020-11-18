<link rel='stylesheet' href="/css/popup.css">
<link rel='stylesheet' href="/css/confirmation.css">
<link rel='stylesheet' href="/css/articles.css">
<link rel='stylesheet' href="/css/select_css.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@include('Components.dashboard')
@yield('dashboard')
	@if(session('success'))
		<div class="animated fadeOut success">{{session('success')}}</div>
	@endif
	<div class="text_header">Liste des Boutiques Professionnels</div>
        <form class="contact100-form validate-form" method="post" action="{{ action('AdminController@searchBoutique') }}">
        @csrf
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <div class="select">
                            <select name="ville" id="slct">
                                <option selected disabled>Choisir Ville</option>
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
                    </div>
                    
                    <div class="col-3">
                        <div class="select">
                            <select name="date" id="slct">
                                <option value="0">Choisir Date</option>
                                @foreach($dates as $a)
                                    <option>{{$a}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <input type="image" src="/project_images/search.png" style="width:70px">
                    </div>
                </div>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Date</th>
                <th scope="col">Boutique</th>
                <th scope="col">Description</th>
                <th scope="col">Client</th>
                <th scope="col">Email</th>
                <th scope="col">Telephone</th>
                <th scope="col">Ville</th>
                <th scope="col">Type</th>
                <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($boutique as $b)
                @if( date('Y-m-d')  == $b->created_at->format('Y-m-d'))
                    <tr style="background-color:#FFCB8F">
                @else
                    <tr>
                @endif
                
                <td style="text-align:left">{{$b->created_at->format('d-m-Y')}}</td>
                <td style="text-align:left">{{$b->nom_boutique}}</td>
                <td style="text-align:left">{{$b->description_boutique}}</td>
                <td style="text-align:left">{{$b->user->nom}} &nbsp {{$b->user->prenom}}</td>
                <td style="text-align:left">{{$b->user->email}}</td>
                <td style="text-align:left">{{$b->user->telephone}} </td>
                <td style="text-align:left">{{$b->ville_boutique}} </td>
                <td style="text-align:left">
                    <form id="type_form" method="POST" action="{{ action ('AdminController@changerTypeBoutique') }}">
                    @csrf
                        <input type="hidden" name="boutique_id" value="{{$b->id}}">
                        <select name="boutique_type" id="boutique_type">
                            @if($b->type)
                                <option value="0"  >Normal</option>
                                <option  value="1" selected>Pro</option>
                            @else
                                <option value="0"  selected>Normal</option>
                                <option  value="1" >Pro</option>
                            @endif
                        </select>
                    </form>
                </td>
                <td style="text-align:left"><a href="/Admin/supprimer_boutique/{{$b->id}}"><img src="/project_images/bin.png" width="20%"></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>       
<script>

$("#boutique_type").change(function(e){
    $('#type_form').submit();
});
</script>