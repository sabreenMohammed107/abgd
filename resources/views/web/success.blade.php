@extends('web.layout.web')


@section('content')
<section class="success-sec pt-5">
    @if(!empty($flash_success))
    <script>
       setTimeout(function() {
           window.location.href = "{{ url('/')}}"
       }, 3000); // 2 second
    </script>
@endif
    <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 heading-section text-center">
                @if(!empty($flash_success))
                <h2>{{$flash_success}}</h2>
                @endif
                <h6>
                    {{ __('links.wait') }}
                </h6>
            </div>
        </div>
        <div class="row justify-content-center">
            <div  class="col-lg-12 col-md-12">
                <img src="{{ asset('webassets/imgs/20.png')}}" style="width:100%;height:400px" />
            </div>
        </div>
    </div>
</section>
@endsection
