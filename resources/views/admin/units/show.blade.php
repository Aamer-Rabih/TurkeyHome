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
      <div class="col-lg-2">
        @if(!$unit->active)
        <form action="{{ route('unit.activate', $unit) }}" method="POST" id="makeunitActivate" style="display:inline; margin-right:10px;">
          {!! csrf_field() !!}
          <a href="#" class="btn btn-success button-margin-header custom-but" onclick="document.getElementById('makeunitActivate').submit();"> اجعل الوحدة مفعلة </a>
          </form>
          @else
          <form action="{{ route('unit.deactivate', $unit) }}" method="POST" id="makeUnitDeactivate" style="display:inline; margin-right:10px;">
            {!! csrf_field() !!}
            <a href="#" class="btn btn-success button-margin-header custom-but" onclick="document.getElementById('makeUnitDeactivate').submit();"> اجعل الوحدة غير مفعلة</a>
        </form>
        @endif
      </div>
      <div class="col-lg-2">
        <a href="#" class="btn btn-success button-margin-header custom-but" style="margin-right: 22px" >إضافة درس 
          <i class="fa fa-plus" aria-hidden="true" style="font-size:16px"></i>
        </a>
      </div>
      <div class="col-lg-4">
        <a href="{{route('unit.index')}}" class="btn btn-primary button-margin-header custom-but pull-left" > إدارة كافة الوحدات 
          <i class="fa fa-angle-double-left" aria-hidden="true" style="font-size: 20px;"></i>
        </a>
      </div> 
    </div>
  </div>
        
  <div id="table" class="row">
    <div class="col-lg-10">
      <div class="card table-cards color-grey">
        <div class="card-body">
          <div class="content-header">
            <h2>
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i> الدروس المعتمدة ضمن هذه الوحدة</small>
            </h2>
          </div>
          <table class="table table-bordered table-hover table-width">
            <thead>
              <tr> 
                <th>اسم الدرس</th>
                <th>التفعيل</th>
                <th>العرض</th>
                <th>التعديل</th>
                <th>الحذف</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection