@extends('admin.layouts.master')

@section('content')

<div id="content">

  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة المرفقات</small></h1>
        </div>
      </div>
      <div class="col-lg-2">
        <a href="{{route('attachment.create')}}" class="btn btn-success myhover BP" role="button">إضافة مرفق<div><i class="material-icons" style="font-size:16px">add_box</i></div></a>
      </div>
    </div>
  </div>  

  <div id="table" class="row">
    <div class="card-deck">       
      <div class="col-lg-6">
        <div class="card color-grey">
          <div class="card-body">
            <div class="card-header">إضافة مرفق</div>
              
              <form action="{{route('attachment.store')}}" enctype="multipart/form-data" method="POST">
                      {!! csrf_field() !!}
                <div class="form-group">
                  <label for="namne"><h5>اسم المرفق :</h5></label>
                  <input type="text" class="form-control" id="name" name="name" required placeholder="اسم المرفق الجديد"> 
                </div>
                <div class="form-group">
                  <label for="attachmentable_typeField">مرتبط مع :</label>
                  <select class="form-control form-control-select mt-3" id="attachmentable_typeField" name="attachmentable_type">
                    <option selected>-- اختر التبعية --</option>
                    <option value="App\Lesson">درس</option>
                    <option value="App\Deneme">دنيمي</option>
                    <option value="App\test">اختبار</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="attachmentable_idField">تابع ل :</label>
                  <select class="form-control form-control-select mt-3" id="attachmentable_idField" name="attachmentable_id">
                    <option selected>-- اختر الدرس أو الدينيمي أو الأختبار --</option>
                    @foreach($lessons as $lesson)
                    <option value="{{$lesson->id}}">{{$lesson->title}}</option>
                    @endforeach
                    @foreach($denemes as $deneme)
                    <option value="{{$deneme->id}}">{{$deneme->title}}</option>
                    @endforeach
                    @foreach($tests as $test)
                    <option value="{{$test->id}}">{{$test->title}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="typeField">نوع المرفق :</label>
                  <select class="form-control form-control-select mt-3" id="typeField" name="type">
                    <option selected>-- اختر النوع --</option>
                    <option value="file">ملف</option>
                    <option value="image">صورة</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">ملف المرفق :</label>
                  <div class="input-group mt-3">
                    <div class="custom-file">
                      <input id="imageField" type="file" class="custom-file-input imageField" name="src">
                      <label class="custom-file-label imageFieldLabel" for="imageFeild">اختر ملف المرفق 
                        <i class="fa fa-upload pull-left" aria-hidden="true" style="margin-top:3px;"></i>
                      </label>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-success myhover">إضافة</button>
                <a href="{{route('attachment.index')}}" class="btn btn-default" style="margin-right:5px">إلغاء</a>
              </form>
              
          </div>
        </div>
      </div>      
    </div>
  </div>
</div>

@endsection