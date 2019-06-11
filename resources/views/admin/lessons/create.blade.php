@extends('admin.layouts.master')

@section('content')

<div id="content">
  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة المواد الدراسية</small></h1>
        </div>
      </div>
    </div>
  </div>
  <div id="table" class="row">
    <div class="card-deck">       
      <div class="col-lg-6">
        <div class="card color-grey">
          <div class="card-body">
            <div class="card-header">اضافة درس جديد <i class="fa fa-plus-square" aria-hidden="true"></i></div>
              
              <form action="{{route('lesson.store')}}" enctype="multipart/form-data" method="POST" >
                      {!! csrf_field() !!}
                <div class="form-group">
                  <label for="lesson"><h5>الدرس :</h5></label>
                  <input type="text" class="form-control" id="lesson" name="title" required placeholder="اسم الدرس الجديد">
                </div>
                <div class="radioG">
                  <h5>تفعيل الدرس  :</h5>
                  <div class="radio">
                    <input type="radio" name="active" value="1" checked>
                    <label>مفعل</label>
                  </div>
                  <div class="radio">
                    <input type="radio" name="active" value="0">
                    <label>غير مفعل</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="classField">الوحدة الدراسية:</label>
                  @if($selectedUnit === null)
                    <select class="form-control form-control-select mt-3" id="classField" name="unit_id">
                      <option selected value="">-- اختر الوحدة --</option>
                      @foreach($units as $unit)
                      <option value="{{$unit->id}}">{{$unit->title}}</option>
                      @endforeach
                    </select>
                  @elseif($selectedUnit != null)
                    <select class="form-control form-control-select mt-3" id="classField" name="unit_id" disabled>
                      <option value="{{$selectedUnit->id}}">{{$selectedUnit->title}}</option>
                    </select>
                  @endif
                </div>

                <div class="form-group">
                  <label for="classField">الدورة الدراسية:</label>
                  @if($selectedCourse === null)
                    <select class="form-control form-control-select mt-3" id="classField" name="course_id">
                      <option selected vlaue="">-- اختر الدورة --</option>
                      @foreach($courses as $course)
                      <option value="{{$course->id}}">{{$course->title}}</option>
                      @endforeach
                    </select>
                  @elseif($selectedCourse != null)
                    <select class="form-control form-control-select mt-3" id="classField" name="course_id" disabled>
                      <option value="{{$selectedCourse->id}}">{{$selectedCourse->title}}</option>
                    </select>
                  @endif
                </div>

                <div class="form-group">
                  <label for="type">نوع الدرس :</label>
                  <select class="form-control form-control-select mt-3" name="type" id="type">
                   <option value="video">فديو</option>
                   <option value="image">صورة</option>
                   <option value="link">رابط</option>
                   <option value="pdf">pdf</option>
                   <option value="word">word</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="">ملف الدرس :</label>
                  <div class="input-group mt-3">
                    <div class="custom-file">
                      <input id="lessonFile" type="file" class="custom-file-input imageField" name="src">
                      <label class="custom-file-label imageFieldLabel" for="lessonFile">اختر ملف الدرس 
                        <i class="fa fa-upload pull-left" aria-hidden="true" style="margin-top:3px;"></i>
                      </label>
                    </div>
                  </div>
                </div>



                <div class="form-group">
                  <label for="intro"><h5>المقدمة :</h5></label>
                  <input type="text" class="form-control" id="intro" name="intro" required placeholder="مقدمة الدرس">
                </div>
                
                <button type="submit" class="btn btn-success button1">إضافة</button>
                <a href="{{route('unit.index')}}" class="btn btn-default" style="margin-right:5px">إلغاء</a>
              </form>
              
          </div>
        </div>
      </div>      
    </div>
  </div>
</div>

@endsection