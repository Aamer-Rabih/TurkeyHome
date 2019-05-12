@extends('admin.layouts.master')

@section('content')

<div id="content">

  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة الدرس الأستعراضي </small></h1>
        </div>
      </div> 
    </div>
  </div>

  <div class="row" id="table">
    <div class="card-deck">
      <div class="col-lg-6">
        <div class="card color-grey">
          <div class="card-header">تعديل الدرس الأستعراضي</div>
            <div class="card-body">

              <form action="{{route('showlesson.update', $showLesson)}}" enctype="multipart/form-data" method="POST">
                      {!! csrf_field() !!}
                      {!! method_field('PUT')!!}
                <div class="form-group">
                  <label for="showLesson">اسم الدرس الأستعراضي:</label>
                  <input type="text" class="form-control" id="showLesson" name="title" value="{{$showLesson->title}}" required>
                </div>  
                <div class="form-group">
                  <label for="">ملف الدرس الأستعراضي :</label>
                  <div class="input-group mt-3">
                    <div class="custom-file">
                      <input id="updateImageField" type="file" class="custom-file-input imageField" name="src" value="{{$showLesson->src}}">
                      <label class="custom-file-label imageFieldLabel" for="updateImageField">اختر درس استعراضي جديد
                        <i class="fa fa-upload pull-left" aria-hidden="true" style="margin-top:3px;"></i>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="orderField">ترتيب عرض الدرس الأستعراضي :</label>
                  <select class="form-control form-control-select mt-3" id="orderField" name="order">                   
                    @foreach($orders as $order)
                    <option value="{{$order}}" {{($order === $showLesson->order) ? "selected" : ""}}>{{$order}}</option>
                    @endforeach 
                  </select>
                </div>
                <button type="submit" class="btn btn-success myhover">تعديل</button>
                <a href="{{route('showlesson.index')}}" class="btn btn-default" style="margin-right:5px">إلغاء</a>
              </form>

          </div>
        </div>
      </div> 
    </div>
  </div>

</div>

@endsection