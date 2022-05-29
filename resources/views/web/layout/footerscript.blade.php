<!--====== Javascripts & Jquery ======-->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!--====== Slider ======-->
{{-- <script src="{{ asset('webassets/js/jquery-3.2.1.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="{{ asset('webassets/js/bootstrap.min.js')}}"></script> --}}

<script src="{{ asset('webassets/js/jquery-2.1.4.min.js')}}"></script>
<script src="{{ asset('webassets/js/owl.carousel.min.js')}}"></script>
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
<!--====== /Slider ======-->
@yield('scripts')
</body>
</html>
