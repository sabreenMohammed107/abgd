@extends('layout.web')

@section('title', ' الصلاحيات')

@section('content')


<div class="box">
    <div class="box-header">
      <h3 class="box-title"> الصلاحيات</h3>
      <a href="{{ route('roles.create') }}" class="btn btn-info btn-lg pull-right"> اضافة </a>

    </div><!-- /.box-header -->
    <div class="box-body">

            <div class="box-body">
                <table id="table" data-toggle="table" data-pagination="true" data-search="true"  data-resizable="true" data-cookie="true"
                data-show-export="true" data-locale="ar-SA"  style="direction: rtl" >
                                   <thead>
                                    <th data-field="state" data-checkbox="false"></th>
                                    <th data-field="id">#</th>
     <th>الاسم</th>
     <th width="280px">الإجراءات</th>
  </tr>
                                   </thead>
    @foreach ($roles as $key => $role)
    <tr>
        <td> </td>
        <td>{{ $key + 1  }}</td>
        <td>{{ $role->name }}</td>
        <td>
            {{-- <a class="btn btn-default" href="{{ route('roles.show',$role->id) }}"><i class="fas fa-eye" title="view"></i></a> --}}


            <a class="btn btn-default" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-edit" title="edit"></i></a>

            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
            {{-- {!! Form::submit('Delete', ['class' => 'btn btn-default']) !!} --}}
            {{ Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class' => 'btn btn-default'] )  }}

            {!! Form::close() !!}

        </td>
    </tr>
    @endforeach
</table>


{{-- {!! $roles->render() !!} --}}



</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
@endsection
