@extends('admin.layouts.master')

@section('content')

<div id="content">

  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة الصفوف</small></h1>
        </div>
      </div>
      <div class="col-lg-2">
        <a href="{{route('class.create')}}" class="btn btn-success custom-but BP" >إضافة صف <div><i class="fa fa-plus-square" aria-hidden="true"></i></div></a>
      </div>
    </div>
  </div>
  
  <div id="table" class="row">
    <div class="col-lg-8">
      <div class="card table-cards color-grey">
        <div class="card-body">
          <div class="content-header">
            <h2>
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i> الصفوف الدراسية</small>
            </h2>
          </div>
          <table class="table table-bordered table-hover table-width">
            <thead>
              <tr> 
                <th>الصف الدراسي</th>
                <th>المجانية</th>
                <th>عرض</th>
                <th>تعديل</th>
                <th>حذف</th>
              </tr>
            </thead>
            <tbody>
              @foreach($classes as $class)
              <tr>
                <td>{{$class->name}}</td>
                @if($class->free)
                <td>مجاني</td>
                @elseif(!$class->free)
                <td>غير مجاني</td>
                @endif
                <td>
                  <div class="operations show">
                    <a href="{{ route('class.show', $class) }}"><i class="fa fa-eye" style="font-size:18px;color:#5cb85c"></i></a>
                  </div>
                </td>
                <td>
                  <div class="operations update">
                    <a href="{{ route('class.edit', $class) }}"><i class="fa fa-edit" style="font-size:18px;color:#00c0ef"></i></a>
                  </div>
                </td>
                <td>
                  <div class="operations delete">
                    <form action="{{ route('class.destroy',['class' => $class->id]) }}" method="POST" id="deleteForm">
                      {!! csrf_field() !!}
                      <input type="hidden" name="_method" value="DELETE">    
                      <button id="{{$class->id}}" class=" btn-xs delete-button" style="display:none;"></button>
                      <a herf="javascript:;" class="" onclick="$('#{{$class->id}}').click();" >
                        <i class="fa fa-trash" style="font-size:18px;color:#dd4b39"></i>
                      </a>
                    </form>       
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