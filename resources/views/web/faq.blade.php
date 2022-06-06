@extends('web.layout.web')

<?php
$xx= __('links.faq')
?>

@section('title', '' . $xx. '')

@section('content')
<section class="login-sec pt-5 pb-5 mb-5 reveal" id="first-sec">
    <div class="container container2">
        <div class="row dir">
            @foreach ($faqs as $faq)
            <div class="col-lg-12 col-md-12 pb-4">
                <h2>@if (LaravelLocalization::getCurrentLocale() === 'en')
                    {{ $faq->question_en }}
                @else
                    {{ $faq->question_ar }}
                @endif</h2>
                <p class="faq-text">
                    @if (LaravelLocalization::getCurrentLocale() === 'en')
                    {{ $faq->answer_en }}
                @else
                    {{ $faq->answer_ar }}
                @endif
                </p>
            </div>
            @endforeach


        </div>
    </div>
</section>

<section class="clients-sec reveal">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center">
                <h2> {{ __('links.partenters') }}</h2>
            </div>
        </div>
        <div class="customer-logos slider">
            @foreach ($partenters as $partenter)
            <div class="slide"><img alt="{{ $partenter->logo }}" src="{{ asset('uploads/partners') }}/{{ $partenter->logo }}"></div>
            @endforeach
        </div>
    </div>
</section>
@endsection
