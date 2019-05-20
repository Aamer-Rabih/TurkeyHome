<?php 
    $array = explode('/', $deneme->src);
    $file_name = $array[2];
?>

@extends('admin.layouts.master')

@section('content')

<div id="content">

  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة الدينيمي</small></h1>
        </div>
      </div>
      <div class="col-lg-2">
        
      </div>
      <div class="col-lg-6">
        <a href="{{route('deneme.index')}}" class="btn btn-primary button-margin-header custom-but pull-left" > إدارة  الدينيمي 
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
                  <span style="direction:ltr; display: table-cell;"> {{$deneme->title}}</span>
                </small>
              </h2>
            </div>
          <img src="{{$deneme->src}}" alt="Picture" width="80%" height="60%">
          <div  class="border-padding">
            <table class="show-table">
              <thead>
                  <tr>
                      <th><span class="border-padding">بعض المعلومات عن الدينيمي</span></th>
                      <th></th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>العنوان</td>
                      <td>:</td>
                      <td style="direction:ltr;">{{$deneme->title}}</td>
                  </tr>
                  <tr>
                      <td>الصف</td>
                      <td>:</td>
                      <td>{{$deneme->class->name}}</td>
                  </tr>
                  <tr>
                      <td>الفصل</td>
                      <td>:</td>
                      <td>{{$deneme->term === 1 ? $terms[0] : $terms[1]}}<td>
                  </tr>
                  <tr>
                      <td>النوع</td>
                      <td>:</td>
                      <td>{{$deneme->type}}<td>
                  </tr>
                  <tr>
                      <td>الفعالية</td>
                      <td>:</td>
                      <td>{{$deneme->active ? $active[0] : $active[1] }}<td>
                  </tr>
              </tbody>
            </table>
          </div>
          
          <form action="{{ route('deneme.destroy',['carousel' => $deneme->id]) }}" method="POST" id="deleteForm">
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



