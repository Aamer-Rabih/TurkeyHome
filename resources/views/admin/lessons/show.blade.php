@extends('admin.layouts.master')

@section('content')

<div id="content">
  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة درس {{$lesson->title}}</small></h1>
        </div>
      </div>
      <div class="col-lg-2">
        @if(!$lesson->free)
        <form action="{{ route('lesson.ativate', $lesson) }}" method="POST" id="makeClassFreeForm" style="display:inline; margin-right:10px;">
          {!! csrf_field() !!}
          <a href="#" class="btn btn-success button-margin-header custom-but" onclick="document.getElementById('makeClassFreeForm').submit();"> اجعل الصف مفعل</a>
          </form>
          @else
          <form action="{{ route('lesson.deactivate', $lesson) }}" method="POST" id="makeClassUnfreeForm" style="display:inline; margin-right:10px;">
            {!! csrf_field() !!}
            <a href="#" class="btn btn-success button-margin-header custom-but" onclick="document.getElementById('makeClassUnfreeForm').submit();"> اجعل الصف غير مفعل</a>
        </form>
        @endif
      </div>
      <div class="col-lg-6">
        <a href="{{route('lesson.index')}}" class="btn btn-primary button-margin-header custom-but pull-left" > إدارة كافة الدروس 
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
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i></small>
            </h2>
            <div class="border-padding">
              <div class="form-group">
                <label>اسم الدرس :</label>
                <p>{{$lesson->title}}</p>
              </div>
              <div class="form-group">
                <label>مقدمة عن الدرس :</label>
                <p>{{$lesson->intro}}</p>
              </div>
              <div class="form-group">
                <label>نوع ملف الدرس :</label>
                <p>{{$lesson->type}}</p>
              </div>
            </div>
            <a href="#" class="btn btn-success custom-but BP" > تنزيل الدرس </a>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection



