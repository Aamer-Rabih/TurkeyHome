@extends('admin.layouts.master')

@section('content')


<div id="content">

  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة الدينيمي</small></h1>
        </div>
      </div> 
    </div>
  </div>

  <div class="row" id="table">
    <div class="card-deck">
      <div class="col-lg-6">
        <div class="card color-grey">
          <div class="card-header">تعديل دينيمي <i class="fa fa-edit" aria-hidden="true"></i></div>
            <div class="card-body">


            <form action="{{route('deneme.store')}}" enctype="multipart/form-data" method="POST">
                      {!! csrf_field() !!}
                <div class="form-group">
                  <label for="denemeTitle"><h5>عنوان الدينيمي :</h5></label>
                  <input type="text" class="form-control" id="denemeTitle" name="title" value="{{$deneme->title}}"> 
                </div>
                <div class="form-group">
                  <label for="orderField">الصف :</label>
                  <select class="form-control form-control-select mt-3" id="orderField" name="class_id">
                    @foreach($classes as $class)
                    <option value="{{$class->id}}" {{ $deneme->class_id === $class->id ? "selected" : ""}}>{{$class->name}}</option>
                    @endforeach 
                  </select>
                </div>
                <div class="form-group">
                  <label for="orderField">الفصل :</label>
                  <select class="form-control form-control-select mt-3" id="orderField" name="term">
                    <option value="1" {{$deneme->term === 1 ? "selected" : ""}}>{{$terms[0]}}</option>
                    <option value="2" {{$deneme->term === 2 ? "selected" : ""}}>{{$terms[1]}}</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="deneme_type">النوع :</label>
                  <select class="form-control form-control-select mt-3" id="deneme_type" name="type">
                    <option value="video" {{$deneme->type === 'video' ? "selected" : ""}}>فديو</option>
                    <option value="image" {{$deneme->type === 'image' ? "selected" : ""}}>صورة</option>
                    <option value="url" {{$deneme->type === 'url' ? "selected" : ""}}>URL</option>
                    <option value="pdf" {{$deneme->type === 'pdf' ? "selected" : ""}}>pdf</option>
                    <option value="word" {{$deneme->type === 'word' ? "selected" : ""}}>word</option>
                  </select>
                </div>
                <div class="form-group"  id="deneme_file" {{ (($deneme->type === 'url') || ($deneme->type === 'video')) ? "hidden" : ""}}>
                  <label for="">ملف الدينيمي :</label>
                  <div class="input-group mt-3">
                    <div class="custom-file">
                      <input id="fileField" type="file" class="custom-file-input imageField" name="src">
                      <label class="custom-file-label imageFieldLabel" for="fileFeild">اختر ملف 
                        <i class="fa fa-upload pull-left" aria-hidden="true" style="margin-top:3px;"></i>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group" id="deneme_url" {{ (($deneme->type === 'image') || ($deneme->type === 'word') || ($deneme->type === 'pdf') || ($deneme->type === 'video')) ? "hidden" : ""}}>
                  <label for="urlField"><h5>ادخل ال URL :</h5></label>
                  <input type="url" class="form-control" id="urlField" name="url_src" value="{{$deneme->src}}" placeholder="ادخل ال URL"> 
                </div>
                <div class="form-group" id="deneme_embaded_code" {{ (($deneme->type === 'image') || ($deneme->type === 'word') || ($deneme->type === 'pdf') || ($deneme->type === 'url')) ? "hidden" : ""}}>
                  <label for="embadedCode"><h5>ادخل رابط الفديو :</h5></label>
                  <input type="url" class="form-control" id="embadedCode" name="embadedCode_src" value="{{$deneme->src}}" placeholder="رابط الفديو"> 
                </div>
                <div class="radioG">
                  <h5>تفعيل الدينيمي :</h5>
                  <div class="radio">
                    <input type="radio" name="active" value="1" {{$deneme->active === 1 ? "checked" : ""}}>
                    <label>فعال</label>
                  </div>
                  <div class="radio">
                    <input type="radio" name="active" value="0" {{$deneme->active === 0 ? "checked" : ""}}>
                    <label>غير فعال</label>
                  </div>
                </div>
                <button type="submit" class="btn btn-success myhover">تعديل</button>
                <a href="{{route('deneme.index')}}" class="btn btn-default" style="margin-right:5px">إلغاء</a>
              </form>


          </div>
        </div>
      </div> 
    </div>
  </div>

</div>

@endsection