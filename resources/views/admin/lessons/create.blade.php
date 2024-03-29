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
               
                <div class="form-group">
                  <label for="intro"><h5>المقدمة :</h5></label>
                  <input type="text" class="form-control" id="intro" name="intro" required placeholder="مقدمة الدرس">
                </div>

                @if($selectedUnit === null && $selectedCourse === null)
                <div class="form-group">
                    <label for="classField">الوحدة الدراسية:</label>
                    <select class="form-control form-control-select mt-3" id="classField" name="unit_id">
                      <option  selected>-- اختر الوحدة --</option>
                      @foreach($units as $unit)
                      <option value="{{$unit->id}}">{{$unit->title}}</option>
                      @endforeach
                    </select>
                </div>
                  @elseif($selectedUnit != null)
                  <div class="form-group">
                    <label for="classField">الوحدة الدراسية:</label>
                    <select class="form-control form-control-select mt-3" id="classField" name="unit_id" disabled>
                      <option value="{{$selectedUnit->id}}">{{$selectedUnit->title}}</option>
                    </select>
                  </div>
                  @endif
                
                @if($selectedCourse === null && $selectedUnit === null)
                <div class="form-group">
                    <label for="classField">الدورة الدراسية:</label>
                    <select class="form-control form-control-select mt-3" id="classField" name="course_id">
                      <option selected>-- اختر الدورة --</option>
                      @foreach($courses as $course)
                      <option value="{{$course->id}}">{{$course->title}}</option>
                      @endforeach
                    </select>
                  @elseif($selectedCourse != null)
                  <div class="form-group">
                    <label for="classField">الدورة الدراسية:</label>
                    <select class="form-control form-control-select mt-3" id="classField" name="course_id" readonly>
                      <option value="{{$selectedCourse->id}}">{{$selectedCourse->title}}</option>
                    </select>
                  
                </div>
                @endif

                <div class="form-group">
                  <label for="type">نوع الدرس :</label>
                  <select class="form-control form-control-select mt-3" name="type" id="lesson_type">
                  <option selected>-- اختر النوع --</option>
                   <option value="video">فيديو</option>
                   <option value="image">صورة</option>
                   <option value="url">URL</option>
                   <option value="pdf">pdf</option>
                   <option value="word">word</option>
                  </select>
                </div>

                <div class="form-group" id="lesson_file" style="display: none;">
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

                <div class="form-group" id="lesson_url" style="display: none;">
                  <label for="urlField"><h5>ادخل ال URL :</h5></label>
                  <input type="url" class="form-control" id="urlField" name="url_src" placeholder="ادخل ال URL"> 
                </div>

                <div class="form-group" id="embaded_code" style="display: none;">
                  <label for="embadedCode"><h5>ادخل رابط الفديو :</h5></label>
                  <input type="url" class="form-control" id="embadedCode" name="embadedCode_src" placeholder="رابط الفديو"> 
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

                <button type="submit" class="btn btn-success button1">إضافة</button>
                <a href="{{route('lesson.index')}}" class="btn btn-default" style="margin-right:5px">إلغاء</a>
              </form>
              
          </div>
        </div>
      </div>      
    </div>
  </div>
</div>

@endsection