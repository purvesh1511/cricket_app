<!-- footer -->
<style>
    a#myBtn {
    display: none;
}
</style>
<footer class="footer">
    <div class="container pt-5">
        @php
            $footer_code_exists = \App\Models\Option::where('option_name', 'footer_code')->exists();
            if ($footer_code_exists) {
                $footer_code = \App\Models\Option::where('option_name', 'footer_code')->first()->option_value;
            } else {
                $footer_code = '';
            }
        @endphp
       
        {!! html_entity_decode($footer_code) !!}
    </div>
    <div class="offcanvas offcanvas-top min-vh-100 p-5" tabindex="-1" id="offcanvasTop"
        aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header ">
            <h5 class="header-form">Search</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body min-vh-100 p-5 d-flex justify-content-center">
            <form action="#" class="w-100">
                <div class="input-group d-flex align-items-start mt-5 mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i
                                class="fa-solid fa-magnifying-glass"></i></span>
                    </div>
                    <input type="text" name="search" class="form-control" id="searchinput" placeholder="Search..."
                        aria-label="Username" aria-describedby="basic-addon1" autocomplete="off" required>
                </div>
            </form>
        </div>
    </div>
</footer>
<a href="#" class="backToTop fas fa-arrow-up with-shadow totop-show" id="myBtn"></a>
<!-- footer -->
<!-- script -->
<!-- script end -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>


<script src="frontend/js/bootstrap.bundle.min.js"></script>
<!--<script src="frontend/js/jquery-2.2.0.min.js" type="text/javascript"></script>-->
<script type="text/javascript" src="frontend/js/slick/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="frontend/js/iziToast.min.js"></script>

<!-- main slider -->
<script type="text/javascript">
    $(".main-slider").slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        variableWidth: false,
        autoplay: false,
        dots: true,
        arrows: false,
        responsive: [{
                breakpoint: 767,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 1,
                    variableWidth: true,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 1
                }
            }
        ]
    });
</script>
<!-- best seller -->
<script type="text/javascript">
    $(".best-seller-loop-product").slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        variableWidth: false,
        autoplay: false,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 767,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 1
                }
            }
        ]
    });
</script>
<!-- Testimonial Slider -->
<script type="text/javascript">
    $(".testimonial-slider").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        variableWidth: false,
        autoplay: false,
        dots: false,
        arrows: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '10px',
                    slidesToShow: 1
                }
            }
        ]
    });
</script>
<!-- related  product slider -->
<script type="text/javascript">
    $(".related-product-slider").slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        variableWidth: false,
        autoplay: false,
        dots: true,
        arrows: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '5px',
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '10px',
                    slidesToShow: 1
                }
            }
        ]
    });
</script>

{{-- testmonial --}}
<script type="text/javascript">
    $(".testmonial2").slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        variableWidth: false,
        centerMode: true,
        centerPadding: '150px',
        autoplay: true,
        dots: false,
        arrows: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '30px',
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 1,
                    variableWidth: true,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 1
                }
            }
        ]
    });
</script>

<script>
    window.addEventListener("scroll", function(event) {
        var top = this.scrollY
        if (top > '150') {
            $('#header').addClass('is-sticky');
        } else {
            if ($('#header').hasClass('is-sticky')) {
                $('#header').removeClass('is-sticky');
            }
        }
    }, false);
</script>

<script>
// Get the button
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 250 || document.documentElement.scrollTop > 250) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
</body>

</html>
