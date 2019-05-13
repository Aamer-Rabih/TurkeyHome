@extends('admin.layouts.master')

@section('content')
<form action="{{route('freereason.store')}}" method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                  <label for="freereason"><h5>سبب اعفاء :</h5></label>
                  <input type="text" class="form-control" id="freereason" name="text" required> 
                  @if($errors->has('text'))
                  <span class="text-danger">{{$errors->first('freereason')}}</span>
                  @endif
                </div>
                

                
                <button type="submit" class="btn btn-success myhover">إضافة</button>
                <a href="{{route('freereason.index')}}" class="btn btn-default" style="margin-right:5px">إلغاء</a>
              </form>
@endsection