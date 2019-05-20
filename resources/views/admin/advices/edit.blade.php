@extends('admin.layouts.master')

@section('content')


<div id="content">

  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i>إدارة النصائح</small></h1>
        </div>
      </div> 
    </div>
  </div>

  <div class="row" id="table">
    <div class="card-deck">
      <div class="col-lg-6">
        <div class="card color-grey">
          <div class="card-header">تعديل النصيحة <i class="fa fa-edit" aria-hidden="true"></i></div>
            <div class="card-body">

            <form action="{{route('advice.update')}}" enctype="multipart/form-data" method="POST">
                      {!! csrf_field() !!}
                      {!! method_field('PUT') !!}
                <div class="form-group">
                  <label for="adviceTitle"><h5>الصف الدراسي:</h5></label>
                  <input type="text" class="form-control" id="adviceTitle" name="title" required value="{{$advice->title}}">
                </div>
                <div class="form-group">
                  <label for="orderField">النوع :</label>
                  <select class="form-control form-control-select mt-3" id="orderField" name="order">
                    <option value="audio" {{$advice->type === 'audio' ? "selected" : ""}}>ملف صوتي</option>
                    <option value="video" {{$advice->type === 'video' ? "selected" : ""}}>فيديو</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">ملف النصيحة :</label>
                  <div class="input-group mt-3">
                    <div class="custom-file">
                      <input id="adviceFile" type="file" class="custom-file-input imageField" name="src" value="{{$advice->src}}">
                      <label class="custom-file-label imageFieldLabel" for="adviceFile">اختر ملف النصيحة 
                        <i class="fa fa-upload pull-left" aria-hidden="true" style="margin-top:3px;"></i>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="radioG">
                  <h5>تفعيل النصيحة :</h5>
                  <div class="radio">
                    <input type="radio" name="active" id="active" value="1"  {{$advice->active ? "checked" : ""}}>
                    <label for="active">مفعلة</label>
                  </div>
                  <div class="radio">
                    <input type="radio" name="active" id="deactive" value="0"  {{!$advice->active ? "checked" : ""}}>
                    <label for="deactive">غير مفعلة</label>
                  </div>
                </div>
                <button type="submit" class="btn btn-success myhover button1">إضافة</button>
                <a href="{{route('advice.index')}}" class="btn btn-default" style="margin-right:5px">إلغاء</a>
              </form>

          </div>
        </div>
      </div> 
    </div>
  </div>

</div>

@endsection