@extends('layout.web')

@section('title', 'الصور الرئيسية')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">اضافة</h3>
        </div>






                  <form action="{{route('home-slider.store')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="box-body">

                        <div class="col-sm-12">
                        <div class="form-group">
                            <label  >{{ __('  العنوان عربى ') }}</label>
                            <textarea class="form-control " name="title_ar" maxlength="10" > {{old('title_ar')}}</textarea>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label  >{{ __('  العنوان انجليزى ') }}</label>
                                <textarea class="form-control " name="title_en" maxlength="10" > {{old('title_en')}}</textarea>

                                </div>
                            </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label  >{{ __('  النص عربي ') }}</label>
                                <textarea class="form-control " name="text_ar" maxlength="50" > {{old('text_ar')}}</textarea>

                                </div>
                            </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label  >{{ __('  النص انجليزى ') }}</label>
                                <textarea class="form-control " name="text_en" maxlength="50">{{old('text_en')}}</textarea>


                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">اضافة  صورة</label>

                                    <input type="file" name="img" class="custom-file-input"
                                    id="inputGroupFile02" />


                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">الترتيب</label>
                                    <input type="number"
                                        value="{{old('order')}}"
                                        name="order" class="form-control"
                                        id="">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="checkbox">
                                      <label>
                                        {{ __('نشط') }}
                                        <input type="checkbox" checked  id="newTitle" name="active"  value="1"/>

                                      </label>
                                    </div>

                            </div>
                            </div>

                <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <a href="{{route('home-slider.index')}}" class="btn btn-danger">إلغاء</a>
                </div>
                </div>

                  </form>
              </div>
    </div>

@endsection
