@extends('web.layout.web')


@section('content')
<section class="login-sec pt-5 pb-5 mb-5">
    <div class="container">
        <div class="row dir">
            <div class="col-lg-6 col-md-12">
                <h2>{{ __('links.signin_up') }}</h2>

                @if(count($errors) > 0 )
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <ul class="p-0 m-0" style="list-style: none;">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
                <form class="pt-5" method="post" action=" {{ LaravelLocalization::localizeUrl('/captcha-validation') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('links.full_name') }}</label>
                        <input type="text" value="{{old('full_name')}}" name="full_name" class="form-control">
                    </div>
                    <div>
                        <label class="form-check-label mb-2" for="exampleCheck4">{{ __('links.gender') }}</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="gender"  checked  type="radio"  id="inlineRadio1" {{ old('gender')=="m" ? 'checked' : '' }}  value="m">
                                <label class="form-check-label" for="inlineRadio1" >{{ __('links.male') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"  name="gender" {{ old('gender')=="f" ? 'checked' : '' }}  id="inlineRadio2" value="f">
                                <label class="form-check-label2" for="inlineRadio12">{{ __('links.female') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('links.mobile') }}</label>
                        <input type="tel" id="phone"  name="phone" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('links.childNo') }}</label>
                        <input type="number" name="child_no" value="{{old('child_no')}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('links.school') }}</label>
                        <select class="form-select form-control"  multiple name="schools[]" style="height: 150px" aria-label="Default select example" style="background-color:white!important;border:1px solid #ced4da !important">
                            <option >{{ __('links.select_school') }}</option>
                            @foreach ($schools as $school)
                            <option value="{{$school->id}}"  >@if (LaravelLocalization::getCurrentLocale() === 'en')
                                {{ $school->name_en }}
                            @else
                                {{ $school->name_ar }}
                            @endif</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label ">{{ __('links.otherSchools') }}</label>
                        <textarea class="form-control " name="other_schools">{!! old('other_schools') !!} </textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('links.total_cost') }}</label>
                        <input type="number" value="{{old('total_cost')}}" name="total_cost" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('links.name') }}</label>
                        <input type="text" id="name" value="{{old('name')}}" name="name" maxlength="20" class="form-control  @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    {{-- <div class="mb-3">
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
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('links.confirm_password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
                        <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror" placeholder="{{ __('links.enter_captcha') }}" name="captcha">
                        @error('captcha')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-contact">{{ __('links.login') }}</button>
                    </div>
                </form>
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
@section('scripts')
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
@endsection
