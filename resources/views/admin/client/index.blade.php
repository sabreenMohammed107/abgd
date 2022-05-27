@extends('layout.web')

@section('title', ' العملاء')

@section('content')


<div class="box">
    <div class="box-header">
      <h3 class="box-title"> العملاء</h3>

    </div><!-- /.box-header -->
    <div class="box-body">

            <div class="box-body">
                <table id="table" data-toggle="table" data-pagination="true" data-search="true"  data-resizable="true" data-cookie="true"
                data-show-export="true" data-locale="ar-SA"  style="direction: rtl" >
                                   <thead>
<tr>
                                    <th data-field="state" data-checkbox="false"></th>
                                    <th data-field="id">#</th>
   <th>الاسم</th>
   <th>البريد الإلكترونى</th>
   <th>الموبايل</th>
   <th width="280px">اجراءات</th>
 </tr>
                                   </thead>

 @foreach ($data as $key => $row)
  <tr>
      <td> </td>
    <td>{{ $key + 1  }}</td>
    <td>{{ $row->user->name ?? ''}}</td>
    <td>{{ $row->user->email ?? '' }}</td>
    <td>{{ $row->user->phone ?? ''}}</td>
    <td>
        <div class="btn-group">

       <a class="btn btn-default" href="{{ route('client.show',$row->id) }}"><i class="fa fa-edit" title="edit"></i></a>
        {!! Form::open(['method' => 'DELETE','route' => ['client.destroy', $row->id],'style'=>'display:inline']) !!}
            {{-- {!! Form::submit('Delete', ['class' => 'btn btn-default']) !!} --}}
            {{ Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class' => 'btn btn-default'] )  }}

            {!! Form::close() !!}
        </div>
    </td>
  </tr>
 @endforeach
</table>


{{-- {!! $data->render() !!} --}}

</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->

@endsection
