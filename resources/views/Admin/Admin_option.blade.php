<link rel='stylesheet' href="/css/popup.css">
<link rel='stylesheet' href="/css/confirmation.css">
<link rel='stylesheet' href="/css/articles.css">
<link rel='stylesheet' href="/css/card.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>


@include('Components.dashboard')
@yield('dashboard')
@if(session('success'))
    <div class="animated fadeOut success">{{session('success')}}</div>
@endif
<body>
    <div class="container-contact100" id="seo">
        <div class="wrap-contact100">
            <form id="seo_form" class="contact100-form validate-form" method="post" action="{{ action('AdminController@ajouterSeo') }}" enctype="multipart/form-data">
                @csrf
                <h4>Ajouter Seo</h4>
                <label for="cars">Nom de la page : </label>
                    <select class="select-form" name="page" onchange="preview_page()" id="page_id">
                        <option value=0>------</option>
                        <option>Accueil</option>
                        <option>Suivi</option>
                        <option>Magazine</option>
                        <option>Boutique</option>
                        <option>Forum</option>
                        <option>Contact</option>
                    </select>
                <br>
                <br>
            <label>meta Description (max : 160 caractères)</label>
            <br>
            <span style="font-size:14px;color:grey" id="word_count"></span>
                <div class="wrap-input100 validate-input">
                    <textarea  id="description" type="text" name="description" style="height:150px;width:100%;padding:20px"></textarea>
                    <span class="focus-input100"></span>
                </div>
            <label>meta Keywords (max : 255 caractères)</label>
            <br>
            <span style="font-size:14px;color:grey" id="keywords_count"></span>
                <div class="wrap-input100 validate-input">
                    <textarea  id="keywords" type="text" name="keywords" style="height:150px;width:100%;padding:20px"></textarea>
                    <span class="focus-input100"></span>
                </div>
                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn">
                        Ajouter Seo
                    </button>
                </div>
            </form>
        </div>
    </div>
<!---------------------------------------------------------------->
    <div class="container-contact100" id="introduction">
        <div class="wrap-contact100">
            <form id="page_form" class="contact100-form validate-form" method="post" action="{{ action('AdminController@ajouterIntroPage') }}" enctype="multipart/form-data">
                @csrf
                <h4>Modifier Pages</h4>
                <label for="cars">Nom de la page : </label>
                <select class="select-form" name="page" onchange="preview_page_intro()" id="pageintro_id">
                    <option value="0">--------</option>
                    <option>Accueil</option>
                    <option>Suivi</option>
                    <option>Magazine</option>
                    <option>Boutique</option>
                    <option>Forum</option>
                    <option>Contact</option>
                </select>
                <br>
                <br>
            <label>Modifier/Ajouter Introduction</label>
            <br>
            <div class="wrap-input100 validate-input">
                <textarea type="text" id="introduction_id" name="introduction" style="height:200px;width:100%;padding:20px"></textarea>
                <span class="focus-input100"></span>
            </div>
            <label>Modifier/Ajouter Image</label>
            <br>
            <div class="image-upload">
                <label for="file-input">
                    <img id="add_modify" style="width:50px"/>
                </label>
                <input id="file-input" type="file" onchange="check_img()" name="lien_image" accept="image/x-png,image/jpeg">&nbsp;&nbsp;
                <img id="img_check" style="width:170px"/>
            </div>
                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn">
                        Modifier Page
                    </button>
                </div>
            </form>
        </div>
    </div>
<!---------------------------------------------------------------->
    <div class="container-contact100" id="introduction">
        <div class="wrap-contact100">
            <form id="design_form" class="contact100-form validate-form" method="post" action="{{ action('AdminController@modifierDesign') }}" enctype="multipart/form-data">
                @csrf
                <h4>Modifier Design</h4>
                <label for="cars">Changer Logo </label>
                <div class="image-upload">
                    <label for="file-input-logo">
                        <img src="/project_images/update.png" style="width:50px"/>
                    </label>
                    <input id="file-input-logo" type="file" onchange="check_img_logo()" name="lien_image" accept="image/x-png">&nbsp;&nbsp;
                    <img id="img_check_logo" style="width:100px"/>
                </div>
                <label>Changer Couleur Menu</label>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" id="menu_input" name="menu_color" placeholder="Couleur Menu" required>
                    <span class="focus-input100"></span>
                </div>
                <div>
                    <div id="color_menu" style="width:40px;height:40px;"></div>
                </div>
                <br>
                <label>Changer couleur Bouttons</label>
                <br>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" id="btn_input" name="button_color" placeholder="Couleur Bouttons" required>
                    <span class="focus-input100"></span>
                </div>
                <div>
                    <div id="color_btn" style="width:40px;height:40px;"></div>
                </div>
                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn">
                        Modifier Design
                    </button>
                </div>
            </form>
        </div>
    </div>
<!---------------------------------------------------------------->

<div class="container-contact100">
    <div class="wrap-contact100">
        <form id="social_form" class="contact100-form validate-form" method="post" action="{{ action('AdminController@modifierSocial') }}" enctype="multipart/form-data">
            @csrf
            <h4>Modifier Réseaux Sociaux</h4>
            
            <label>Facebook</label>
            <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="facebook" value="{{$social->facebook}}" required>
                <span class="focus-input100"></span>
            </div>
            <label>Instagram</label>
            <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="instagram" value="{{$social->instagram}}" required>
                <span class="focus-input100"></span>
            </div>
            <label>Whatsapp (212) </label>
            <div class="wrap-input100 validate-input">
                <input class="input100" type="number" id="whatsapp_input" name="whatsapp" value="{{ $social->whatsapp}}" required>
                <span class="focus-input100"></span>
            </div>
            <label>Gmail</label>
            <div class="wrap-input100 validate-input">
                <input class="input100" type="email" name="gmail" value="{{$social->gmail}}"required>
                <span class="focus-input100"></span>
            </div>
            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn">
                    Modifier 
                </button>
            </div>
        </form>
    </div>
</div>




</body>

<script>
    $("input#menu_input").keyup(function(e){
        $("#color_menu").css("background-color",$("#menu_input").val());
    });
    $("input#btn_input").keyup(function(e){
        $("#color_btn").css("background-color",$("#btn_input").val());
    });
    function preview_page(){
        $("#description").text("")
        $("#keywords").text("")
        @if($seo->count())
            @foreach($seo as $s)
                if( `{{$s->page}}` == $("#page_id").val()){
                    $("#description").text(`{{$s->description}}`)
                    $("#keywords").text(`{{$s->keywords}}`)
                }
            @endforeach
        @endif
    }
    function preview_page_intro(){
        $("#introduction_id").text("");
        $("#img_check").attr("src","/project_images/cancel.png");
        $("#img_check").css("width","20px");
        $("#add_modify").attr("src","/project_images/add.png");
        $("#add_modify").css("width","40px");
        @if($pagedata->count())
            @foreach($pagedata as $p)
                if(`{{$p->page}}` == $("#pageintro_id").val()){
                    $("#introduction_id").text(`{{$p->introduction}}`)
                    if(`{{$p->lien_img}}`){
                        $("#img_check").attr("src",`{{$p->lien_img}}`);
                        $("#img_check").css("width","170px");
                        $("#add_modify").attr("src","/project_images/update.png");
                    }else{
                        $("#add_modify").attr("src","/project_images/add.png");
                        $("#add_modify").css("width","20px");
                    }
                }
            @endforeach
        @endif
    }
    function check_img(){
        if($("#file-input").val().length > 0){
            $("#img_check").attr("src","/project_images/checked.png");
            $("#img_check").css("width","20px");
        }
        if($("#file-input").val().length == 0){
            $("#img_check").attr("src","/project_images/cancel.png");
        }
    }
    function check_img_logo(){
        if($("#file-input-logo").val().length > 0){
            $("#img_check_logo").attr("src","/project_images/checked.png");
            $("#img_check_logo").css("width","20px");
        }
        if($("#file-input-logo").val().length == 0){
            $("#img_check_logo").attr("src","/project_images/cancel.png");
        }
    }
    $(document).ready(function(){
        var isLogo = false;
            @if($design->logo)
                isLogo = true;
                $("#img_check_logo").attr("src",`{{$design->logo}}`)
            @endif
            @if($design->btn_color)
                $("input#btn_input").val(`{{$design->btn_color}}`)
                $("#color_btn").css("background-color",`{{$design->btn_color}}`);
            @endif
            @if($design->menu_color)
                $("input#menu_input").val(`{{$design->menu_color}}`)
                $("#color_menu").css("background-color",`{{$design->menu_color}}`);
            @endif

        $("textarea#description").keyup(function(e){
            var words = $("#description").val();
            $("#word_count").text("Nombre de caractères :" + words.length);
            if(words.length > 161){
                $("#word_count").text('le nombre de caractère ne doit pas dépasser 160')
                $("#word_count").css('color','red')
            }
        });
        $("textarea#keywords").keyup(function(e){
            var words = $("#keywords").val();
            $("#keywords_count").text("Nombre de caractères :" + words.length);
            if(words.length > 256){
                $("#keywords_count").text('le nombre de caractère ne doit pas dépasser 160')
                $("#keywords_count").css('color','red')

            }
        });
        $("#seo_form").submit(function(event){
            if($("#page_id").val()== "0"){
                event.preventDefault();
            }
            if($("#textarea#description").val().length > 161){
                e.preventDefault();
            }
            if($("#textarea#keywords").val().length > 256){
                e.preventDefault();
            }
        });
        $("#page_form").submit(function(e){
            if($("#pageintro_id").val()== "0"){
                e.preventDefault();
            }
        });
        $("#design_form").submit(function(e){
            if($("#file-input-logo").val().length == "0" && !isLogo){
                e.preventDefault();
                alert("Veuillez insérer un logo")
            }
        });
        $("#social_form").submit(function(e){
            if($("#whatsapp_input").val().length != 11 ){
                e.preventDefault();
                alert("Le numéro Whatsapp est invalide")
            }
        });
    });
</script>


</script>