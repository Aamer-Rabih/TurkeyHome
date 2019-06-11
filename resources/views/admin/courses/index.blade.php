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
        <a href="{{route('course.create')}}" class="btn btn-success myhover BP" role="button">إضافة دورة دراسية<div><i class="material-icons" style="font-size:16px">add_box</i></div></a>
      </div>
    </div>
  </div>

  <div id="table" class="row">
    <div class="col-lg-8">
      <div class="card table-cards color-grey">
        <div class="content-header">
          <h2>
            <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i>الدورات الدراسية</small>
          </h2>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-hover table-width">
            <thead>
              <tr> 
                <th>اسم الدورة</th>
                @if(Auth::user()->hasAnyRole([0,1,2]))
                <th>التفعيل</th>
                <th>العرض</th>
                <th>التعديل</th>
                <th>الحذف</th>
                @endif
                @if(Auth::user()->hasRole(3))
                <th>طلب اشتراك</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach($courses as $course)
              <tr>
                <td>{{$course->title}}</td>
                @if(Auth::user()->hasAnyRole([0,1,2]))
                @if($course->active)
                <td>فعال</td>
                @elseif(!$course->active)
                <td>غير فعال</td>
                @endif
                <td>
                  <div class="operations show">
                    <a href="{{ route('course.show', $course) }}"><i class="fa fa-eye" style="font-size:18px;color:#5cb85c"></i></a>
                  </div>
                </td>
                <td>
                  <div class="operations update">
                     <a href="{{ route('course.edit', $course) }}"><i class="fa fa-edit" style="font-size:18px;color:#00c0ef"></i></a>
                  </div>
                </td>
                <td>
                  <div class="operations delete">
                    <form action="{{ route('course.destroy', $course) }}" method="POST" id="deleteForm">
                      {!! csrf_field() !!}
                      <input type="hidden" name="_method" value="DELETE">    
                      <button id="{{$course->id}}" class=" btn-xs delete-button" style="display:none;"></button>
                      <a herf="javascript:;" class="" onclick="$('#{{$course->id}}').click();" >
                        <i class="fa fa-trash" style="font-size:18px;color:#dd4b39"></i>
                      </a>
                    </form>
                    
                  </div>
                </td>
                @endif

                @if(Auth::user()->hasRole(3))
                <td><form action="{{ route('courserequest.store') }}" method="POST" id="makeCourseFreeForm" style="display:inline; margin-right:10px;">
          {!! csrf_field() !!}
          <input type="hidden" name="course_id" value="{{$course->id}}">
          <a href="#" class="btn btn-success button-margin-header custom-but" onclick="document.getElementById('makeClassFreeForm').submit();"> طلب اشتراك بهذه الدورة</a>
          </form></td>
                @endif
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