<!DOCTYPE html>
<html lang="en">
<head>
    <title>Articles</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/articles.css') }}">
    <link rel="stylesheet" type="text/css" href="/css/articles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
@include('Components.dashboard')
@yield('dashboard')
@if(session('success'))
	<div class="animated fadeOut success">{{session('success')}}</div>
@endif
<div class="container-contact100">
    <div class="wrap-contact100">
        <form class="contact100-form validate-form" method="post" action="{{ action('AdminController@ModifierArticle') }}" enctype="multipart/form-data">
                @csrf
			<span class="contact100-form-title">
				Modifier Article
            </span>
            <input type="texte" name="id_article" value="{{$artc->id}}" hidden>
            <div class="wrap-input100 validate-input" >
                <input class="input100" type="text" name="titre" placeholder="Titre" value="{{$artc->titre}}">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate = "Please enter your message">
                <textarea class="input100" name="texte" placeholder="Rédiger Article">{!!html_entity_decode($artc->texte)!!}</textarea>
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" >
                <input class="input100" type="text" name="lien_youtube" placeholder="Lien Youtube" value="{{$artc->lien_youtube}}">
                <span class="focus-input100"></span>
            </div>
            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn">
                    <a>Modifier Article</a>
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
