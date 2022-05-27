@extends('layout.web')

@section('title', 'كيفية التسجيل')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">اضافة</h3>
        </div>






                  <form action="{{route('how-register.store')}}" method="POST" enctype="multipart/form-data">
				  @csrf
                  <div class="box-body">

                        <div class="col-sm-12">
                        <div class="form-group">
                            <label  >{{ __('  الاسم عربي ') }}</label>
                                <input type="text" id="newTitle" name="title_ar" value="{{old('title_ar')}}" class="form-control"
                                   placeholder=" العنوان">
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <div class="form-group">
                                <label  >{{ __('  الاسم انجليزى ') }}</label>
                                <input type="text" id="newTitle" name="title_en" value="{{old('title_en')}}" class="form-control"
                                placeholder=" العنوان">

                            </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label  >{{ __('  النص عربي ') }}</label>
                                    <textarea class="form-control " name="text_ar">{{old('text_ar')}}</textarea>


                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label  >{{ __('  النص انجليزى ') }}</label>
                                        <textarea class="form-control " name="text_en">{{old('text_en')}}</textarea>


                                    </div>
                                    </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">اضافة  صورة</label>

                                    <input type="file" name="img" class="custom-file-input"
                                    id="inputGroupFile02" />


                                </div>
                            </div> --}}
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">الترتيب</label>
                                    <input type="number"
                                        value="{{old('order')}}"
                                        name="order" class="form-control"
                                        id="">
                                </div>
                            </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <a href="{{route('how-register.index')}}" class="btn btn-danger">إلغاء</a>
                </div>
                </div>

                  </form>
              </div>
    </div>

@endsection
