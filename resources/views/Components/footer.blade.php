<link rel="stylesheet" href='/css/footer.css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@section('footer')
<a onclick="topFunction()" id="myBtn" title="Go to top"><img src="/project_images/scroll_top.png" width="20px"></a>

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="copyright-text">Copyright &copy; 2020 Tous droits résérvés
                    <a href="#">EOCARS</a>.
                </p>   
            </div>
            <div class="col-md-5">
                    <ul class="social-icons">
                        <li><a class="facebook" href="https://www.facebook.com/ELAMDASSI"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="instagram" href="https://www.instagram.com/elamdassi_on_cars/"><i class="fa fa-instagram"></i></a></li>
                    </ul>
            </div>
        </div>
    </div>
</footer>
<script>
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction(e) {
document.body.scrollTop = 0;
document.documentElement.scrollTop = 0;
}

</script>
@endsection