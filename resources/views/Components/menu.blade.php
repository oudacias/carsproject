@section('menu')
<link rel="stylesheet" type="text/css" href="/css/menu.css">
<header class="header">
  <a href="" class="logo">LOGO</a>
  <input class="menu-btn" type="checkbox" id="menu-btn" />
  <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
  <ul class="menu">
    <li><a class="menugap" href="/">Accueil</a></li>
    <li><a class="menugap" href="#about">Services Conseil</a></li>
    <li><a class="menugap" href="#about">Services Diagnostique</a></li>
    <li><a class="menugap" href="/Forum/Forums">Forum</a></li>
    <li><a class="menugap" href="/Articles/Articles">Magazine</a></li>
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
    <li><a href='#'>Mon Profil</a></li>
  <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
  Se Déconnecter</a></li>
  <form id="logout-form" action="{{ route('logout') }}" method="POST">
      @csrf
  </form>
  @endif
  </ul>
  
    </label></div>
</header>
<div class="gap"></div>
@endsection