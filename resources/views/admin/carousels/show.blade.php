<?php 
    $array = explode('/', $carousel->src);
    $img_name = $array[3];
?>
@extends('admin.layouts.master')

@section('content')

<div id="content">

  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة القلاب</small></h1>
        </div>
      </div>
      <div class="col-lg-2">
        
      </div>
      <div class="col-lg-6">
        <a href="{{route('carousel.index')}}" class="btn btn-primary button-margin-header custom-but pull-left" > إدارة صور القلاب 
          <i class="fa fa-angle-double-left" aria-hidden="true" style="font-size: 20px;"></i>
        </a>
      </div> 
    </div>
  </div>
        
  <div id="table" class="row">
    <div class="col-lg-8">
      <div class="card table-cards color-grey">
        <div class="card-body">
          <div class="content-header">
              <h2>
                <small>
                  <i class="fa fa-picture-o" aria-hidden="true" style="font-size:24px;"></i>
                  <span style="direction:ltr; display: table-cell;"> {{$img_name}}</span>
                </small>
              </h2>
            </div>
          <img src="{{$carousel->src}}" alt="Picture" width="80%" height="60%">
          <div  class="border-padding">
            <table class="show-table">
              <thead>
                  <tr>
                      <th><span class="border-padding">بعض المعلومات عن الصورة</span></th>
                      <th></th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>اسم الصورة</td>
                      <td>:</td>
                      <td style="direction:ltr;">{{$img_name}}</td>
                  </tr>
                  <tr>
                      <td>ترتيب عرضها في القلاب</td>
                      <td>:</td>
                      <td>{{$carousel->order}}</td>
                  </tr>
              </tbody>
            </table>
          </div>
          
          <form action="{{ route('carousel.destroy',['carousel' => $carousel->id]) }}" method="POST" id="deleteForm">
                      {!! csrf_field() !!}
                      <input type="hidden" name="_method" value="DELETE">    
                      <button class=" btn btn-danger custom-but">حذف الصورة</button>
              
          </form>       
                  

        </div>
      </div>
    </div>
  </div>

</div>

@endsection



