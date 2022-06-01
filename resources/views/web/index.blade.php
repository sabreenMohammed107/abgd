@extends('web.layout.web')


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
                    <img class="w-100"  src="{{ asset('webassets/imgs/02.webp')}}" alt="companyContact">
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
                        <a href="#" rel="noreferrer" target="_blank">
                            <div class="content-overlay"></div>
                            <img class="content-image why-img" alt="{{ $whyRow->image }}" src="{{ asset('uploads/why_us') }}/{{ $whyRow->image }}">
                            <div class="content-details fadeIn-bottom">
                                <b class="text-white">Join Us	<i class="fa-solid fa-link"></i> </b>
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
                    @foreach ($howRegister as $index=>$row )


                    <div class="col-lg-6 col-md-12">
                        <div class="how-block">
                            <span class="how-span how-1"> {{ $row->order }}</span>
                            <h4>
                                @if (LaravelLocalization::getCurrentLocale() === 'en')
                                {{ $row->title_en }}
                            @else
                                {{ $row->title_ar }}
                            @endif
                            </h4>
                            <p>
                                @if (LaravelLocalization::getCurrentLocale() === 'en')
                                {{ $row->text_en }}
                            @else
                                {{ $row->text_ar }}
                            @endif
                            </p>
                        </div>
                    </div>

                    @endforeach

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
                    <img class="w-100 join-img"  src="{{ asset('webassets/imgs/12.webp')}}" alt="join-img">
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


                        <a href="{{ LaravelLocalization::localizeUrl('/user-login') }}" class="btn btn-primary btn-rec2">{{ __('links.register') }}</a>

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
                    <div>
                        <span><i class="fa-solid fa-mobile-screen-button"></i></span> <b> {{ strip_tags($companyContact->phones) }}</b>
                    </div>
                    <div>
                        <span><i class="fa-brands fa-whatsapp"></i></span> <b>{{ $companyContact->whatsapp }}</b>
                    </div>
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
                            <div class="mb-3">
                                <input type="text" class="form-control"  name="name"  placeholder="{{ __('links.name') }}">
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
                                <input type="tel" class="form-control" required name="mobile"  placeholder=" {{ __('links.phone') }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" placeholder=" {{ __('links.email') }}">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="mb-3">
                                <textarea class="form-control" required name="message" rows="9" placeholder="{{ __('links.message') }}"></textarea>
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
