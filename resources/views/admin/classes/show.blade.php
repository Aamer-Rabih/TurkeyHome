@extends('admin.layouts.master')

@section('content')

<?php 
    $subjects= $class->subjects;
?>

<div id="content">
  @if(Auth::user()->hasAnyRole([0,1]))
  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة {{$class->name}}</small></h1>
        </div>
      </div>
      <div class="col-lg-2">
        @if(Auth::user()->hasRole(0) || Auth::user()->hasRole(1) || Auth::user()->hasRole(2))
          @if(!$class->free)
          <form action="{{ route('class.free', $class) }}" method="POST" id="makeClassFreeForm" style="display:inline; margin-right:10px;">
            {!! csrf_field() !!}
            <a href="#" class="btn btn-success button-margin-header custom-but" onclick="document.getElementById('makeClassFreeForm').submit();"> اجعل الصف مجاني</a>
            </form>
            @else
            <form action="{{ route('class.priced', $class) }}" method="POST" id="makeClassUnfreeForm" style="display:inline; margin-right:10px;">
              {!! csrf_field() !!}
              <a href="#" class="btn btn-success button-margin-header custom-but" onclick="document.getElementById('makeClassUnfreeForm').submit();"> اجعل الصف غير مجاني</a>
          </form>
          @endif
        @endif
      </div>
      <div class="col-lg-6">
        <a href="{{route('class.index')}}" class="btn btn-primary button-margin-header custom-but pull-left" > إدارة كافة الصفوف 
          <i class="fa fa-angle-double-left" aria-hidden="true" style="font-size: 20px;"></i>
        </a>
      </div> 
    </div>
  </div>
  @elseif(Auth::user()->hasAnyRole([2,3]))
  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> محتوى {{$class->name}}</small></h1>
        </div>
      </div>
      <div class="col-lg-2">
        <form action="{{ route('classrequest.store') }}" method="POST" id="makeClassFreeForm" style="display:inline; margin-right:10px;">
          {!! csrf_field() !!}
          <input type="hidden" name="class_id" value="{{$class->id}}">
          <a href="#" class="btn btn-success button-margin-header custom-but" onclick="document.getElementById('makeClassFreeForm').submit();"> طلب انضمام لهذا الصف</a>
        </form>
      </div>
      <div class="col-lg-6">
        <a href="{{route('class.index')}}" class="btn btn-primary button-margin-header custom-but pull-left" > العودة
          <i class="fa fa-angle-double-left" aria-hidden="true" style="font-size: 20px;"></i>
        </a>
      </div> 
    </div>
  </div>
  @endif
        
  <div id="table" class="row">
    <div class="col-lg-10">
      <div class="card table-cards color-grey">
        <div class="card-body">
          <div class="content-header">
            <div class="col-lg-8">
              <h2>
                <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i> المواد الدراسية ضمن {{$class->name}}</small>
              </h2>
            </div>
            @if(Auth::user()->hasRole(0) || Auth::user()->hasRole(1) || Auth::user()->hasRole(2))
            <div claass="col-lg-2">
              <a href="/subjects/create?selectedclass={{$class->id}}" class="btn btn-success button-margin-header custom-but" style="margin-right: 22px" >إضافة مادة 
                <i class="fa fa-plus" aria-hidden="true" style="font-size:16px"></i>
              </a>
            </div>
            @endif
          </div>
          <table class="table table-bordered table-hover table-width">
            <thead>
              <tr> 
                <th>اسم المادة</th>
                @if(Auth::user()->hasAnyRole([0,1]))
                <th>التفعيل</th>
                @endif
                <th>عدد الوحدات الدرسية</th>
                <th>قابلية الدروس للتنزيل</th>
                <th>العرض</th>
                @if(Auth::user()->hasAnyRole([0,1]))
                <th>التعديل</th>
                <th>الحذف</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach($class->subjects as $subject)
              <tr>
                <td>{{$subject->name}}</td>
                @if(Auth::user()->hasAnyRole([0,1]))
                @if($subject->active)
                <td class="operations">
                  <form action="{{ route('subject.deactivate', $subject) }}" method="POST" id="activateForm">
                    {!! csrf_field() !!}
                    <button id="{{$subject->id}}" class=" btn-xs delete-button" style="display:none;"></button>
                    <a herf="javascript:;" class="" onclick="$('#{{$subject->id}}').click();" >
                      <i class="fa fa-check-circle" aria-hidden="true" style="font-size:18px;color:#5cb85c;cursor: pointer;"></i>
                    </a>
                  </form>          
                </td>
                @else
                <td class="operations">
                  <form action="{{ route('subject.activate', $subject) }}" method="POST" id="activateForm">
                    {!! csrf_field() !!}
                    <button id="{{$subject->id}}" class=" btn-xs delete-button" style="display:none;"></button>
                    <a herf="javascript:;" class="" onclick="$('#{{$subject->id}}').click();" >
                      <i class="fa fa-times-circle" aria-hidden="true" style="font-size:18px;color:#dd4b39;cursor: pointer;"></i>
                    </a>
                  </form>                    
                </td>
                @endif
                @endif
                <td>{{$subject->units->count()}}</td>
                @if($subject->downloable)
                <td>قابلة للتنزيل</td>
                @else
                <td>غير قابلة للتنزيل</td>
                @endif
                <td>
                  <div class="operations show">
                    <a href="{{ route('subject.show', $subject) }}"><i class="fa fa-eye" style="font-size:18px;color:#5cb85c"></i></a>
                  </div>
                </td>
                @if(Auth::user()->hasAnyRole([0,1]))
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
                      <button id="{{$subject->id}}" class=" btn-xs delete-button" style="display:none;"></button>
                      <a herf="javascript:;" class="" onclick="$('#{{$subject->id}}').click();" >
                        <i class="fa fa-trash" style="font-size:18px;color:#dd4b39;cursor: pointer;"></i>
                      </a>
                    </form>                           
                  </div>
                </td>
                @endif
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
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i>مدرسوا الصف</small>
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
              @foreach($teachersClass as $teacherClass)
              <tr>
                <td>{{$teacherClass->username}}</td>
                
                
                 
                <td>
                  <div class="operations delete">
                    <form action="{{ route('class.deleteteacher',['class' => $class->id, 'teacher_id'=>$teacherClass->id]) }}" method="POST" id="deleteForm">
                       {!! csrf_field() !!}
                         
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


  @if(Auth::user()->hasRole(0) || Auth::user()->hasRole(1) || Auth::user()->hasRole(2))
  <div id="table2" class="row">
    <div class="col-lg-10">
      <div class="card table-cards color-grey">
        <div class="card-body">
          <div class="content-header">
            <h2>
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i> إضافة مدرس لهذا الصف</small>
            </h2>
          </div>
          
          <form action="{{route('class.addteacher',$class)}}" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
              <label for="addteacher">اختر مدرس لاضافته الى هذا الصف :</label>
              <select class="form-control form-control-select mt-3" id="addteacher" name="teacher">
                <option selected>-- اختر مدّرس --</option>
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
  @endif

</div>

@endsection



