@extends('layout.web')

@section('title', ' المستخدمين')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">اضافة</h3>
        </div>





{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
<div class="box-body">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>الاسم:</strong>
            {!! Form::text('name', null, array('placeholder' => 'الاسم','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>تليفون:</strong>
            {!! Form::text('phone', null, array('placeholder' => ' تليفون','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>البريد الالكتروني:</strong>
            {!! Form::text('email', null, array('placeholder' => 'البريد الالكتروني','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>كلمة المرور:</strong>
            {!! Form::password('password', array('placeholder' => 'كلمة المرور','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>تأكيد كلمة المرور:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'تأكيد كلمة المرور','class' => 'form-control')) !!}
        </div>
    </div>



    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>الصلاحية:</strong>
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">حفظ</button>
        <a href="{{route('users.index')}}" class="btn btn-danger">إلغاء</a>

    </div>
</div>
{!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
