@section('dashboard')
<link rel="stylesheet" href="/css/dashboard.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" type="text/css" href="/css/menu.css">

<div class="row">
    <div class="col-md-4 img-index">
	<img class="logo-menu" src="/project_images/logoCars.png">
		<nav>
			<ul class="mcd-menu" style="padding-top: 100px">
			<p class="admin">Espace Administrateur</p>

				<li>
					<a href="/Admin/Admin_articles">
						Nos articles
					</a>
				</li>
				<li>
					<a href="/Admin/Nouvel_article">
						+ Article
					</a>
				</li>
				<li>
					<a href="/Admin/Admin_forum">Forum</a>
				</li>
				<li>
					<a href="/Admin/Admin_users">
						Utilisateurs
					</a>
				</li>
				<li>
					<a href="/Admin/Admin_diagnostic">
						Diagnostique
					</a>
				</li>
				<li>
					<a href="/Admin/Admin_suivi">
						Suivi
					</a>
				</li>
				<li>
					<a href="/Admin/Admin_boutique">
						Boutiques
					</a>
				</li>
				<li>
					<a href="/Admin/Admin_voiture">
						Voitures
					</a>
				</li>
				<li>
					<a href="/Admin/Admin_click">
						Voitures click
					</a>
				</li>
			</ul>
		</nav>
    </div>
<div class="container13">
<label class="dropdown">

<div class="dd-button">
  <img src="/project_images/user.png" width="27px">
</div>
<input type="checkbox" class="dd-input" id="test">
<ul class="dd-menu">
@if(Auth::check())
<li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
Se Déconnecter</a></li>
<form id="logout-form" action="{{ route('logout') }}" method="POST">
	@csrf
</form>
@endif
</ul>

  </label>
    <div class="dashboard_container">  
@endsection
    
    </div>
</div>
</div>

