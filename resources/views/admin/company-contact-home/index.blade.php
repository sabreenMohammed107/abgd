@extends('layout.web')

@section('title', 'بيانات الصفحة الرئيسية')

@section('content')





            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">  البيانات</h3>

                </div>
            <div class="box-body">

                <div class="box-body">
                    <table id="table" data-toggle="table" data-pagination="true" data-search="true"  data-resizable="true" data-cookie="true"
                    data-show-export="true" data-locale="ar-SA"  style="direction: rtl" >
               						<thead>
                                        <th data-field="state" data-checkbox="false"></th>
                                        <th data-field="id">#</th>
                            <th>عنوان عن الشركة </th>

                            <th>لماذا ابجد  </th>

                            <th> التحق بنا </th>
                            <th>  سجل معانا  </th>

							<th>{{ __('الإجراء') }}</th>
						</thead>
						<tbody>
						@foreach($rows as $index => $row)
							<tr>
                                <td></td>

							<td>{{ $index +1 }}</td>
                            <td>{!! $row->overview_title_ar !!}</td>
                            <td>{{$row->why_us_text_ar}} </td>
                            <td>{!! $row->join_us_text_ar !!}</td>
                            <td>{!! $row->how_register_text_ar !!}</td>

                                      <td>
                                        <div class="btn-group">

                                            <a href="{{ route('admin-company-contact-home.edit', $row->id) }}"><p class=" fa fa-cogs"></p></a>


                                        </div>
                                    </td>
							</tr>

							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
