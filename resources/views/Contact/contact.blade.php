<!DOCTYPE html>
<html lang="en">
<head>
    <title>Articles</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/articles.css">
    <link rel='stylesheet' href="/css/confirmation.css">

</head>
<body>
@include('Components.menu')
@yield('menu')
<div class="container-contact100">
    <div class="wrap-contact100">
        <form method="POST" action="{{ action('UserController@AddContact')}}">
        @csrf
        
            <h3 style="color:#FAB107">Une question ? Une proposition ? Envoyez-nous un message :)</h3>
            <br>
            @if(session('success'))
		        <div class="animated fadeOut success">{{session('success')}}</div>
	        @endif
            
            <div class="wrap-input100 validate-input">
                @if(Auth::check())
                    <input class="input100" type="text" name="email" value="{{Auth::user()->email }}" readonly>
                @else
                    <input class="input100" type="text" name="email" placeholder="Votre Email" required>
                @endif
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="sujet" placeholder="Votre Sujet" required>
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input">
                <textarea class="text-contact" name="texte" placeholder="Votre Texte" required></textarea>
                <span class="focus-input100"></span>

            </div>  
            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn">
                    Envoyer
                </button>
            </div>
        </form>
    </div>
</div>

<script>


    
</script>

  
