@extends('layout.web')

@section('title', ' العملاء')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary">

        <form class="pt-5" method="post" action="#">
            @csrf
            <div class="box-body">
            <input type="hidden" name="user_parent" value="{{$user_parent->id}}" >
            <div class="mb-3">
                <label class="form-label">{{ __('links.full_name') }}</label>
                <input type="text" value="{{$user_parent->full_name}}" readonly name="full_name" class="form-control">
            </div>
            <div>
                <label class="form-check-label mb-2" for="exampleCheck4">{{ __('links.gender') }}</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="gender" readonly  @if($user_parent->gender == 'm') checked @endif type="radio"  id="inlineRadio1" value="m">
                        <label class="form-check-label" for="inlineRadio1" >{{ __('links.male') }}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" readonly  name="gender"  @if($user_parent->gender == 'f') checked @endif id="inlineRadio2" value="f">
                        <label class="form-check-label2" for="inlineRadio12">{{ __('links.female') }}</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('links.phone') }}</label>
                <input type="tel" id="phone" readonly  name="phone" value="{{$user_parent->user->phone ?? ''}}" class="form-control @error('phone') is-invalid @enderror">
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('links.childNo') }}</label>
                <input type="number" name="child_no" readonly value="{{$user_parent->child_no}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('links.school') }}</label>
                <select class="form-select form-control" disabled  multiple name="schools[]" style="height: 150px" aria-label="Default select example" style="background-color:white!important;border:1px solid #ced4da !important">
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
                <label class="form-label">{{ __('links.total_cost') }}</label>
                <input type="number" value="{{$user_parent->total_cost}}" readonly name="total_cost" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('links.name') }}</label>
                <input type="text" id="name" value="{{$user_parent->user->name ?? ''}}" readonly maxlength="20" name="name" class="form-control  @error('name') is-invalid @enderror">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('links.email') }}</label>
                <input type="text" value="{{$user_parent->user->email ?? ''}}" readonly name="email" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6 text-center">

                <a href="{{route('client.index')}}" class="btn btn-danger">إلغاء</a>
            </div>
            </div>
        </form>

        @endsection

