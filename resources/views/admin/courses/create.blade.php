@extends('admin.layouts.master')

@section('content')

<div id="content">

  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
          <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة الدورات الدراسية</small></h1>
        </div>
      </div>
    </div>
  </div>

  <div class="row" id="table">
    <div class="card-deck">            
      <div class="col-lg-6">
        <div class="card color-grey">
          <div class="card-body">
            <div class="card-header">إضافة دورة تدريسية <i class="fa fa-plus-square" aria-hidden="true"></i></div>

              <form action="{{route('course.store')}}" method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                  <label for="course"><h5>الدورة الدراسية :</h5></label>
                  <input type="text" class="form-control" id="course" name="title" required placeholder="اسم الدورة التدريسية الجديدة"> 
                  @if($errors->has('title'))
                  <span class="text-danger">{{$errors->first('course')}}</span>
                  @endif
                </div>
                <div class="radioG">
                  <h5>تفعيل الدورة التدريسية :</h5>
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
                <a href="{{route('course.index')}}" class="btn btn-default button2" style="margin-right:5px">إلغاء</a>
              </form>

            </div>
          </div>
        </div>   
      </div>
    </div>

  </div>

@endsection