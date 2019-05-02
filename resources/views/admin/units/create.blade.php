@extends('admin.layouts.master')

@section('content')

<div id="content">
      <div class="content-header">
        <h1>
          <small>إدارةالوحدات الدرسية</small>
        </h1>
      </div>


        <div class="row">
          <div class="card-deck">
            
            <div class="col-lg-6">
              <div class="card color-grey">
                <div class="card-body">
                  <div class="card-header">إضافة وحدة</div>

                  <form action="{{route('unit.store')}}" method="POST">
                      {!! csrf_field() !!}
                    <div class="form-group">
                      <label for="classRoom"><h5>اسم الوحدة:</h5></label>
                        <input class="form-control" type="text" name="title" id="title" required>
                        @if($errors->has('title'))
                    <span class="text-danger">*{{$errors->first('title')}}</span>
                        @endif
                    </div>
                    
                    <div class="radioG">
                        <h5>فعالية الوحدة الدرسية :</h5>
                        <div class="radio">
                        <input type="radio" name="active" value="1" checked>
                        <label>فعالة</label>
                        </div>
                        <div class="radio">
                        <input type="radio" name="active" value="0">
                        <label>غير فعالة</label>
                        </div>
                    </div>
                   
                    @if($selectedSubject)
                      <div class="form-group">

                      <p>الصف: {{$selectedSubject->class->name}}</p>
                      <p>المادة: {{$selectedSubject->name}}</p>
                      </div>

                   
                    @else 
                    <div class="form-group">
                            <p>الصف:{{$class->name}}</p>
                            <label for="subject"><h5>المادة:</h5></label>
                              <select class="form-control select" id="subject" name="subject_id">
                                <option selected value="0">--اختر المادة--</option>
                                @foreach($class->subjects as $subject)
                              <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                              </select>
                              @if($errors->has('subject_id'))
                            <span class="text-danger">{{$errors->first('subject_id')}}</span>
                              @endif
                      </div>
                          
                    @endif
                    <button type="submit" class="btn btn-success ">إضافة</button>
                    <a href="{{route('unit.index')}}" class="btn btn-default" style="margin-right:5px">إلغاء</a>

                  </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>

    </div>

@endsection