<!DOCTYPE html>
<html lang="ar">
<head>
	<title>Abgad - @yield('title')</title>
    <script type="application/ld+json">
        {
          "@context": "https://schema.org/",
          "@type": "Recipe",
          "name": "ABGAD",
          "author": {
            "@type": "Person",
            "name": "Senior steps"
          },
          "datePublished": "2022-05-27",
          "description": "ABGAD very important to give aloan to parents to schools ",
          "prepTime": "PT20M"
        }
        </script>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        @if (LaravelLocalization::getCurrentLocale() === 'en')
        <meta name="description" content="Study Now, Pay Later
        ABGAD is your no-fuss, online tuition loan partner, designed to empower you with the financial resources you need to meet all of your child’s education expenses">


    @else
    <meta name="description" content="اتعلم دلوقتي وادفع بعدين
    أبجد هو شريكك الرقمي للحصول على الموارد المالية المطلوبة لتمويل المصاريف الدراسية لأولادك">


    @endif
    <meta name="keywords" content="ABGAD,aloan,قروض ,schools,parents,ابجد ,مدارس">

        <meta name="author" content="sabreen mohammed & senior steps">

	<!-- Favicon -->
	<link href="{{ asset('webassets/imgs/logo2.jpeg')}}" rel="shortcut icon" sizes="196x196" />
	<!-- Fontawesome -->
	<link href="{{ asset('webassets/fonts/fontawesome-free-6.0.0-web/css/all.css')}}" rel="stylesheet" type="text/css">
	<!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('webassets/css/bootstrap.min.css')}}" />
	{{-- <link rel="stylesheet" href="{{ asset('webassets/css/bootstrap.min.css')}}" /> --}}
    <link rel="stylesheet" href="{{ asset('webassets/css/owl.carousel.css')}}" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"> --}}

	<link href="{{ asset('webassets/css/style.css')}}" rel="stylesheet" />

    <style type="text/css" rel="stylesheet">
    .why-us .why-block .why-text {
    padding: 10px 20px;
    text-align: center;
    min-height: 200px;
}
button.close {
    position: absolute;
    top: 0;
    right: 0;
    z-index: 2;
    padding: 0.75rem 1.25rem;
    color: inherit;
    cursor: pointer;
    text-shadow: 0 1px 0 #fff;
    opacity: .5;
    border: 0;
    background-color: transparent;
    font-size: 1.5rem;
}
.h3, h3 {
    font-size: 1.55rem;
}
    .clients-sec{display:none}
        #page
        {
            margin: auto;
            width: 940px;
        }

        .password-strength-indicator
        {
            border: 1px solid transparent;
            border-radius: 3px;
            display: inline-block;
            min-height: 18px;
            min-width: 80px;
            text-align: center;
        }

        .password-strength-indicator.very-weak
        {
            background: #cf0000;
            border-color: #a60000;
        }

        .password-strength-indicator.weak
        {
            background: #f6891f;
            border-color: #c56e19;
        }

        .password-strength-indicator.mediocre
        {
            background: #eeee00;
            border-color: #d6d600;
        }

        .password-strength-indicator.strong
        {
            background: #99ff33;
            border-color: #7acc29;
        }

        .password-strength-indicator.very-strong
        {
            background: #22cf00;
            border-color: #1B9900;
        }
    </style>
</head>
