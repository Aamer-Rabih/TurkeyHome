@extends('admin.layouts.master')

@section('content')

<div id="content">
  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة الوحدات الدراسية</small></h1>
        </div>
      </div>
      <div class="col-lg-2">
        @if(!$lesson->active)
        <form action="{{ route('lesson.activate', $lesson) }}" method="POST" id="makelessonActivate" style="display:inline; margin-right:10px;">
          {!! csrf_field() !!}
          <a href="#" class="btn btn-success button-margin-header custom-but" onclick="document.getElementById('makelessonActivate').submit();"> اجعل الوحدة مفعلة </a>
          </form>
          @else
          <form action="{{ route('lesson.deactivate', $lesson) }}" method="POST" id="makelessonDeactivate" style="display:inline; margin-right:10px;">
            {!! csrf_field() !!}
            <a href="#" class="btn btn-success button-margin-header custom-but" onclick="document.getElementById('makelessonDeactivate').submit();"> اجعل الوحدة غير مفعلة</a>
        </form>
        @endif
      </div>
      
      <div class="col-lg-4">
        <a href="{{route('lesson.index')}}" class="btn btn-primary button-margin-header custom-but pull-left" >العودة 
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
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i> معلومات الدرس</small>
            </h2>
          </div>
          <table class="table table-bordered table-hover table-width">
            <thead>
              <tr> 
                <th>اسم الدرس</th>
                <th>التفعيل</th>
                
                <th>رابط الدرس</th>
                <th>المقدمة</th>
              </tr>
            </thead>
            <tbody>
              
              <tr>
               <td>{{$lesson->title}}</td>
               <td>{{$lesson->acive}}</td>
               <td>{{$lesson->intro}}</td>
               <td><a href="{{$lesson->sc}}">تحميل الدرس</a></td>
               
              </tr>
              
            </tbody>
          </table>


        </div>
      </div>
    </div>
  </div>


  <div id="table" class="row">
    <div class="col-lg-10">
      <div class="card table-cards color-grey">
        <div class="card-body">
          <div class="content-header">
            <h2>
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i>تعليقات الدرس</small>
            </h2>
          </div>
          <table class="table table-bordered table-hover table-width">
            <thead>
              <tr> 
                <th>المعلق</th>
                <th>نوع المستخدم</th>
                <th>التعليق</th>
                
                
              </tr>
            </thead>
            <tbody>
              @foreach($comments as $comment)
              <tr>
               <td>{{$comment->commenter->username}}</td>
               <td>{{$comment->commenter_type}}</td>
               <td>{{$comment->content}}</td>
               
              </tr>
              @endforeach
            </tbody>
          </table>

          <form action="{{ route('lesson.addcomment', $lesson) }}" method="POST"  style="display:inline; margin-right:10px;">
            {!! csrf_field() !!}
            <div class="form-group">
            <label for="comment"> اضافة تعليق</label>
            <input class="form-control" type="text" name="content">
            </div>
            <input type="submit" class="btn btn-success myhover" value="اضافة تعليق">
        </form>


        </div>
      </div>
    </div>
  </div>



</div>
