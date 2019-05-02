@extends('admin.layouts.master')

@section('content')


    <div id="content">

      <div class="content-header">
        <h1>
          <small>إدارة الصفوف</small>
        </h1>
      </div>

        <div class="row">
          <div class="card-deck">
            <div class="col-lg-6">
              <div class="card color-grey">
                <div class="card-header">تعديل صف</div>
                <div class="card-body">

                  <form action="{{ route('class.update',['class' => $class->id]) }}" method="POST">
                    <div class="form-group">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="PATCH">
                      
                        <label for="classRoom">اسم الصف:</label>
                        <input type="text" class="form-control" id="classRoom" name="name" value="{{$class->name}}" required>
                    </div>
                    
                    <div class="radioG">
                        <h5>مجانية الصف :</h5>
                      
                        <div class="radio">
                        <input type="radio" name="free" value="1" {{$class->free ? 'checked' : ''}}>
                        <label>مجاني</label>
                        </div>
                        <div class="radio">
                        <input type="radio" name="free" value="0" {{!$class->free ? 'checked' : ''}} >
                        <label>غير مجاني</label>
                        </div>
                    
                    </div>

                    <button type="submit" class="btn btn-success myhover">تعديل</button>
                    <a href="{{route('class.index')}}" class="btn btn-default" style="margin-right:5px">إلغاء</a>
                  </form>

                </div>
              </div>
            </div>
            
          </div>
        </div>

    </div>

@endsection