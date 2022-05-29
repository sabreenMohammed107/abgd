<script src="{{ asset('webassets/js/jquery-3.3.1.slim.min.js')}}"></script>
<script src="{{ asset('webassets/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('webassets/js/popper.min.j')}}s"></script>
	<!--====== Slider ======-->
	<script src="{{ asset('webassets/js/jquery-2.1.4.min.js')}}"></script>
	<script src="{{ asset('webassets/js/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('webassets/js/slick.js')}}"></script>

<script>
    $('.service-slider').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        items: 1,
        dots: true,
        lazyLoad: true,
        smartSpeed: 900,
        autoplay:true,
    autoplayTimeout:8000 ,
        slidesToShow:1,
        mouseDrag: true,
        touchDrag: false,
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script>
    $(document).ready(function () {
        $('.customer-logos').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3
                }
            }]
        });
    });
</script>

<script>
    function reveal() {
        var reveals = document.querySelectorAll(".reveal");

        for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;
            var elementVisible = 150;

            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active");
            } else {
                reveals[i].classList.remove("active");
            }
        }
    }

    window.addEventListener("scroll", reveal);
</script>
<!--====== /Slider ======-->
@yield('scripts')
</body>
</html>
