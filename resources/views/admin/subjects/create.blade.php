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
                  <div class="card-header">إضافة مادة</div>

                  <form action="{{route('subject.store')}}" method="POST">
                      {!! csrf_field() !!}
                    <div class="form-group">
                      <label for="name"><h5>اسم المادة:</h5></label>
                        <input class="form-control" type="text" name="name" id=name required>
                        @if($errors->has('name'))
                    <span class="text-danger">*{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="radioG">
                        <h5>قابلية الدروس للتحميل:</h5>
                        <div class="radio">
                        <input type="radio" name="downloable" value="1" checked>
                        <label>قابلة للتحميل</label>
                        </div>
                        <div class="radio">
                        <input type="radio" name="downloable" value="0">
                        <label>غير قابلة للتحميل</label>
                        </div>
                    </div>
                    <div class="radioG">
                        <h5>المادة فعالة؟</h5>
                        <div class="radio">
                        <input type="radio" name="active" value="1" checked>
                        <label>فعالة</label>
                        </div>
                        <div class="radio">
                        <input type="radio" name="active" value="0">
                        <label>غير فعالة</label>
                        </div>
                    </div>
                    @if(request()->filled('selectedclass'))
                    <input type="hidden" value="{{request()->input('selectedclass')}}" name="class_id">
                  @else 
                    <div class="form-group">
                            <label for="classes"><h5>الصف:</h5></label>
                              <select class="form-control select" id="classes" name="class_id">
                                <option selected>--اختر الصف--</option>
                                @foreach($classes as $class)
                              <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                              </select>
                              @if($errors->has('class_id'))
                            <span class="text-danger">{{$errors->first('class_id')}}</span>
                              @endif
                          </div>
                          
                    @endif
                    <button type="submit" class="btn btn-success ">إضافة</button>
                    <a href="{{route('subject.index')}}" class="btn btn-default" style="margin-right:5px">إلغاء</a>

                  </form>
                </div>
              </div>
        </div>
            
          </div>
        </div>

    </div>

@endsection