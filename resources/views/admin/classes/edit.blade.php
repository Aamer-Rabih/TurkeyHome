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

                  <form action="{{ route('class.update', $class) }}" method="POST">
                    <div class="form-group">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="PATCH">
                      
                        <label for="name">اسم الصف:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$class->name}}">
                    @if($errors->has('name'))
                    <span class="text-danger">*{{$errors->first('name')}}</span>
                    @endif
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
                  </form>

                </div>
              </div>
            </div>
            
          </div>
        </div>

    </div>

@endsection