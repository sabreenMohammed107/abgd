@extends('layout.web')

@section('title', 'الصور الرئيسية')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">تعديل</h3>
        </div>






                  <form action="{{route('home-slider.update',$row->id)}}"  method="post" enctype="multipart/form-data">

                @method('PUT')
				  @csrf
                  <div class="box-body">

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label  >{{ __('  العنوان عربى ') }}</label>
                            <textarea class="form-control " name="title_ar" maxlength="10" > {{$row->title_ar}}</textarea>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label  >{{ __('  العنوان انجليزى ') }}</label>
                                <textarea class="form-control " name="title_en" maxlength="10" > {{$row->title_en}}</textarea>

                                </div>
                            </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label  >{{ __('  النص عربي ') }}</label>
                                <textarea class="form-control " name="text_ar" maxlength="50" > {{$row->text_ar}}</textarea>

                                </div>
                            </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label  >{{ __('  النص انجليزى ') }}</label>
                                <textarea class="form-control " name="text_en" maxlength="50" >{{$row->text_en}}</textarea>


                            </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">اضافة صورة</label>

                                    <div class="custom-file">
                                        <input type="file" name="img"
                                            class="custom-file-input"
                                            id="inputGroupFile02" />
                                        <label class="custom-file-label"
                                            for="inputGroupFile02">{{ $row->image ?? '' }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">الترتيب</label>
                                    <input type="number"
                                        value="{{$row->order}}"
                                        name="order" class="form-control"
                                        id="">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="checkbox">
                                      <label>
                                        {{ __('نشط') }}
                                        <input type="checkbox" @if($row->active==1) checked @endif id="newTitle" name="active"  value="1"/>

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
