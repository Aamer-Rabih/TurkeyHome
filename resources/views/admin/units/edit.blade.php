@extends('admin.layouts.master')


@section('styles')
<style>


.subject-list{

    color : #111;
    text-align: right ;
    margin-bottom: 20px; 
}
.subject-list .subject-name {

    color : #828383 ; 
}




</style>
@endsection
@section('content')

<div id="content">

      <div class="content-header">
        <h1>
            <small>إدارة الوحدات الدرسية</small>
        </h1>
      </div>

        <div class="row">
          <div class="card-deck">
            <div class="col-lg-6">
              <div class="card color-grey">
                <div class="card-header">تعديل وحدة درسية</div>
                <div class="card-body">

                  <form action="{{ route('unit.update',['unit' => $unit->id]) }}" method="POST">
                    <div class="form-group">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="PUT">
                      
                        <label for="title">اسم الوحدة:</label>
                    <input type="text" name="title" value="{{$unit->title}}" class="form-control">
                    @if($errors->has('title'))

                    <span class="text-danger">{{$errors->first('title')}}</span>
                    @endif
                    </div>
                    
                    <div class="radioG">
                        <h5>فعالية الوحدة :</h5>
                            <div class="radio">
                            <input type="radio" name="active" value="1" {{$unit->active ? 'checked' : ''}}>
                        <label>فعالة</label>
                        </div>
                        <div class="radio">
                        <input type="radio" name="active" value="0" {{!$unit->active ? 'checked' :'' }}>
                        <label>غير فعالة</label>
                        </div>
                      
                    </div>

                    <div dir="rtl" class="subject-list">
                        <h4>اختيار المادة :</h4>
                        @foreach($classes as $class)
                            <h5>{{$class->name}}</h5>
                            @foreach($class->subjects as $subject)
                                <div >
                                <input type="radio" name="subject_id" value="{{$subject->id}}" {{$subject->id == $unit->subject->id ? 'checked' :'' }}>
                                <label class="subject-name">{{$subject->name}}</label>
                            @endforeach
                        </div>

                        @endforeach
                    </div>
                    <hr>
                    <div class="card-footer">
                    <button type="submit" class="btn btn-success ">تعديل</button>
                    <a href="{{route('unit.index')}}" class="btn btn-default" style="margin-right:5px">إلغاء</a>
                </div>
                  </form>

                </div>
              </div>
            </div>
            
          </div>
        </div>

    </div>

@endsection