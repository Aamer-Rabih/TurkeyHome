<?php 
    $array = explode('/', $studentThank->src);
    $img_name = $array[2];
?>
@extends('admin.layouts.master')

@section('content')

<div id="content">

  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة تشكرات الطلاب</small></h1>
        </div>
      </div>
      <div class="col-lg-2">
        
      </div>
      <div class="col-lg-6">
        <a href="{{route('studentthank.index')}}" class="btn btn-primary button-margin-header custom-but pull-left" > إدارة تشكرات الطلاب 
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
          @if(($studentThank->type === 'img') || ($studentThank->type === 'img+text'))
          <img src="{{$studentThank->src}}" alt="Picture" width="80%" height="60%">
          @elseif($studentThank->type === 'video')
          <video width="520" height="440" controls>
            <source src="{{$studentThank->src}}" type="video/mp4">
              Your browser does not support the video tag.
          </video>
          @endif
          <div  class="border-padding">
            <table class="show-table">
              <thead>
                  <tr>
                      <th><span class="border-padding">بعض المعلومات </span></th>
                      <th></th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                    <td>النوع</td>
                    <td>:</td>
                    @if($studentThank->type == 'img') 
                    <td style="direction:ltr;">صورة</td>
                    @elseif($studentThank->type == 'video')
                    <td style="direction:ltr;">فيديو</td>
                    @else
                    <td style="direction:ltr;">نص و صورة</td>
                    @endif
                  </tr>
                  <tr>
                      <td>نص الرأي</td>
                      <td>:</td>
                      <td style="direction:ltr;">{{$studentThank->content}}</td>
                  </tr>
                  <tr>
                      <td>ترتيب العرض</td>
                      <td>:</td>
                      <td>{{$studentThank->order}}</td>
                  </tr>
              </tbody>
            </table>
          </div>
          
          <form action="{{ route('studentthank.destroy',['studentThank' => $studentThank->id]) }}" method="POST" id="deleteForm">
                      {!! csrf_field() !!}
                      <input type="hidden" name="_method" value="DELETE">    
                      <button class=" btn btn-danger custom-but">حذف التشكر</button>
              
          </form>       
                  

        </div>
      </div>
    </div>
  </div>

</div>

@endsection



