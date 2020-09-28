@section('menu')
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
<link rel="stylesheet" type="text/css" href="/css/menu.css">
<link rel="stylesheet" type="text/css" href="/css/article.css">
<link rel="stylesheet" type="text/css" href="/css/notification.css">
<script src="https://js.pusher.com/4.2/pusher.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<script src="/javascript/notification.js" type="text/javascript"></script>
<img class="logo-menu" src="/project_images/logoCars.png">

<header class="header">
<div class = "icons">
  <div class = "notification">
    <a href = "#">
      <div class = "notBtn" href = "#">
        <i style="margin-top:-20px" class="fas fa-user"></i>
        <div class = "box" style="text-align:center;width:200px;left:-160px">
          <div class = "display">
            <div class = "cont">
            @if(!Auth::check())
              <div class = "sec old">
                <a href = "/login">
                  <div class = "txts">Se connecter</div>
                </a>
              </div>
              <div class = "sec old">
                <a href = "/register">
                  <div class = "txts">S'enregistrer</div>
                </a>
              </div>
            @else
              <div class = "sec old">
              @if(Auth::user()->role == "administrateur")<a href = "/Admin/Admin_articles">@else<a href = "/profile">@endif
                  <div class = "txts">Mon Profile</div>
                </a>
              </div>
              <div class = "sec old">
                <a href = "/modifierProfile">
                  <div class = "txts">Modifier mon profile</div>
                </a>
              </div>
              <div class = "sec old">
              <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <div class = "txts">Se déconnecter</div>
                </a>
              </div>
              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                  @csrf
              </form>
            @endif
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
</div>
<div class = "icons">
  <div class = "notification">
    <a href = "#">
      <div class = "notBtn" href = "#">
        <div style="margin-top:-20px" id="notification_count" class = "number"></div>
        <i style="margin-top:-20px" class="fas fa-bell" ></i>
        <div class = "box" id="box">
            <div class = "cont" style="text-align: center" id="notif">
              
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
</div>
  <a href="/" class="logo" style="color:white;font-size:16px">ELAMDASSI ON CARS</a>
  <input class="menu-btn" type="checkbox" id="menu-btn" />
  <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
  <ul class="menu">
    <li><a class="menugap" href="/">Accueil</a></li>
    <li><a class="menugap" href="/Services/service_suivi">Services Conseil</a></li>
    <li><a class="menugap" href="/Forum/Forums">Forum</a></li>
    <li><a class="menugap" href="/Articles/Articles">Magazine</a></li>
    <li><a class="menugap" href="/Boutique/boutique">Boutique</a></li>
    <li><a class="menugap" href="/Contact/contact">Contact</a></li>
    </ul>
</header>

<div class="gap">
<body>
@if(Auth::check())
<script>  
    var channel = pusher.subscribe('notify'+ {{Auth::id()}});
    var notif_array = @json(Auth::user()->notificationforum);
    var notif_count =  {{Auth::user()->notificationforum->count()}}
    if(notif_count == 0){
      document.getElementById("notification_count").style.visibility = "hidden";
      document.getElementById("box").style.display = "none";
    }else{
      document.getElementById("notification_count").style.visibility = "visible";
      document.getElementById("box").style.display = "block";
      document.getElementById("notification_count").textContent= notif_count;

      for(var i = 0; i < notif_array.length; i++) {
        var parentOb = document.getElementById('notif');
        var childEl = document.createElement('div');
        parentOb.prepend(childEl);
        childEl.setAttribute("id","notif_first_class");
        var child_id_class = document.getElementById("notif_first_class");
        child_id_class.classList.add("sec")
        child_id_class.classList.add("new")

        var closeObj = document.getElementById('notif_first_class');
        var closeElement = document.createElement('a');
        var texts = document.createTextNode("x");
        closeElement.href = "/close_notif/"+notif_array[i].id;
        closeElement.setAttribute("id","close_link");
        closeElement.appendChild(texts);
        closeObj.prepend(closeElement);
        var close_id_class = document.getElementById("close_link");
        close_id_class.classList.add("delete_notif")

        var parentObject = document.getElementById('notif_first_class');
        var childElement = document.createElement('a');
        var link = "/Forum/Forums/"+notif_array[i].forum_id
        childElement.href = link;
        childElement.setAttribute("id","notif_link");
        parentObject.appendChild(childElement);

        var parentO = document.getElementById('notif_link');
        var childE = document.createElement('div');
        var texts = document.createTextNode("Vous avez un nouveau commentaire dans le forum '"+notif_array[i].forum_nom+"'");
        childE.setAttribute("id","notif_msg");
        childE.appendChild(texts);
        parentO.appendChild(childE);
        var child_id = document.getElementById("notif_msg");
        child_id.classList.add("txt")
      }
    }
    channel.bind('notify-event', function(message) {
      if({{Auth::user()->id}} == message["user_id"]){
        notif_count += 1;  
        document.getElementById("notification_count").style.visibility = "visible";
        document.getElementById("box").style.display = "block";

        document.getElementById("notification_count").textContent= notif_count;
        notif_array.push(message);
        var parentOb = document.getElementById('notif');
        var childEl = document.createElement('div');
        parentOb.prepend(childEl);
        childEl.setAttribute("id","notif_first_class");
        var child_id_class = document.getElementById("notif_first_class");
        child_id_class.classList.add("sec")
        child_id_class.classList.add("new")

        var closeObj = document.getElementById('notif_first_class');
        var closeElement = document.createElement('a');
        var texts = document.createTextNode("x");
        closeElement.href = "/close_notif/"+message.id;
        closeElement.setAttribute("id","close_link");
        closeElement.appendChild(texts);
        closeObj.prepend(closeElement);
        var close_id_class = document.getElementById("close_link");
        close_id_class.classList.add("delete_notif")




        var parentObject = document.getElementById('notif_first_class');
        var childElement = document.createElement('a');
        childElement.href = "/Forum/Forums/"+message.forum_id;
        childElement.setAttribute("id","notif_link");
        parentObject.appendChild(childElement);


        var parentO = document.getElementById('notif_link');
        var childE = document.createElement('div');
        var texts = document.createTextNode("Vous avez un nouveau commentaire dans le forum '"+message.forum_nom+"'");
        childE.setAttribute("id","notif_msg");
        childE.appendChild(texts);
        parentO.appendChild(childE);
        var child_id = document.getElementById("notif_msg");
        child_id.classList.add("txt")
        



      }
    });
</script>
@else

<script>
  document.getElementById("notification_count").style.visibility = "hidden";
  document.getElementById("box").style.display = "none";

</script>
@endif



@endsection

