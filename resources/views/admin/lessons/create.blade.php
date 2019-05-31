@extends('admin.layouts.master')

@section('content')

<div id="content">

  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة الدروس</small></h1>
        </div>
      </div>
      <div class="col-lg-8">
      </div>
    </div>
  </div>  

  <div id="table" class="row">
    <div class="card-deck">       
      <div class="col-lg-6">
        <div class="card color-grey">
          <div class="card-body">
            <div class="card-header">إضافة درس</div>
              
              <form action="{{route('lesson.store')}}" enctype="multipart/form-data" method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                  <label for="title"><h5>الصف الدراسي:</h5></label>
                  <input type="text" class="form-control" id="title" name="title" required placeholder="عنوان للدرس الجديد"> 
                </div>
                <div class="form-group">
                  <label for="intro"><h5>مقدمة للدرس :</h5></label>
                  <textarea class="form-control" id="intro" name="intro" rows="3" required placeholder="اكتب مقدمة للدرس ..."></textarea> 
                </div>
                <div class="form-group">
                  <label for="type">الوحدة أو الدورة التي يتبع إليها الدرس :</label>
                  @if($selectedunit === null && $selectedcourse === null)
                  <select class="form-control form-control-select mt-3" id="type" name="type">
                    <option selected>-- اختر الوحدة أو الكورس --</option>
                    @foreach($units as $unit)
                    <option value="{{$unit->id}}">{{$unit->name}} ضمن مادة {{$unit->subject->title}}  التابعة لل {{$unit->subject->class->name}}</option>
                    @endforeach
                    @foreach($courses as $course)
                    <option value="{{$course->id}}">{{$course->title}}</option>
                    @endforeach
                  </select>
                  @elseif($selectedunit !== null && $selectedcourse === null)
                  <select class="form-control form-control-select mt-3" id="type" name="type" disabled>
                    <option value="{{$selectedunit->id}}">{{$selectedunit->name}} ضمن مادة {{$selectedunit->subject->title}}  التابعة لل {{$selectedunit->subject->class->name}}</option>
                  </select>
                  @elseif($selectedcourse !== null && $selectedunit === null)
                  <select class="form-control form-control-select mt-3" id="type" name="type" disabled>
                    <option value="{{$selectedcourse->id}}">{{$selectedcourse->title}}</option>
                  </select>
                  @endif
                </div>
                <div class="form-group">
                  <label for="type">النوع :</label>
                  <select class="form-control form-control-select mt-3" id="type" name="type">
                    <option selected>-- اختر نوع ملف الدرس --</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">ملف الدرس :</label>
                  <div class="input-group mt-3">
                    <div class="custom-file">
                      <input id="lessonFile" type="file" class="custom-file-input imageField" name="src">
                      <label class="custom-file-label imageFieldLabel" for="lessonFile">اختر ملف للدرس 
                        <i class="fa fa-upload pull-left" aria-hidden="true" style="margin-top:3px;"></i>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="orderField">ترتيب العرض ضمن الوحدة :</label>
                  <select class="form-control form-control-select mt-3" id="orderField" name="order">
                    <option selected>-- اختر ترتيب العرض --</option>
                  </select>
                </div>
                <div class="radioG">
                  <h5>تفعيل الدرس ضمن جميع الصفوف :</h5>
                  <div class="radio">
                    <input type="radio" name="active" value="1" checked>
                    <label>مفعلة</label>
                  </div>
                  <div class="radio">
                    <input type="radio" name="active" value="0">
                    <label>غير مفعلة</label>
                  </div>
                </div>
                <button type="submit" class="btn btn-success myhover">إضافة</button>
                <a href="{{route('lesson.index')}}" class="btn btn-default" style="margin-right:5px">إلغاء</a>
              </form>
              
          </div>
        </div>
      </div>      
    </div>
  </div>
</div>

@endsection