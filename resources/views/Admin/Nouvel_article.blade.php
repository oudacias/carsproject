<!DOCTYPE html>
<html lang="en">
<head>
    <title>Articles</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/articles.css">
</head>
<body>
@include('Components.dashboard')
@yield('dashboard')
@if(session('success'))
		<div class="animated fadeOut success">{{session('success')}}</div>
	@endif
<div class="container-contact100">
    <div class="wrap-contact100">
        <form class="contact100-form validate-form" method="post" action="{{ action('AdminController@insererArticle') }}" enctype="multipart/form-data">
                @csrf
			<span class="contact100-form-title">
				Ajouter Article
			</span>
            <div class="wrap-input100 validate-input" data-validate="Please enter your name">
                <input class="input100" type="text" name="titre" placeholder="Titre">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate = "Please enter your message">
                <textarea class="input100" name="texte" placeholder="Rédiger Article"></textarea>
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Please enter your name">
                <input class="input100" type="text" name="lien_youtube" placeholder="Lien Youtube">
                <span class="focus-input100"></span>
            </div>
            <div class="image-upload">
                <label for="file-input">
                    <img src="/project_images/landscape.png"/>
                </label>
                <input id="file-input" type="file" name="lien_image"/>
            </div>
            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn">
                    Ajouter Article
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
