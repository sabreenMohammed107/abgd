@extends('layout.web')

@section('title', 'كيفيه التسجيل')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">تعديل</h3>
        </div>






                  <form action="{{route('how-register.update',$row->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
				  @csrf
                  <div class="box-body">

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label  >{{ __('  الاسم عربي ') }}</label>
                                <input type="text" id="newTitle" name="title_ar" value="{{$row->title_ar}}" class="form-control"
                                   placeholder=" العنوان">
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <div class="form-group">
                                <label  >{{ __('  الاسم انجليزى ') }}</label>
                                <input type="text" id="newTitle" name="title_en" value="{{$row->title_en}}" class="form-control"
                                placeholder=" العنوان">

                            </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label  >{{ __('  النص عربي ') }}</label>

                                           <textarea class="form-control " name="text_ar">{{$row->text_ar}}</textarea>

                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label  >{{ __('  النص انجليزى ') }}</label>
                                        <textarea class="form-control " name="text_en">{{$row->text_en}}</textarea>


                                    </div>
                                    </div>
                            {{-- <div class="col-md-6">
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
                            </div> --}}
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">الترتيب</label>
                                    <input type="number"
                                        value="{{$row->order}}"
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
