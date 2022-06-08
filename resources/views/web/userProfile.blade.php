@extends('web.layout.web')
<?php
$xx= __('links.profile')
?>

@section('title', '' . $xx. '')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success"
    @if (LaravelLocalization::getCurrentLocale() === 'en')
    style="text-align: left"
                        @else

                        style="text-align: right"
                        @endif>
        {{ session()->get('message') }}
    </div>
@endif
<section class="login-sec pt-5 pb-5 mb-5 ">
    <div class="container">
        <div class="row dir">
            <div class="col-lg-6 col-md-12">
                <h2>{{ __('links.my_profile') }}</h2>

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
                <form class="pt-5" method="post" action=" {{ LaravelLocalization::localizeUrl('/update-profile') }}">
                    @csrf
                    <input type="hidden" name="user_parent" value="{{$user_parent->id}}" >
                    <div class="mb-3">
                        <label class="form-label">{{ __('links.full_name') }}</label>
                        <input type="text" value="{{$user_parent->full_name}}" name="full_name" class="form-control" autofocus >
                    </div>
                    <div>
                        <label class="form-check-label mb-2" for="exampleCheck4">{{ __('links.gender') }}</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="gender"  @if($user_parent->gender == 'm') checked @endif type="radio"  id="inlineRadio1" value="m">
                                <label class="form-check-label" for="inlineRadio1" >{{ __('links.male') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"  name="gender"  @if($user_parent->gender == 'f') checked @endif id="inlineRadio2" value="f">
                                <label class="form-check-label2" for="inlineRadio12">{{ __('links.female') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('links.mobile') }}</label>
                        <input type="tel" id="phone"  name="phone" value="{{$user_parent->user->phone ?? ''}}" class="form-control @error('phone') is-invalid @enderror">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('links.childNo') }}</label>
                        <input type="number" id="inp" name="child_no" min="1" max="5" value="{{$user_parent->child_no}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('links.school') }}</label>
                        <select class="form-select form-control"  multiple name="schools[]" style="height: 150px" aria-label="Default select example" style="background-color:white!important;border:1px solid #ced4da !important">
                            <option >{{ __('links.select_school') }}</option>
                            @foreach ($schools as $school)
                            <option value="{{$school->id}}"
                                @foreach($userSchools as $sublist){{$sublist->pivot->school_id == $school->id ? 'selected': ''}}   @endforeach >@if (LaravelLocalization::getCurrentLocale() === 'en')
                                {{ $school->name_en }}
                            @else
                                {{ $school->name_ar }}
                            @endif</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label class="form-label ">{{ __('links.otherSchools') }}</label>

                            <input type="text" class="form-control d-block" id="inSchool">


                        </div>

                    </div>


            <div class="mb-3">
                <button type="button" id="adscol" @if(count($user_parent->otherSchools)>=3) disabled @endif  onclick="addSchool()" class="btn btn-dark" style="margin:0px auto;">{{ __('links.addSchool') }}
                </button>

            </div>

            <h6>{{ __('links.dclick') }}</h6>



            <div class="form-group">

                <select name="other_schools[]" multiple class="form-control select-multiple" id="selectedshcol">
@foreach ($user_parent->otherSchools as $other)
<option  value="{{$other->id}}">{{$other->school}}</option>
@endforeach
                    {{-- <option disabled value=""> أيام المجموعات </option> --}}

                </select>

            </div>


        <div class="w-100 my-1" id="added">









        </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('links.total_cost') }}</label>
                        <input type="number" id="total_cost" min="1" value="{{$user_parent->total_cost}}"name="total_cost" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('links.name') }}</label>
                        <input type="text" id="name" value="{{$user_parent->user->name ?? ''}}" maxlength="20" name="name" class="form-control  @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    {{-- <div class="mb-3">
                        <label class="form-label">{{ __('links.email') }}</label>
                        <input type="text" value="{{$user_parent->user->email ?? ''}}" name="email" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div> --}}
                    <div class="mb-3">
                        <label class="form-label">{{ __('links.password') }}</label>
                        <input id="password" type="password" placeholder="******" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('links.confirm_password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
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
                        <button type="submit" class="btn btn-primary btn-contact">{{ __('links.edit_my_profile') }}</button>
                    </div>
                </form>
            </div>
            <div  class="col-lg-6 col-md-12">
                <img src="{{ asset('webassets/imgs/18.webp')}}" alt="success" style="max-width:100%;height:400px" />
            </div>
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
            <div class="slide"><img  alt="{{ $partenter->logo}}" src="{{ asset('uploads/partners') }}/{{ $partenter->logo }}"></div>
            @endforeach
        </div>
    </div>
</section>


@endsection
@section('scripts')
<script src="{{ asset('webassets/js/jquery.passwordstrength.js')}}"></script>
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
    document.getElementById("inp").addEventListener("change", function() {
  let v = parseInt(this.value);
  if (v < 1) this.value = 1;
  if (v > 5) this.value = 5;
});
document.getElementById("total_cost").addEventListener("change", function() {
  let v = parseInt(this.value);
  if (v < 1) this.value = 1;

});
</script>
<script type="text/javascript">
    $(function() {
        $("#password").passwordStrength({
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
    var arrschools = [];


function addSchool() {



  var inSchool = $('#inSchool').val();

  var obj = {

school : inSchool

}
  arrschools.push(obj);

  console.table(arrschools);




  $('#selectedshcol').empty();

  $.each(arrschools,function(index,elem){

    // var elem = JSON.stringify(elem);

    var option = '<option selected value="'+elem.school+'" ondblclick="removeOpt('+ index + ')">' + elem.school  + '</option>'

    $('#selectedshcol').append(option);
    if(index==2){
        $('#adscol').prop('disabled', true);
    }else{
        $('#adscol').prop('disabled', false);
    }

  })

  console.table(inSchool);

  console.table(arrschools);

}
function removeOpt(index) {

 alert(index);
 var x = document.getElementById("selectedshcol");
  x.remove(x.selectedIndex);

// $('#selectedshcol option')[index].remove();

arrschools.splice(index,1);
// arrschools.remove(index);

 $('#selectedshcol').empty();

$.each(arrschools,function(index,elem){

  // var elem = JSON.stringify(elem);

  var option = '<option selected value="'+elem.school+'" ondblclick="removeOpt('+ index + ')">' + elem.school  + '</option>'

  $('#selectedshcol').append(option);
  if(index==2){
        $('#adscol').prop('disabled', true);
    }else{
        $('#adscol').prop('disabled', false);
    }

})



}
</script>
@endsection
