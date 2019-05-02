@extends('admin.layouts.master')

@section('content')

<?php 
 
  $activeArray= [ true =>"مفعلة", false => "غير مفعلة"];
                
 ?>

<div id="content">

    <div class="content-header">
        <h1>
            <small>إدارة الدورات</small>
        </h1>
    </div>

    <div class="row">
        <div class="card-deck">
            <div class="col-lg-6">
                <div class="card color-grey">
                    <div class="card-header">تعديل الدورة</div>
                        <div class="card-body">

                            <form action="{{ route('course.update', $course) }}" method="POST">
                                <div class="form-group">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="PATCH">
                                    
                                    <label for="course"><h5>الدورة الدراسية :</h5></label>
                                    <input type="text" class="form-control" id="course" value="{{$course->title}}" name="title">
                                    @if($errors->has('title'))
                                <span class="text-danger">{{$errors->first('title')}}</span>
                                    @endif
                                    
                                    
                                </div>
                                <div class="radioG">
                                    <h5>الفعالية :</h5>
                                    @foreach($activeArray as $k=>$item)
                                    @if($course->active === $k)
                                    <div class="radio">
                                    <input type="radio" name="free" value="{{$k}}" checked>
                                    <label>{{$item}}</label>
                                    </div>
                                    @else
                                    <div class="radio">
                                    <input type="radio" name="free" value="{{$k}}" >
                                    <label>{{$item}}</label>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                <button type="submit" class="btn btn-success myhover">تعديل</button>
                                <a href="{{route('course.index')}}" class="btn btn-default" style="margin-right:5px">إلغاء</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
