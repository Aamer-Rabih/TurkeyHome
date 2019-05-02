<?php
use App\ClassRoom;

  $activeArray= [ true =>"مفعلة", false => "غير مفعلة"];
  $downloableArray= [ true =>"ممكن", false => "غير ممكن"];
  $classes = ClassRoom::latest()->get();
?>

@extends('admin.layouts.master')

@section('content')

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
                  <div class="card-header">إضافة مادة تدريسية</div>

                  <form action="{{route('subject.store')}}" method="POST">
                      {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="subject"><h5>المادة الدراسية :</h5></label>
                        <input type="text" class="form-control" id="subject" name="name"> 
                        <label for="email">اسم الصف:</label>
                        <select class="form-control form-control-select" id="classRoom" name="class_id">
                            <option value="" selected>-- اختر الصف --</option>
                            @foreach($classes as $class)
                            <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach 
                        </select>
                    </div>
                   
                    <div class="radioG">
                        <h5>تفعيل المادة التدريسية :</h5>
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
                    <div class="radioG">
                        <h5>قابلة التنزيل :</h5>
                        @foreach($downloableArray as $k=>$item)
                        @if($k)
                        <div class="radio">
                        <input type="radio" name="downloable" value="1" checked>
                        <label>{{$item}}</label>
                        </div>
                        @else
                        <div class="radio">
                        <input type="radio" name="downloable" value="0">
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