<meta name="description" content="Contacter EOCARS dans ses différentes plateformes Facebook, Instagram, Whatsapp et Gmail">
<meta name="keywords" content="contact Eocars, contact voiture, achat voiture, achat voiture Facebook, Instagram, Whatsapp">

<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/popup.css">
<link rel="stylesheet" href="/css/articles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title>Eocars Contact</title>
@include('Components.menu')
@yield('menu')
<div class="container-contact100">
    <div class="wrap-contact100">
        <h3 style="color:#FAB107;text-align:center">Une question ? Une proposition ? Envoyez-nous un message :)</h3>
        <p id="copied">Email copié</p>
        <br>
        <div class="social">
            <a href="{{$social->facebook}}"><img alt="Facebook" class="social-img" src="/project_images/facebook.png"/></a>
            <a href="{{$social->instagram}}"><img alt="Instagram" class="social-img" src="/project_images/instagram.png"/></a>
            <a onclick="visitLink()"><img alt="Whatsapp" class="social-img" src="/project_images/whatsapp1.png"/></a>
            <a onclick="copyLink()"><img alt="Gmail" class="social-img" src="/project_images/gmail.png"/></a>
        </div>     
    </div>
</div>
<div style="margin-top:100px">
@include('Components.footer')
@yield('footer')
</div>

<script>
$(document).ready(function(){
    $("#copied").hide();   
});
    function copyLink(){
        var el = document.createElement('textarea');
        el.value = "{{$social->gmail}}";
        el.setAttribute('readonly', '');
        el.style = {position: 'absolute', left: '-9999px'};
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
        $("#copied").show();
        $("#copied").delay(500).fadeOut();
    }
    function visitLink(){
        if (/Mobi/.test(navigator.userAgent)) {
    }else{
        window.location.href = "whatsapp://send?phone="+{{$social->whatsapp}};
    }
        window.location.href = "https://web.whatsapp.com/send?phone="+{{$social->whatsapp}};
    }


    
</script>

  
