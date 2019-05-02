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
                <div class="card-body">
                  <div class="card-header">إضافة صف</div>
              

                  <form action="{{route('class.store')}}" method="POST">
                      {!! csrf_field() !!}
                    <div class="form-group">
                      <label for="classRoom"><h5>الصف الدراسي:</h5></label>
                      <input type="text" class="form-control" id="classRoom" name="name" required placeholder="اسم الصف الجديد"> 
                      @if($errors->has('name'))
                    <span class="text-danger">* {{$errors->first('name')}}</span>
                      @endif
                    </div>
                    <div class="radioG">
                        <h5>مجانية الصف :</h5>
                        <div class="radio">
                        <input type="radio" name="free" value="1" checked>
                        <label>مجاني</label>
                        </div>
                        <div class="radio">
                        <input type="radio" name="free" value="0">
                        <label>غير مجاني</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success myhover">إضافة</button>
                    <a href="{{route('class.index')}}" class="btn btn-default" style="margin-right:5px">إلغاء</a>

                  </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>

    </div>

@endsection