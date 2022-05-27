<footer>
    <div class="footer-sec">
        <div class="container">
            <div class="row dir">
                <div class="footer-links">


                    <a class="footer-button" href=" {{ LaravelLocalization::localizeUrl('/') }}#about-sec"> {{ __('links.about_us') }}</a>
                    <a class="footer-button" href=" {{ LaravelLocalization::localizeUrl('/') }}#why-us">{{ __('links.why_us') }}</a>
                    <a class="footer-button" href=" {{ LaravelLocalization::localizeUrl('/') }}#how-sec">{{ __('links.register') }}</a>
                    <a class="footer-button" href="faq.html">{{ __('links.faq') }}</a>
                    <a class="footer-button" href=" {{ LaravelLocalization::localizeUrl('/') }}#contact-sec">{{ __('links.contact_us') }}</a>
                    <a class="footer-button" href=" {{ LaravelLocalization::localizeUrl('/') }}#how-sec">{{ __('links.register') }}</a>
                    <a class="footer-button" href="#">{{ __('links.privacy_policy') }}</a>
                    <a class="footer-button" href="#">{{ __('links.term_condation') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <p>

{{ __('links.copy_right') }}
&copy;
<script>document.write(new Date().getFullYear());</script>
{{ __('links.tade_mark') }}
            {{-- Senior Steps	تطوير
             &copy;
            <script>document.write(new Date().getFullYear());</script>

            Abgad	جميع الحقوق محفوظة لدي --}}

        </p>
    </div>
</footer>
