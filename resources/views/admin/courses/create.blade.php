@extends('admin.layouts.master')

@section('content')

<?php
  $activeArray= [ true =>"مفعلة", false => "غير مفعلة"];
?>

<div id="content">

      <div class="content-header">
        <h1>
          داش بورد
          <small>لوحة التحكم</small>
        </h1>
      </div>

        <div class="row">
          <div class="card-deck">            
            <div class="col-lg-6">
              <div class="card color-grey">
                <div class="card-body">
                  <div class="card-header">إضافة دورة تدريسية</div>

                  <form action="{{route('course.store')}}" method="POST">
                      {!! csrf_field() !!}
                    <div class="form-group">
                      <label for="course"><h5>الدورة الدراسية :</h5></label>
                      <input type="text" class="form-control" id="course" name="title"> 
                      @if($errors->has('title'))
                    <span class="text-danger">{{$errors->first('course')}}</span>
                      @endif
                    </div>
                    <div class="radioG">
                        <h5>تفعيل الدورة التدريسية :</h5>
                        @foreach($activeArray as $k=>$item)
                        @if($k)
                        <div class="radio">
                        <input type="radio" name="active" value="1" checked>
                        <label>{{$item}}</label>
                        </div>
                        @else
                        <div class="radio">
                        <input type="radio" name="active" value="0">
                        <label>{{$item}}</label>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-success myhover">إضافة</button>
                  </form>

                </div>
              </div>
            </div>   
          </div>
        </div>

  </div>

@endsection