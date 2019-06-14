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
  <div id="table" class="row">
    <div class="card-deck">       
      <div class="col-lg-6">
        <div class="card color-grey">
          <div class="card-body">
            <div class="card-header">إضافة وحدة دراسية <i class="fa fa-plus-square" aria-hidden="true"></i></div>
              
              <form action="{{route('unit.store')}}" method="POST">
                      {!! csrf_field() !!}
                <div class="form-group">
                  <label for="unit"><h5>الوحدة الدراسية :</h5></label>
                  <input type="text" class="form-control" id="unit" name="title" required placeholder="اسم الوحدة الجديدة">
                </div>                
                <div class="form-group">
                  <label for="subject">المادة الدراسية :</label>
                  @if($selectedSubject === null)
                  <select class="form-control form-control-select mt-3" id="subject" name="subject_id">
                    <option selected>-- اختر المادة الدراسية --</option>
                    @foreach($subjects as $subject)
                    <option value="{{$subject->id}}">{{$subject->name}} التابعة لل {{$subject->class->name}}</option>
                    @endforeach 
                  </select>
                  @elseif($selectedSubject != null)
                    <select class="form-control form-control-select mt-3" id="classField" name="subject_id" readonly>
                      <option value="{{$selectedSubject->id}}" selected>{{$selectedSubject->name}}</option>
                    </select>
                  @endif
                </div>
                <div class="radioG">
                  <h5>تفعيل الوحدة الدراسية :</h5>
                  <div class="radio">
                    <input type="radio" name="active" id="active" value="1" checked>
                    <label for="active">مفعلة</label>
                  </div>
                  <div class="radio">
                    <input type="radio" name="active" id="deactive" value="0">
                    <label for="deactive">غير مفعلة</label>
                  </div>
                </div>
                <button type="submit" class="btn btn-success button1">إضافة</button>
                <a href="{{route('unit.index')}}" class="btn btn-default" style="margin-right:5px">إلغاء</a>
              </form>
              
          </div>
        </div>
      </div>      
    </div>
  </div>
</div>

@endsection