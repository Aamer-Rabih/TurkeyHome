<?php
use App\ClassRoom;

  $activeArray= [ true =>"مفعلة", false => "غير مفعلة"];
  $downloableArray= [ true =>"ممكن", false => "غير ممكن"];
?>

@extends('admin.layouts.master')

@section('content')

<div id="content">

      <div class="content-header">
        <h1>
            <small>إدارة المواد</small>
        </h1>
      </div>

        <div class="row">
          <div class="card-deck">            
            <div class="col-lg-6">
              <div class="card color-grey">
                <div class="card-body">
                  <div class="card-header">تعديل مادة تدريسية</div>

                  <form action="{{route('subject.update',['subject' => $subject->id])}}" method="POST">
                      {!! csrf_field() !!}
                      {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="subject"><h5>المادة الدراسية :</h5></label>
                        <input type="text" class="form-control" id="subject" name="name" value="{{$subject->name}}" required> 
                        <label for="classRoom">الصف:</label>
                        <select class="form-control form-control-select" id="classRoom" name="class_id">
                            @foreach($classes as $class)
                        <option value="{{$class->id}}" {{$class->id == $subject->class_id ? 'selected' : ''}}>{{$class->name}}</option>
                            @endforeach 
                        </select>
                    </div>
                   
                    <div class="radioG">
                        <h5>تفعيل المادة التدريسية :</h5>
                        <div class="radio">
                            <input type="radio" name="active" value="1" {{$subject->active ? 'checked' : ''}}>
                            <label>فعالة</label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="active" value="0" {{!$subject->active ? 'checked' : ''}}>
                            <label>غير فعالة</label>
                        </div>
                    </div>
                    <div class="radioG">
                        <h5>قابلة التنزيل :</h5>
                        <div class="radio">
                            <input type="radio" name="downloable" value="1" {{$subject->downloable ? 'checked' : ''}}>
                            <label>قابلية للتنزيل</label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="downloable" value="0" {{!$subject->downloable ? 'checked' : ''}}>
                            <label>غير قابلة للتنزيل</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success myhover">تعديل</button>
                    <a href="{{route('subject.index')}}" class="btn btn-default" style="margin-right:5px">إلغاء</a>
                  </form>

                </div>
              </div>
            </div>   
          </div>
        </div>

  </div>

@endsection