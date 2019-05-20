@extends('admin.layouts.master')

@section('content')

<div id="content">
  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة إعفاءات الطلاب</small></h1>
        </div>
      </div>
      <div class="col-lg-8">
        <a href="{{route('freereason.index')}}" class="btn btn-primary button-margin-header custom-but pull-left" > إدارة كافة الإعفاءات 
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
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i>عرض سبب الإعفاء</small>
            </h2>
          </div>
          <p>{{$freereason->text}}</p>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection



