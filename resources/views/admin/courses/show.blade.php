@extends('admin.layouts.master')

@section('content')

<div id="content">
    
    <div class="header-card table-cards color-grey">
        <div class="row">
            <div class="col-lg-4">
                <div class="content-header">
                    <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة الدورات الدراسية</small></h1>
                </div>
            </div>
            <div class="col-lg-2">
                @if(!$course->active)
                <form action="{{ route('course.activate', $course) }}" method="POST" id="makeCourseActive" style="display:inline; margin-right:10px;">
                    {!! csrf_field() !!}
                    <a href="#" class="btn btn-success button-margin-header custom-but" onclick="document.getElementById('makeCourseActive').submit();">تفعيل الدورة</a>
                </form>
                @else
                <form action="{{ route('course.deactivate', $course) }}" method="POST" id="makeCourseDeactive" style="display:inline; margin-right:10px;">
                    {!! csrf_field() !!}
                    <a href="#" class="btn btn-success button-margin-header custom-but" onclick="document.getElementById('makeCourseDeactive').submit();">إلغاء تفعيل الدورة</a>
                </form>
                @endif
            </div>
            <div class="col-lg-2">
                <a href="/lessons/create?selectedcourse={{$course->id}}" class="btn btn-success button-margin-header" style="margin-right: 22px" >إضافة درس  
                    <i class="fa fa-plus" aria-hidden="true" style="font-size:16px"></i>
                </a> 
            </div>
            <div class="col-lg-4">
                <a href="{{route('course.index')}}" class="btn btn-primary button-margin-header custom-but pull-left" > إدارة كافة الدورات 
                    <i class="fa fa-angle-double-left" aria-hidden="true" style="font-size: 20px;"></i>
                </a>
            </div> 
        </div>
    </div>

    <div id="table" class="row">
        <div class="col-lg-8">
            <div class="card table-cards color-grey">
                <div class="card-body">
                    <div class="content-header">
                        <h2>
                        <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i> الدروس المعتمدة ضمن {{$course->title}}</small>
                        </h2>
                    </div>
                    <table class="table table-bordered table-hover table-width">
                        <thead>
                        <tr> 
                            <th>عنوان الدرس</th>
                            <th>نوع الملف</th>
                            <th>التفعيل</th>
                            <th>العرض</th>
                            <th>التعديل</th>
                            <th>الحذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lessons as $lesson)
                        <tr>
                            <td>{{$lesson->title}}</td>
                            <td>{{$lesson->type}}</td>
                            <td class="operations">
                            @if($lesson->active)
                            <form action="{{ route('lesson.deactivate', $lesson) }}" method="POST" id="activateForm">
                                {!! csrf_field() !!}
                                <button id="{{$lesson->id+1}}" class=" btn-xs delete-button" style="display:none;"></button>
                                <a herf="javascript:;" class="" onclick="$('#{{$lesson->id+1}}').click();" >
                                <i class="fa fa-check-circle" aria-hidden="true" style="font-size:18px;color:#5cb85c;cursor: pointer;"></i>
                                </a>
                            </form> 
                            @else
                            <form action="{{ route('lesson.activate', $lesson) }}" method="POST" id="activateForm">
                                {!! csrf_field() !!}
                                <button id="{{$lesson->id}}" class=" btn-xs delete-button" style="display:none;"></button>
                                <a herf="javascript:;" class="" onclick="$('#{{$lesson->id}}').click();" >
                                <i class="fa fa-times-circle" aria-hidden="true" style="font-size:18px;color:#dd4b39;cursor: pointer;"></i>
                                </a>
                            </form>
                            @endif          
                            </td>
                            <td>
                            <div class="operations show">
                                <a href="{{ route('lesson.show', $lesson) }}"><i class="fa fa-eye" style="font-size:18px;color:#5cb85c"></i></a>
                            </div>
                            </td>
                            <td>
                            <div class="operations update">
                                <a href="{{ route('lesson.edit', $lesson) }}"><i class="fa fa-edit" style="font-size:18px;color:#00c0ef"></i></a>
                            </div>
                            </td>
                            <td>
                            <div class="operations delete">
                                <form action="{{ route('lesson.destroy', $lesson) }}" method="POST" id="deleteForm">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">    
                                <button id="{{$lesson->id}}" class=" btn-xs delete-button" style="display:none;"></button>
                                <a herf="javascript:;" class="" onclick="$('#{{$lesson->id}}').click();" >
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


    <div id="table" class="row">
    <div class="col-lg-8">
      <div class="card table-cards color-grey">
        <div class="card-body">
          <div class="content-header">
            <h2>
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i>مدرسوا الدورة</small>
            </h2>
          </div>
          <table class="table table-bordered table-hover table-width">
            <thead>
              <tr> 
                <th>اسم المدرس</th>
                
                <th>حذف</th>
              </tr>
            </thead>
            <tbody>
              @foreach($teachersCourse as $teacherCourse)
              <tr>
                <td>{{$teacherCourse->username}}</td>
                
                
                 
                <td>
                  <div class="operations delete">
                    <form action="{{ route('course.deleteteacher',['course' => $course->id, 'teacher_id'=>$teacherCourse->id]) }}" method="POST" id="deleteForm">
                       {!! csrf_field() !!}
                         
                      <button id="{{$course->id}}" class=" btn-xs delete-button" style="display:none;"></button>
                      <a herf="javascript:;" class="" onclick="$('#{{$course->id}}').click();" >
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



  <div id="table2" class="row">
    <div class="col-lg-10">
      <div class="card table-cards color-grey">
        <div class="card-body">
          <div class="content-header">
            <h2>
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i> </small>
            </h2>
          </div>
          
          <form action="{{route('course.addteacher',$course)}}" method="POST">
            {!! csrf_field() !!}
          <div class="form-group">
          <label for="addteacher">اختر مدرس لاضافته الى هذه الدورة</label>
          <select name="teacher" id="teacher" class="form-contorl form-control-select mt-3">
          @foreach($teachers as $teacher)
          <option value="{{$teacher->id}}">{{$teacher->username}}</option>
          @endforeach
          </select>
          </div>
          <input type="submit" class="btn btn-success button1" value="اضافة المدرس">
          </form> 
        </div>
      </div>
    </div>
  </div>

</div>

@endsection


