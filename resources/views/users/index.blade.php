@extends('layout.web')

@section('title', ' المستخدمين')

@section('content')


<div class="box">
    <div class="box-header">
      <h3 class="box-title"> المستخدمين</h3>
      <a href="{{ route('users.create') }}" class="btn btn-info btn-lg pull-right"> اضافة </a>

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
   <th>الصلاحيه</th>
   <th width="280px">اجراءات</th>
 </tr>
                                   </thead>

 @foreach ($data as $key => $user)
  <tr>
      <td> </td>
    <td>{{ $key + 1  }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
        <div class="btn-group">

       <a class="btn btn-default" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-edit" title="edit"></i></a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
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
