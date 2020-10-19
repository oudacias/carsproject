@section('dashboard')
<link rel="stylesheet" href="/css/dashboard.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/confirmation.css">
<link rel="stylesheet" type="text/css" href="/css/menu.css">
<script src="https://js.pusher.com/4.2/pusher.min.js"></script>
<script src="/javascript/notification.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




<div class="row">
    <div class="col-md-4 img-index">
	<a href="/"><img class="logo-menu" src="/project_images/logoCars.png"></a>
		<nav>
			<ul class="mcd-menu" style="padding-top: 130px">
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
						Utilisateurs <span id="notification_user" style="background-color:#E3BDBD;border-radius:50%;padding:5px 6px;font-size:10px"></span>
					</a>
				</li>
				<li>
					<a href="/Admin/Admin_suivi">
						Suivi <span id="notification_count" style="background-color:#E3BDBD;border-radius:50%;padding:5px 6px;font-size:10px"></span>
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
				<li>
					<a href="/Publicite/index">
						+ Publicité
					</a>
				</li>
				<li>
					<a href="/Publicite/supprimerPub">
						Publicités
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
	<div class="animated fadeOut notifications" id="notify_fournisseur">Un fournisseur vient de s'inscrire</div>
	<div class="animated fadeOut notifications" id="notify_particulier">Un particuler vient de s'inscrire</div>
	<div class="animated fadeOut notifications" id="notify_conseil">Une demande de conseil est reçue</div>


<script>  
	$('#notify_conseil').hide();
	$('#notify_fournisseur').hide();
	$('#notify_particulier').hide();
	var channel = pusher.subscribe('notifyadmin');
	var notif_array = @json(Auth::user()->notificationadminservice);
	var notif_count =  {{Auth::user()->notificationadminservice->count()}}
	
	if(notif_count == 0 ){
      document.getElementById("notification_count").style.visibility = "hidden";
    }else{
      document.getElementById("notification_count").style.visibility = "visible";
      document.getElementById("notification_count").textContent= notif_count;
	}


	var notif_array_user = @json(Auth::user()->notificationadminuser);
	var notif_count_user =  {{Auth::user()->notificationadminuser->count()}}
	if(notif_count_user == 0 ){
      document.getElementById("notification_user").style.visibility = "hidden";
    }else{
      document.getElementById("notification_user").style.visibility = "visible";
      document.getElementById("notification_user").textContent= notif_count_user;
	}

	channel.bind('notify-event', function(message) {
		if(message["type_notification"] == "service"){
			notif_count += 1;  
			document.getElementById("notification_count").textContent= notif_count;
			document.getElementById("notification_count").style.visibility = "visible";
			$('#notify_conseil').show();

		}else if(message["type_notification"] == "fournisseur" || message["type_notification"] == "particulier"){
			notif_count_user += 1;  
			document.getElementById("notification_user").textContent= notif_count_user;
			document.getElementById("notification_user").style.visibility = "visible";

			if(message["type_notification"] == "fournisseur"){
				$('#notify_fournisseur').show();
			}else if(message["type_notification"] == "particulier"){
				$('#notify_particulier').show();
			}
		}

    });

</script>
@endsection
    
    </div>
</div>
</div>