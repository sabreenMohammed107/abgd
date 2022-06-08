<section class="hero-sec">
    <nav class="navbar navbar-expand-lg mb-4">
        <div class="container" dir="rtl">
            <a class="navbar-brand" href="{{ LaravelLocalization::localizeUrl('/') }}"><img alt="logo" src="{{ asset('webassets/imgs/logo.webp') }}"
                    class="logo pl-2" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto w-100">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/') }}#about-sec">{{ __('links.about_us') }}<span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/') }}#why-us"> {{ __('links.why_us') }} </a>
                    </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/') }}#how-sec">
                            {{ __('links.how_register') }}
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/faq') }}#first-sec"> {{ __('links.faq') }}</a>
                    --}}
                        <li class="nav-item">
                        <a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/') }}#contact-sec"> {{ __('links.contact_us') }}</a>
                    </li>
                    <li class="nav-item">

                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            @if (LaravelLocalization::getCurrentLocale() != 'ar' && $localeCode == 'ar')
                                <a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">

                                    <!--{{ $properties['native'] }}-->

                                    {{ __('links.ar') }}
                                </a>
                            @endif
                            @if (LaravelLocalization::getCurrentLocale() != 'en' && $localeCode == 'en')
                                <a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">

                                    {{ __('links.en') }}
                                </a>
                            @endif
                            <!--|-->
                        @endforeach
                        {{-- <a class="nav-link" href="#contact-sec">English</a> --}}
                    </li>
                    @if (Auth::user() && Auth::user()->type == 'user')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                {{ __('links.welcome') }} {{ strip_tags(str_limit(Auth::user()->name ?? '', $limit = 16, $end = '')) }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user-profile', Auth::user()->id) }}"> <i class="fa fa-user mr-2"></i> {{ __('links.my_profile') }} </a>

                                <a class="dropdown-item" href="{{ route('user-logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"> <i class="fa fa-lock mr-2"></i>
                                    {{ __('links.sign_out') }} </a>
                                <form id="logout-form" action="{{ route('user-logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">

                            <a href="{{ LaravelLocalization::localizeUrl('/user-login') }}" class="btn btn-primary btn-rec">{{ __('links.login') }}</a>

                        </li>
                    @endif






                </ul>
            </div>
        </div>
    </nav>
    <div class="intro-section spad mt-4" style="z-index:1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 service-text">
                    <h1 class="dir-text">
                        @if (LaravelLocalization::getCurrentLocale() === 'en')
                            {{ $companyContact->overview_title_en }}
                        @else
                            {{ $companyContact->overview_title_ar }}
                        @endif
                    </h1>
                    <p class="dir-text">
                        @if (LaravelLocalization::getCurrentLocale() === 'en')
                            {{ strip_tags(str_limit($companyContact->overview_text_en ?? '', $limit = 200, $end = '...')) }}
                        @else
                            {{ strip_tags(str_limit($companyContact->overview_text_ar ?? '', $limit = 200, $end = '...')) }}
                        @endif
                    </p>
                    <div class="hero-btn justify-content-center">
                        @if (Auth::user() && Auth::user()->type == 'user')
                        <a href="{{ route('user-profile', Auth::user()->id) }}" class="btn btn-primary btn-rec2">{{ __('links.my_profile') }} </a>

                    @else


                            <a href="{{ LaravelLocalization::localizeUrl('/user-login') }}" class="btn btn-primary btn-rec2">{{ __('links.login') }}</a>

                    @endif



                        <a href="{{ LaravelLocalization::localizeUrl('/') }}#about-sec" class="btn btn-primary btn-more">{{ __('links.show_more') }}</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="service-slider">



                        @foreach ($homeSliders as $slider)
                            <div class="ss-single">
                                <div style="position:relative">
                                    <img class="slider-img"
                                        src="{{ asset('uploads/sliders') }}/{{ $slider->image }}" alt="{{ $slider->image }}">
                                    <div class="slider-tag">
                                        <h6>
                                            @if (LaravelLocalization::getCurrentLocale() === 'en')
                                                {!! $slider->title_en !!}
                                            @else
                                                {!! $slider->title_ar !!}
                                            @endif
                                        </h6>
                                        <p>
                                            @if (LaravelLocalization::getCurrentLocale() === 'en')
                                                {!! $slider->text_en !!}
                                            @else
                                                {!! $slider->text_ar !!}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="slider-tag tag2">
                                        <h6>
                                            @if (LaravelLocalization::getCurrentLocale() === 'en')
                                                {!! $slider->title_en !!}
                                            @else
                                                {!! $slider->title_ar !!}
                                            @endif
                                        </h6>
                                        <p>
                                            @if (LaravelLocalization::getCurrentLocale() === 'en')
                                                {!! $slider->text_en !!}
                                            @else
                                                {!! $slider->text_ar !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="ss-single">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
