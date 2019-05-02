@extends('admin.layouts.master')

@section('content')

<?php 
  $array= ["الصف الأول","الصف الثاني", "الصف الثالث", "الصف الرابع",
                                    "الصف الخامس", "الصف السادس","الصف السابع","الصف الثامن",
                                     "الصف التاسع", "الصف العاشر", "الصف الحادي عشر" , "الباكالوريا"];
  $freeArray= [ true =>"مجاني", false => "غير مجاني"];
                
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
                <div class="card-header">تعديل صف</div>
                <div class="card-body">

                  <form action="{{ route('class.update', $class) }}" method="POST">
                    <div class="form-group">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="PATCH">
                      
                        <label for="email">اسم الصف:</label>
                        <input type="text" class="form-control" id="classRoom" name="name" value="{{$class->name}}">
                    </div>
                    
                    <div class="radioG">
                        <h5>مجانية الصف :</h5>
                        @foreach($freeArray as $k=>$item)
                        @if($class->free === $k)
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
                  </form>

                </div>
              </div>
            </div>
            
          </div>
        </div>

    </div>

@endsection