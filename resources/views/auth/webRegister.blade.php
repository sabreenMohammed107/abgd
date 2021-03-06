@extends('web.layout.web')

<?php
$xx = __('links.home');
?>

@section('title', '' . $xx . '')

@section('content')
    <section class="login-sec pt-5 pb-5 mb-5">
        <div class="container">
            <div class="row dir">
                <div class="col-lg-6 col-md-12">
                    <h2>{{ __('links.signin_up2') }}</h2>
                    <p style="color: #7c7a7a;font-size: 18px;">{{ __('links.signin_up3') }}</p>
                    @if (count($errors) > 0)
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
                    @endif
                    <form class="pt-5" method="post"
                        action=" {{ LaravelLocalization::localizeUrl('/captcha-validation') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">{{ __('links.full_name') }}</label>
                            <input type="text"
                                onkeypress="return /^(?:(?=[\p{Script=Arabic}A-Za-z])\p{L}|\s)+$/u.test(event.key)"
                                value="{{ old('full_name') }}" maxlength="70" name="full_name"
                                class="form-control  @error('full_name') is-invalid @enderror" autofocus>
                            @error('full_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label class="form-check-label mb-2" for="exampleCheck4">{{ __('links.gender') }}</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="gender" checked type="radio" id="inlineRadio1"
                                        {{ old('gender') == 'm' ? 'checked' : '' }} value="m">
                                    <label class="form-check-label" for="inlineRadio1">{{ __('links.male') }}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender"
                                        {{ old('gender') == 'f' ? 'checked' : '' }} id="inlineRadio2" value="f">
                                    <label class="form-check-label2" for="inlineRadio12">{{ __('links.female') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('links.mobile') }}</label>
                            <input type="tel" id="phone" maxlength="11" name="phone" value="{{ old('phone') }}"
                                class="form-control @error('phone') is-invalid @enderror">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('links.childNo') }}</label>
                            <input type="number" id="inp" name="child_no" min="1" max="5" value="{{ old('child_no') }}"
                                class="form-control @error('child_no') is-invalid @enderror">
                            @error('child_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('links.school') }}</label>
                            <select class="form-select form-control select-multiple" multiple name="schools[]"
                                aria-label="Default select example">
                                {{-- <option >{{ __('links.select_school') }}</option> --}}
                                @foreach ($schools as $school)
                                    <option value="{{ $school->id }}">
                                        @if (LaravelLocalization::getCurrentLocale() === 'en')
                                            {{ $school->name_en }}
                                        @else
                                            {{ $school->name_ar }}
                                        @endif
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        {{-- <div class="mb-3">
                            <label class="form-label ">{{ __('links.otherSchools') }}</label>
                            <textarea class="form-control " name="other_schools">{!! old('other_schools') !!} </textarea>
                        </div> --}}
                        {{-- newwwwwwwwwwwwwwwww --}}

                        <div class="mb-3">
                            <div class="form-group">
                                <label class="form-label ">{{ __('links.otherSchools') }}</label>

                                <input type="text" maxlength="70"
                                    onkeypress="return /^(?:(?=[\p{Script=Arabic}A-Za-z])\p{L}|\s)+$/u.test(event.key)"
                                    class="form-control d-block" id="inSchool">


                            </div>

                        </div>


                        <div class="mb-3">

                            <button type="button" id="adscol" @if (count(collect(old('other_schools'))) >= 3) disabled @endif onclick="addSchool()" class="btn btn-dark"
                                style="background:#1f174c;margin:0px auto;">{{ __('links.addSchool') }}
                            </button>

                        </div>

                        <h6>{{ __('links.dclick') }}</h6>



                        <div class="form-group">



                            <select name="other_schools[]" multiple class="form-control select-multiple" id="selectedshcol">

                                @foreach (collect(old('other_schools')) as $index=>$option)
                                <option value="{{ $option }}" ondblclick="removeOpt({{$index}})" selected>
                                    {{ $option }}</option>
                            @endforeach


                            </select>

                        </div>


                        <div class="w-100 my-1" id="added">









                        </div>

                        <!--  /Add Round days and times -->
                        {{-- end --}}
                        <div class="mb-3">
                            <label class="form-label">{{ __('links.total_cost') }}</label>
                            <input type="number" id="total_cost" min="5000" max="50000" value="{{ old('total_cost') }}"
                                name="total_cost" class="form-control @error('total_cost') is-invalid @enderror">
                            @error('total_cost')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('links.name') }}</label>
                            <input type="text" id="name" value="{{ old('name') }}"
                            onkeypress="return /^(?:[a-zA-Z0-9\s@,=%$#&_\u0600-\u06FF\u0750-\u077F\u08A0-\u08FF\uFB50-\uFDCF\uFDF0-\uFDFF\uFE70-\uFEFF]|(?:\uD802[\uDE60-\uDE9F]|\uD83B[\uDE00-\uDEFF])){0,30}$/u.test(event.key)"
                                name="name" maxlength="15" class="form-control  @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- <div class="mb-3">
                             onkeypress="return /^(?:[a-zA-Z0-9\s@,=%$#&_\u0600-\u06FF\u0750-\u077F\u08A0-\u08FF\uFB50-\uFDCF\uFDF0-\uFDFF\uFE70-\uFEFF]|(?:\uD802[\uDE60-\uDE9F]|\uD83B[\uDE00-\uDEFF])){0,30}$/u.test(event.key)"
                             onkeypress="return /^(?:(?=[\p{Script=Arabic}A-Za-z])\p{L}|\s)+$/u.test(event.key)"
                        <label class="form-label">{{ __('links.email') }}</label>
                        <input type="text" value="{{old('email')}}" name="email" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div> --}}

                        <div class="mb-3">
                            <label class="form-label">{{ __('links.password') }}</label>
                            <input id="password" maxlength="15" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('links.confirm_password') }}</label>
                            <input id="password-confirm" type="password" class="form-control  " name="confirm-password"
                                autocomplete="new-password">

                        </div>
                        <div class="form-group mt-4 mb-4">
                            <div class="captcha">
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                    &#x21bb;
                                </button>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror"
                                placeholder="{{ __('links.enter_captcha') }}" name="captcha">
                            @error('captcha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary btn-contact">{{ __('links.register') }}</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-12">
                    <img src="{{ asset('webassets/imgs/18.png') }}" style="max-width:100%;height:400px" />
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
                    <div class="slide"><img src="{{ asset('uploads/partners') }}/{{ $partenter->logo }}">
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection
@section('scripts')
    <script src="{{ asset('webassets/js/jquery.passwordstrength.js') }}"></script>
    <script type="text/javascript">
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
        document.getElementById("inp").addEventListener("change", function() {
            let v = parseInt(this.value);
            if (v < 1) this.value = 1;
            if (v > 5) this.value = 5;
        });

        document.getElementById("total_cost").addEventListener("change", function() {
            let v = parseInt(this.value);
            if (v < 5000) this.value = 5000;
            if (v > 50000) this.value = 50000;

        });
    </script>
    <script type="text/javascript">
        $(function() {
            $("#password").passwordStrength({
                $indicator: undefined,
                rules: {
                    Message: {
                        required: false,
                        maxlength: false,

                    }
                },
                errorMessages: false,
                // The class names to give the indicator element, according to the current password strength
                strengthClassNames: [{
                    name: "very-weak",
                    text: " "
                }, {
                    name: "weak",
                    text: " "
                }, {
                    name: "mediocre",
                    text: " "
                }, {
                    name: "strong",
                    text: " "
                }, {
                    name: "very-strong",
                    text: " "
                }]
            });
        });


        var arrschools = $('#selectedshcol').val();


        function addSchool() {


            var inSchool = $('#inSchool').val();
            if (inSchool.trim().length !== 0) {
                if (arrschools) {
                    arrschools.push(inSchool);

                    console.table(arrschools);
                    $('#selectedshcol').empty();

                    $.each(arrschools, function(index, elem) {

                        // var elem = JSON.stringify(elem);

                        var option = '<option selected value="' + elem + '" ondblclick="removeOpt(' + index +
                            ')">' +
                            elem + '</option>'

                        $('#selectedshcol').append(option);
                        $('#inSchool').val('');
                        if (index == 2) {
                            $('#adscol').prop('disabled', true);
                        } else {
                            $('#adscol').prop('disabled', false);
                        }

                    })

                    console.table(inSchool);

                } else {
                    arrschools = [];
                    var inSchool = $('#inSchool').val();

                    // var obj = {

                    //     school: inSchool

                    // }
                    arrschools.push(inSchool);

                    console.table(arrschools);
                    $('#selectedshcol').empty();

                    $.each(arrschools, function(index, elem) {

                        // var elem = JSON.stringify(elem);

                        var option = '<option selected value="' + elem + '" ondblclick="removeOpt(' + index +
                            ')">' + elem + '</option>'

                        $('#selectedshcol').append(option);
                        $('#inSchool').val('');
                        if (index == 2) {
                            $('#adscol').prop('disabled', true);
                        } else {
                            $('#adscol').prop('disabled', false);
                        }

                    })
                }




            }


        }




        function removeOpt(index) {

            var x = document.getElementById("selectedshcol");
            x.remove(x.selectedIndex);

            // $('#selectedshcol option')[index].remove();

            arrschools.splice(index, 1);
            // arrschools.remove(index);

            $('#selectedshcol').empty();

            $.each(arrschools, function(index, elem) {

                // var elem = JSON.stringify(elem);

                var option = '<option selected value="' + elem + '" ondblclick="removeOpt(' + index + ')">' +
                    elem + '</option>'

                $('#selectedshcol').append(option);
                if (index == 2) {
                    $('#adscol').prop('disabled', true);
                } else {
                    $('#adscol').prop('disabled', false);
                }

            })



        }
    </script>
@endsection
