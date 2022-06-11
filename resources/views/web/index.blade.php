@extends('web.layout.web')
<?php
$xx= __('links.home')
?>

@section('title', '' . $xx. '')

@section('content')
<section class="about-sec reveal" id="about-sec">
    <div class="mt-4">
        <div class="container container2">
            <div class="row dir">
                <div class="col-lg-8 about-text">
                    <h2 class="dir-text">
                        {{ __('links.about_us') }}
                    </h2>
                    <p class="dir-text">
                        @if (LaravelLocalization::getCurrentLocale() === 'en')
                        {{ $companyContact->who_abgd_text_en }}
                    @else
                        {{ $companyContact->who_abgd_text_ar }}
                    @endif
                    </p>
                </div>
                <div class="col-lg-4">
                    <img class="w-100"  src="{{ asset('webassets/imgs/02.png')}}" alt="companyContact">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="why-us reveal" id="why-us">
    <div class="container container2">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center">
                <h2 class="mb-4">{{ __('links.why_us') }}</h2>
                <p>
                    @if (LaravelLocalization::getCurrentLocale() === 'en')
                    {{ $companyContact->why_us_text_en }}
                @else
                    {{ $companyContact->why_us_text_ar }}
                @endif
                       </p>
            </div>
        </div>
        <div class="row dir">
            @foreach ($whyRows as $whyRow)


            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="why-block">
                    <div class="content">
                        @if (Auth::user() && Auth::user()->type == 'user')
                        <a href="{{ route('user-profile', Auth::user()->id) }}">

                    @else


                            <a href="{{ LaravelLocalization::localizeUrl('/user-login') }}" >

                    @endif

                            <div class="content-overlay"></div>
                            <img class="content-image why-img" alt="{{ $whyRow->image }}" src="{{ asset('uploads/why_us') }}/{{ $whyRow->image }}">
                            <div class="content-details fadeIn-bottom">
                                <b class="text-white">
                                    @if (Auth::user() && Auth::user()->type == 'user')
                                    {{ __('links.my_profile') }}

                                @else


                                   {{ __('links.joinNow') }}

                                @endif

                                    <i class="fa-solid fa-link"></i> </b>
                            </div>
                        </a>
                    </div>
                    <div class="why-text">
                        <h3> @if (LaravelLocalization::getCurrentLocale() === 'en')
                            {{ $whyRow->title_en }}
                        @else
                            {{ $whyRow->title_ar }}
                        @endif</h3>
                        <p> @if (LaravelLocalization::getCurrentLocale() === 'en')
                            {{ $whyRow->text_en }}
                        @else
                            {{ $whyRow->text_ar }}
                        @endif</p>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</section>

<section class="how-sec reveal" id="how-sec">
    <div class="container container2">
        <div class="row dir">
            <div class="col-lg-6 col-md-12" style="margin:auto 0">
                <h2 class="heading-section">

                    {{ __('links.how_register') }}
                </h2>
                <p class="how-text">
                    @if (LaravelLocalization::getCurrentLocale() === 'en')
                    {{ $companyContact->how_register_text_en }}
                @else
                    {{ $companyContact->how_register_text_ar }}
                @endif
                </p>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        @isset($howRegister[0])
                        <div class="how-block">
                            <span class="how-span how-1">{{ $howRegister[0]->order }}</span>
                            <h4>
                                @if (LaravelLocalization::getCurrentLocale() === 'en')
                                {{ $howRegister[0]->title_en }}
                            @else
                                {{ $howRegister[0]->title_ar }}
                            @endif
                            </h4>
                            <p>
                                @if (LaravelLocalization::getCurrentLocale() === 'en')
                                {{ $howRegister[0]->text_en }}
                            @else
                                {{ $howRegister[0]->text_ar }}
                            @endif </p>
                        </div>
                        @endisset
                    </div>
                    <div class="col-lg-6 col-md-12 mt-4">
                        @isset($howRegister[1])
                        <div class="how-block">
                            <span class="how-span how-2">{{ $howRegister[1]->order }}</span>
                            <h4>
                                @if (LaravelLocalization::getCurrentLocale() === 'en')
                                {{ $howRegister[1]->title_en }}
                            @else
                                {{ $howRegister[1]->title_ar }}
                            @endif
                            </h4>
                            <p>
                                @if (LaravelLocalization::getCurrentLocale() === 'en')
                                {{ $howRegister[1]->text_en }}
                            @else
                                {{ $howRegister[1]->text_ar }}
                            @endif </p>
                        </div>
                        @endisset
                    </div>
                    <div class="col-lg-6 col-md-12">
                        @isset($howRegister[2])
                        <div class="how-block">
                            <span class="how-span how-3"> {{ $howRegister[2]->order }}</span>
                            <h4>
                                @if (LaravelLocalization::getCurrentLocale() === 'en')
                                {{ $howRegister[2]->title_en }}
                            @else
                                {{ $howRegister[2]->title_ar }}
                            @endif
                            </h4>
                            <p>
                                @if (LaravelLocalization::getCurrentLocale() === 'en')
                                {{ $howRegister[2]->text_en }}
                            @else
                                {{ $howRegister[2]->text_ar }}
                            @endif</p>
                        </div>
                        @endisset
                    </div>
                    <div class="col-lg-6 col-md-12 mt-4">
                        @isset($howRegister[3])
                        <div class="how-block">
                            <span class="how-span how-3"> {{ $howRegister[3]->order }}</span>
                            <h4>
                                @if (LaravelLocalization::getCurrentLocale() === 'en')
                                {{ $howRegister[3]->title_en }}
                            @else
                                {{ $howRegister[3]->title_ar }}
                            @endif
                            </h4>
                            <p>
                                @if (LaravelLocalization::getCurrentLocale() === 'en')
                                {{ $howRegister[3]->text_en }}
                            @else
                                {{ $howRegister[3]->text_ar }}
                            @endif </p>
                        </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="join-sec reveal">
    <div class="mt-4">
        <div class="container container2">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-12">
                    <img class="w-100 join-img"  src="{{ asset('webassets/imgs/12.png')}}" alt="join-img">
                </div>
                <div class="col-lg-8 col-md-7 col-sm-12 join-text">
                    <h2 class="dir-text">

                        {{ __('links.joinNow') }}
                    </h2>
                    <p class="dir-text">
                        @if (LaravelLocalization::getCurrentLocale() === 'en')
                    {{ $companyContact->join_us_text_en }}
                @else
                    {{ $companyContact->join_us_text_ar }}
                @endif
                    </p>
                    @if (Auth::user() && Auth::user()->type == 'user')
                    <a href="{{ route('user-profile', Auth::user()->id) }}" class="btn btn-primary btn-rec2">{{ __('links.my_profile') }} </a>

                @else


                        <a href="{{ LaravelLocalization::localizeUrl('/user-login') }}" class="btn btn-primary btn-rec2">
                            {{ __('links.login') }}

                        </a>

                @endif

                </div>
            </div>
        </div>
    </div>
</section>

<section class="clients-sec reveal">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center">
                <h2>
                    {{ __('links.partenters') }}
                </h2>
            </div>
        </div>
        <div class="customer-logos slider">
            @foreach ($partenters as $partenter)
            <div class="slide"><img alt="{{ $partenter->logo }}" src="{{ asset('uploads/partners') }}/{{ $partenter->logo }}"></div>
            @endforeach


        </div>
    </div>
</section>

<section class="contact-sec reveal" id="contact-sec">
    <div class="container container2">
        <div class="row dir">
            <div class="col-lg-6 col-md-12">
                <div class="contact-text">
                    <h2> {{ __('links.contact_us') }}</h2>
                    <p>
                        @if (LaravelLocalization::getCurrentLocale() === 'en')
                    {{ $companyContact->contact_us_text_en }}
                @else
                    {{ $companyContact->contact_us_text_ar }}
                @endif
                    </p>
                    <div>
                        <span><i class="fa-solid fa-location-dot"></i></span> <b> @if (LaravelLocalization::getCurrentLocale() === 'en')
                            {{ $companyContact->address_en }}
                        @else
                            {{ $companyContact->address_ar }}
                        @endif</b>
                    </div>
                    @if($companyContact->phones)
                    <div>
                        <span><i class="fa-solid fa-mobile-screen-button"></i></span> <b> {{ strip_tags($companyContact->phones) }}</b>
                    </div>
                    @endif
                    @if($companyContact->whatsapp)
                    <div>
                        <span><i class="fa-brands fa-whatsapp"></i></span> <b>{{ $companyContact->whatsapp }}</b>
                    </div>
                   @endif
                    <div>
                        <span><i class="fa-regular fa-envelope"></i></span> <b>{{ $companyContact->email }}</b>
                    </div>
                    <div class="rounded-social-buttons mt-1">
                        <a class="social-button facebook" href="{{ $companyContact->facebook }}" rel="noreferrer" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="social-button twitter" href="{{ $companyContact->twitter }}" rel="noreferrer" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a class="social-button linkedin" href="{{ $companyContact->linkedin }}" rel="noreferrer" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        <a class="social-button instagram" href="{{ $companyContact->instagram }}" rel="noreferrer" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <form action="{{ LaravelLocalization::localizeUrl('/contact-message') }}"
                method="post" >
                @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            {{-- @if (count($errors) > 0)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <ul class="p-0 m-0" style="list-style: none;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                            <div class="mb-3">
                                <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" maxlength="70" onkeypress="return /^(?:(?=[\p{Script=Arabic}A-Za-z])\p{L}|\s)+$/u.test(event.key)"
                                  name="name"  placeholder="{{ __('links.full_name') }}">
                                  @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <select class="form-select" name="sender_type_id" aria-label="Default select example">
                                @foreach ($senderTypes as $type)
                                <option value="{{$type->id}}"> @if (LaravelLocalization::getCurrentLocale() === 'en')
                                    {{ $type->sender_type_en }}
                                @else
                                    {{ $type->sender_type_ar }}
                                @endif</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <input type="tel" maxlength="11"  name="mobile"  value="{{ old('mobile') }}"
                                class="form-control @error('mobile') is-invalid @enderror" placeholder=" {{ __('links.phone') }}">
                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" placeholder=" {{ __('links.email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="mb-3">
                                <textarea class="form-control @error('message') is-invalid @enderror"  name="message" rows="9" placeholder="{{ __('links.message') }}">{{ old('message') }}</textarea>
                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <button class="btn btn-primary btn-contact">{{ __('links.send_msg') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
