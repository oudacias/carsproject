<link rel="stylesheet" href="/css/mainstyle.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/popup.css">
<link rel="stylesheet" href="/css/articles.css">
<link rel="stylesheet" href="/css/confirmation.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title>Mes Forums</title>

@include('Components.menu')
@yield('menu')
@if(session('success'))
		<div class="animated fadeOut success">{{session('success')}}</div>
@endif
<div class="container">
<h4> Mes Forums </h4>
@foreach($forum as $f)
    <div class="row">
        <div class="col-12">
            <div class="card user-card">
                <div class="card-block">
                    <div class="card-introduction">
                        <div class="row">
                            <div class="col-1"><img src="/project_images/qa.png" width="80%"> </div>
                            <div class="col-9">
                            <a href="/ForumEocars/{{$f->id}}/{{$f->sujet_slug}}"><strong>{{$f->sujet}}</strong></a><br>
                                {{$f->texte}}
                            </div>
                            <div class="col-2">
                                <a href="/User/SupprimerForum/{{$f->id}}"><img src="/project_images/trash.png" width="20%"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    </div>
<div style="margin-top:100px">
@include('Components.footer')
@yield('footer')
</div>