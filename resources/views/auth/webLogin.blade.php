@extends('web.layout.web')


@section('content')
<section class="login-sec pt-5 pb-5 mb-5">
    <div class="container">
        <div class="row dir">
            <div class="col-lg-6 col-md-12">
                <h2>
                    {{ __('links.login') }}
                </h2>

                <form class="pt-5" action="{{ LaravelLocalization::localizeUrl('/save-user') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('links.name_phone') }}</label>
                        {{-- <input type="text" class="form-control"> --}}
                        <input id="user_identifier" type="text" class="form-control @error('user_identifier') is-invalid @enderror" name="user_identifier" value="{{ old('user_identifier') }}" autofocus>

                                @error('user_identifier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('links.password') }}</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-contact"> {{ __('links.login') }}</button>
                    </div>


                    <div class="mb-3">
                        <a href="{{ LaravelLocalization::localizeUrl('/user-register') }}">{{ __('links.signin_up') }}</a>
                    </div>
  {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                </form>
                {{-- <a href="{{ LaravelLocalization::localizeUrl('/user-register') }}" class="btn btn-primary btn-rec">{{ __('links.register') }}</a> --}}

            </div>

            <div  class="col-lg-6 col-md-12">
                <img src="{{ asset('webassets/imgs/18.png')}}" style="max-width:100%;height:400px" />
            </div>
        </div>
    </div>
</section>

<section class="clients-sec">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center">
                <h2> {{ __('links.partenters') }}</h2>
            </div>
        </div>
        <div class="customer-logos slider">
            @foreach ($partenters as $partenter)
            <div class="slide"><img src="{{ asset('uploads/partners') }}/{{ $partenter->logo }}"></div>
            @endforeach
        </div>
    </div>
</section>


@endsection
