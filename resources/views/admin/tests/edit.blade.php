@extends('admin.layouts.master')

@section('content')

<div id="content">

  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة الإختبارات </small></h1>
        </div>
      </div> 
    </div>
  </div>

  <div class="row" id="table">
    <div class="card-deck">
      <div class="col-lg-6">
        <div class="card color-grey">
          <div class="card-header">تعديل صورة القلاب</div>
            <div class="card-body">

              <form action="{{route('test.update', $test)}}" enctype="multipart/form-data" method="POST">
                      {!! csrf_field() !!}
                      {!! method_field('PUT')!!}
                <div class="form-group">
                  <label for="test"><h5>اسم الإختبار :</h5></label>
                  <input type="text" class="form-control" id="test" name="title" value="{{$test->title}}" required placeholder="عنوان الإختبار الجديد"> 
                </div>
                <div class="form-group">
                  <label for="termField">الفصل الدراسي :</label>
                  <select class="form-control form-control-select mt-3" id="termField" name="term">
                    <option value="1" {{ $tets->term === 1 ? "selected" : "" }}>الفصل الأول</option>
                    <option value="2" {{ $tets->term === 2 ? "selected" : "" }}>الفصل الثاني</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="subtestField">الأمتحان :</label>
                  <select class="form-control form-control-select mt-3" id="subtestField" name="sub_test">
                    <option value="1" {{ $tets->sub_tets === 1 ? "selected" : "" }}>الأمتحان الأول</option>
                    <option value="2" {{ $tets->sub_test === 2 ? "selected" : "" }}>الأمتحان الثاني</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="typeField">نوع ملف الأختبار :</label>
                  <select class="form-control form-control-select mt-3" id="typeField" name="type">
                    <option value="image" {{ $tets->type === 'image' ? "selected" : "" }}>صورة</option>
                    <option value="video" {{ $tets->type === 'video' ? "selected" : "" }}>فيديو</option>
                    <option value="word" {{ $tets->type === 'word' ? "selected" : "" }}>ملف Word</option>
                    <option value="pdf" {{ $tets->type === 'pdf' ? "selected" : "" }}>ملف PDF</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">ملف الإختبار :</label>
                  <div class="input-group mt-3">
                    <div class="custom-file">
                      <input id="imageField" type="file" class="custom-file-input imageField" name="src">
                      <label class="custom-file-label imageFieldLabel" for="imageFeild">اختر ملف الإختبار 
                        <i class="fa fa-upload pull-left" aria-hidden="true" style="margin-top:3px;"></i>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="radioG">
                  <h5>تفعيل هذا الأختبار :</h5>
                  <div class="radio">
                    <input type="radio" name="active" value="1" {{ $test->active === 1 ? "checked" : "" }}>
                    <label>مفعل</label>
                  </div>
                  <div class="radio">
                    <input type="radio" name="active" value="0" {{ $test->active === 0 ? "checked" : "" }}>
                    <label>غير مفعل</label>
                  </div>
                </div>
                <button type="submit" class="btn btn-success myhover">تعديل</button>
                <a href="{{route('test.index')}}" class="btn btn-default button2" style="margin-right:5px">إلغاء</a>
              </form>

          </div>
        </div>
      </div> 
    </div>
  </div>

</div>

@endsection