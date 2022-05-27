@include('web.layout.head')

<body @if( LaravelLocalization::getCurrentLocale() === "en")
class="en"
@else
class="ar" @endif >

@include('web.layout.header')

@yield('content')


@include('web.layout.footer')

@include('web.layout.footerscript')
