@section('menu')
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
<link rel="stylesheet" type="text/css" href="/css/menu.css">
<link rel="stylesheet" type="text/css" href="/css/article.css">
<div class="divider">
<img class="logo-menu" src="/project_images/logoCars.png">

<header class="header">
<div class="inverted-border-radius">
</div>
  <a href="" class="logo" style="color:white;font-size:20px">ELAMDASSI ON CARS</a>
  <input class="menu-btn" type="checkbox" id="menu-btn" />
  <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
  <ul class="menu">
    <li><a class="menugap" href="/">Accueil</a></li>
    <li><a class="menugap" href="/Services/service_suivi">Services Conseil</a></li>
    <!--<li><a class="menugap" href="/Services/service_diagnostic">Services Diagnostique</a></li>-->
    <li><a class="menugap" href="/Forum/Forums">Forum</a></li>
    <li><a class="menugap" href="/Articles/Articles">Magazine</a></li>
    <li><a class="menugap" href="/Boutique/boutique">Boutique</a></li>
    <li><a class="menugap" href="/Contact/contact">Contact</a></li>
    </ul><div class="pic_login">
   <label class="dropdown">

  <div class="dd-button">
    <img src="/project_images/user.png" width="27px">
  </div>
  <input type="checkbox" class="dd-input" id="test">
  <ul class="dd-menu">
  @if(!Auth::check())
    <li><a href='/login'>Se connecter</a></li>
    <li><a href='/register'>S'enregistrer</a></li>
  @else  
  
    <li>@if(Auth::user()->role == 'administrateur')<a href='/Admin/Admin_articles'>@else<a href='/profile'>@endif Mon Profil </a></li>
  <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
  Se Déconnecter</a></li>
  <form id="logout-form" action="{{ route('logout') }}" method="POST">
      @csrf
  </form>
  @endif
  </ul>
  
    </label></div>
</header>

<div class="gap">
<body>
@endsection