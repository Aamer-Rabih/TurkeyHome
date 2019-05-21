@extends('admin.layouts.master')

@section('content')


<div id="content">

  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة الوحدات الدراسية</small></h1>
        </div>
      </div> 
    </div>
  </div>

  <div class="row" id="table">
    <div class="card-deck">
      <div class="col-lg-6">
        <div class="card color-grey">
          <div class="card-header">تعديل الوحدة الدراسية <i class="fa fa-edit" aria-hidden="true"></i></div>
            <div class="card-body">

            <form action="{{route('unit.update', $unit)}}" method="POST">
                      {!! csrf_field() !!}
                      {!! method_field('PUT') !!}
                <div class="form-group">
                  <label for="unit"><h5>الوحدة الدراسية :</h5></label>
                  <input type="text" class="form-control" id="unit" name="title" required value="{{$unit->title}}">
                </div>                
                <div class="form-group">
                  <label for="subject">المادة الدراسية :</label>
                  <select class="form-control form-control-select mt-3" id="subject" name="subject_id">
                    @foreach($subjects as $subject)
                    <option value="{{$subject->id}}" {{$subject->id === $unit->subject_id ? "selected" : ""}}>
                      {{$subject->name}} التابعة لل {{$subject->class->name}}
                    </option>
                    @endforeach 
                  </select>
                </div>
                <div class="radioG">
                  <h5>تفعيل الوحدة الدراسية :</h5>
                  <div class="radio">
                    <input type="radio" name="active" id="active" value="1" {{$unit->active ? "checked" : ""}}>
                    <label for="active">مفعلة</label>
                  </div>
                  <div class="radio">
                    <input type="radio" name="active" id="deactive" value="0" {{!$unit->active ? "checked" : ""}}>
                    <label for="deactive">غير مفعلة</label>
                  </div>
                </div>
                <button type="submit" class="btn btn-success button1">تعديل</button>
                <a href="{{route('unit.index')}}" class="btn btn-default" style="margin-right:5px">إلغاء</a>
              </form>
              
          </div>
        </div>
      </div> 
    </div>
  </div>

</div>

@endsection