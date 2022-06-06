@extends('web.layout.web')


@section('content')
<section class="success-sec pt-5 reveal">
    @if(!empty($flash_success))
    <script>

       setTimeout(function() {
           window.location.href = "{{ url('/')}}"
       }, 10000); // 2 second
       document.getElementById("next").focus();
    </script>
@endif
    <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 heading-section text-center">
                @if(!empty($flash_success))
                <h2>{{$flash_success}}</h2>
                @endif

                <h6>
                     {{__('links.wait')}}
                     <a href="{{ LaravelLocalization::localizeUrl('/') }}" class="an-link" id="next" >{{__('links.clickHere')}} <i class="fa-solid fa-arrow-pointer"></i>
                     </a>
                    </h6>

            <script>

                document.getElementById("next").focus();
             </script>
            </div>
        </div>
        <div class="row justify-content-center">
            <div  class="col-lg-12 col-md-12">
                <img src="{{ asset('webassets/imgs/20.webp')}}" alt="success" style="width:100%;height:400px" />
            </div>
        </div>
    </div>
</section>
@endsection
