@extends('admin.layouts.master')

@section('content')

<div id="content">

  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة الإختبارات</small></h1>
        </div>
      </div>
      <div class="col-lg-2">
        <a href="{{route('test.create')}}" class="btn btn-success myhover BP" role="button">إضافة إختبار <div><i class="material-icons" style="font-size:16px">add_box</i></div></a>
      </div>
    </div>
  </div>  

  <div id="table" class="row">
    <div class="card-deck">       
      <div class="col-lg-6">
        <div class="card color-grey">
          <div class="card-body">
            <div class="card-header">إضافة إختبار</div>
              
              <form action="{{route('test.store')}}" enctype="multipart/form-data" method="POST">
                      {!! csrf_field() !!}
                <div class="form-group">
                  <label for="test"><h5>اسم الإختبار :</h5></label>
                  <input type="text" class="form-control" id="test" name="title" required placeholder="عنوان الإختبار الجديد"> 
                </div>
                <div class="form-group">
                  <label for="termField">الفصل الدراسي :</label>
                  <select class="form-control form-control-select mt-3" id="termField" name="term">
                    <option selected>-- اختر الفصل الدراسي --</option>
                    <option value="1">الفصل الأول</option>
                    <option value="2">الفصل الثاني</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="subtestField">الأمتحان :</label>
                  <select class="form-control form-control-select mt-3" id="subtestField" name="sub_test">
                    <option selected>-- اختر الأمتحان الدراسي --</option>
                    <option value="1">الأمتحان الأول</option>
                    <option value="2">الأمتحان الثاني</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="typeField">نوع ملف الأختبار :</label>
                  <select class="form-control form-control-select mt-3" id="typeField" name="type">
                    <option selected>-- اختر نوع ملف التحميل --</option>
                    <option value="image">صورة</option>
                    <option value="video">فيديو</option>
                    <option value="word">ملف Word</option>
                    <option value="pdf">ملف PDF</option>
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
                <!--
                <div class="form-group">
                  <label for="attachmentField">اختر الملفات المرفقة المرتبطة بهذا الإختبار :</label>
                  <select multiple class="form-control form-control-select mt-3" id="attachmentField" name="attachments">
                    <option selected>-- اختر المرفقات --</option>
                    @foreach($attachments as $attachment)
                    <option value="{{$attachment->id}}">{{$attachment->name}}</option>
                    @endforeach 
                  </select>
                </div> -->
                <div class="radioG">
                  <h5>تفعيل هذا الأختبار :</h5>
                  <div class="radio">
                    <input type="radio" name="active" value="1" checked>
                    <label>مفعل</label>
                  </div>
                  <div class="radio">
                    <input type="radio" name="active" value="0">
                    <label>غير مفعل</label>
                  </div>
                </div>
                <button type="submit" class="btn btn-success myhover">إضافة</button>
                <a href="{{route('test.index')}}" class="btn btn-default" style="margin-right:5px">إلغاء</a>
              </form>
              
          </div>
        </div>
      </div>      
    </div>
  </div>
</div>

@endsection