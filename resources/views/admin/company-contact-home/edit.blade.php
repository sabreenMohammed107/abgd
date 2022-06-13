@extends('layout.web')

@section('title', 'بيانات التواصل')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">تعديل</h3>
        </div>






                  <form action="{{route('admin-company-contact-home.update',$row->id)}}" method="POST">
                @method('PUT')
				  @csrf
                  <div class="box-body">
                    <div>
                        <h2 style="text-align: center">الهيدر الرئيسي</h2>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label  >{{ __('  عنوان عن الشركة عربي') }}</label>
                            <textarea class="form-control " name="overview_title_ar">{{$row->overview_title_ar}}</textarea>


                        </div>
                </div>
                <hr>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label  >{{ __('  عنوان عن الشركةانجليزى') }}</label>
                            <textarea class="form-control " name="overview_title_en">{{$row->overview_title_en}}</textarea>


                        </div>
                </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label  >{{ __(' عن الشركة عربى ') }}</label>
                                <textarea class="form-control " name="overview_text_ar">{{$row->overview_text_ar}}</textarea>


                            </div>
                    </div>
                    <hr>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label  >{{ __(' عن الشركة انجليزى') }}</label>
                                <textarea class="form-control " name="overview_text_en">{{$row->overview_text_en}}</textarea>


                            </div>
                    </div>

                    <hr style=" border: 1px dotted rgb(93, 92, 92);">
                    <div>
                        <h2 style="text-align: center">من نحن</h2>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label  >{{ __('  نص ابجد عربى ') }}</label>
                            <textarea class="form-control " name="who_abgd_text_ar">{{$row->who_abgd_text_ar}}</textarea>


                        </div>
                </div>
                <hr>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label  >{{ __(' نص ابجد انجليزى') }}</label>
                            <textarea class="form-control " name="who_abgd_text_en">{{$row->who_abgd_text_en}}</textarea>


                        </div>
                </div>

                <hr style=" border: 1px dotted rgb(93, 92, 92);">
                <div>
                    <h2 style="text-align: center">لماذا ابجد</h2>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label  >{{ __(' لماذا ابجد انجليزى') }}</label>
                        <textarea class="form-control " name="why_us_text_en">{{$row->why_us_text_en}}</textarea>


                    </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label  >{{ __(' لماذا ابجد عربى ') }}</label>
                    <textarea class="form-control " name="why_us_text_ar">{{$row->why_us_text_ar}}</textarea>


                </div>
        </div>
        <hr>
        <hr style=" border: 1px dotted rgb(93, 92, 92);">

        <div>
            <h2 style="text-align: center">لماذا ابجد</h2>
        </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label  >{{ __(' التحق بنا انجليزى') }}</label>
                    <textarea class="form-control " name="join_us_text_en">{{$row->join_us_text_en}}</textarea>


                </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label  >{{ __(' التحق بنا عربى ') }}</label>
                <textarea class="form-control " name="join_us_text_ar">{{$row->join_us_text_ar}}</textarea>


            </div>
    </div>


    <hr>
    <hr style=" border: 1px dotted rgb(93, 92, 92);">
    <div>
        <h2 style="text-align: center">خطوات التقديم</h2>
    </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label  >{{ __(' سجل معانا انجليزى') }}</label>
                <textarea class="form-control " name="how_register_text_en">{{$row->how_register_text_en}}</textarea>


            </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label  >{{ __(' سجل معنا عربى ') }}</label>
            <textarea class="form-control " name="how_register_text_ar">{{$row->how_register_text_ar}}</textarea>


        </div>
</div>
<hr>
{{--
    <div class="col-sm-12">
        <div class="form-group">
            <label  >{{ __(' تواصل معنا انجليزى') }}</label>
            <textarea class="form-control " name="contact_us_text_en">{{$row->contact_us_text_en}}</textarea>


        </div>
</div>

<div class="col-sm-12">
    <div class="form-group">
        <label  >{{ __(' تواصل معانا عربى ') }}</label>
        <textarea class="form-control " name="contact_us_text_ar">{{$row->contact_us_text_ar}}</textarea>


    </div>
</div>
<hr> --}}
                    {{-- <div class="col-md-12">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label  >{{ __(' تليفون') }}</label>
                                <input type="text" id="newTitle" name="phones" value="{{$row->phones}}" class="form-control"
                                   placeholder=" تليفون">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label  >{{ __(' واتس اب') }}</label>
                                    <input type="text" id="newTitle" name="whatsapp" value="{{$row->whatsapp}}" class="form-control"
                                       placeholder=" واتس اب">
                                </div>
                            </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label  >{{ __(' البريد الالكترونى') }}</label>
                                    <input type="text" id="newTitle" name="email" value="{{$row->email}}" class="form-control"
                                       placeholder="البريد الالكترونى">
                            </div>
                            </div>

                        <div class="col-sm-6">
                        <div class="form-group">
                            <label  >{{ __(' facebook') }}</label>
                                <input type="text" id="facebook" name="facebook" value="{{$row->facebook}}" class="form-control"
                                   placeholder=" facebook">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label  >{{ __('  twitter') }}</label>
                                    <input type="text" id="newTitle" name="twitter" value="{{$row->twitter}}" class="form-control"
                                       placeholder=" twitter">
                            </div>
                            </div>

                        <div class="col-sm-6">
                        <div class="form-group">
                            <label  >{{ __(' instagram') }}</label>
                                <input type="text" id="newTitle" name="instagram" value="{{$row->instagram}}" class="form-control"
                                   placeholder=" instagram">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label  >{{ __('  youtube') }}</label>
                                    <input type="text" id="newTitle" name="youtube" value="{{$row->youtube}}" class="form-control"
                                       placeholder=" youtube">
                            </div>
                            </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label  >{{ __('  linkedin') }}</label>
                                    <input type="text" id="newTitle" name="linkedin" value="{{$row->linkedin}}" class="form-control"
                                       placeholder=" linkedin">
                            </div>
                            </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label  >{{ __('  العنوان عربي') }}</label>
                                <textarea class="form-control " name="address_ar">{{$row->address_ar}}</textarea>


                            </div>
                            </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label  >{{ __('  العنوان انجليزي') }}</label>
                                <textarea class="form-control " name="address_en">{{$row->address_en}}</textarea>


                            </div>
                            </div>
                    </div> --}}
                <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <a href="{{route('admin-company-contact-home.index')}}" class="btn btn-danger">إلغاء</a>
                </div>
                </div>

                  </form>
              </div>
    </div>

@endsection
