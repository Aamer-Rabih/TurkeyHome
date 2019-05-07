@extends('admin.layouts.master')

@section('content')

<?php 
    $subjects= $class->subjects;
?>

<div id="content">
  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة {{$class->name}}</small></h1>
        </div>
      </div>
      <div class="col-lg-2">
        @if(!$class->free)
        <form action="{{ route('class.free', $class) }}" method="POST" id="makeClassFreeForm" style="display:inline; margin-right:10px;">
          {!! csrf_field() !!}
          <a href="#" class="btn btn-success button-margin-header" onclick="document.getElementById('makeClassFreeForm').submit();"> اجعل الصف مجاني</a>
          </form>
          @else
          <form action="{{ route('class.priced', $class) }}" method="POST" id="makeClassUnfreeForm" style="display:inline; margin-right:10px;">
            {!! csrf_field() !!}
            <a href="#" class="btn btn-success button-margin-header" onclick="document.getElementById('makeClassUnfreeForm').submit();"> اجعل الصف غير مجاني</a>
        </form>
        @endif
      </div>
      <div class="col-lg-2">
        <a href="/subjects/create?selectedclass={{$class->id}}" class="btn btn-success button-margin-header" style="margin-right: 22px" >إضافة مادة 
          <i class="fa fa-plus" aria-hidden="true" style="font-size:16px"></i>
        </a>
      </div>
      <div class="col-lg-4">
        <a href="{{route('class.index')}}" class="btn btn-primary button-margin-header pull-left" > إدارة كافة الصفوف 
          <i class="fa fa-angle-double-left" aria-hidden="true" style="font-size: 20px;"></i>
        </a>
      </div> 
    </div>
  </div>
        
  <div id="table" class="row">
    <div class="col-lg-10">
      <div class="card table-cards color-grey">
        <div class="card-body">
          <div class="content-header">
            <h2>
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i> المواد الدراسية ضمن {{$class->name}}</small>
            </h2>
          </div>
          <table class="table table-bordered table-hover table-width">
            <thead>
              <tr> 
                <th>اسم المادة</th>
                <th>عدد الوحدات الدرسية</th>
                <th>التفعيل</th>
                <th>قابلية الدروس للتنزيل</th>
                <th>العرض</th>
                <th>التعديل</th>
                <th>الحذف</th>
              </tr>
            </thead>
            <tbody>
              @foreach($class->subjects as $subject)
              <tr>
                <td>{{$subject->name}}</td>
                <td>{{$subject->units->count()}}</td>
                @if($subject->active)
                <td>فعال</td>
                @else
                <td>غير فعال</td>
                @endif
                @if($subject->downloable)
                <td>قابلة للتنزيل</td>
                @else
                <td>غير قابلة للتنزيل</td>
                @endif
                <td>
                  <div class="operations update">
                    <a href="{{ route('subject.show', $subject) }}"><i class="fa fa-eye" style="font-size:18px;color:#5cb85c"></i></a>
                  </div>
                </td>
                <td>
                  <div class="operations update">
                    <a href="{{ route('subject.edit', $subject) }}"><i class="fa fa-edit" style="font-size:18px;color:#00c0ef"></i></a>
                  </div>
                </td>
                <td>
                  <div class="operations delete">
                    <form action="{{ route('subject.destroy', $subject) }}" method="POST" id="deleteForm">
                      {!! csrf_field() !!}
                      <input type="hidden" name="_method" value="DELETE">
                      <button id="{{$subject->id}}" class=" btn-xs delete-button" style="display:none;">
                        <i class="fa fa-trash" style="font-size:18px;color:#dd4b39"></i>
                      </button>
                      <a herf="javascript:;" class="" onclick="$('#{{$subject->id}}').click();" >
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



