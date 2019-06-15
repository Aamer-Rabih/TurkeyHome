@extends('admin.layouts.master')

@section('content')

<div id="content">
  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة النصائح </small></h1>
        </div>
      </div>
      
      <div class="col-lg-6">
        <a href="{{route('advice.index')}}" class="btn btn-primary button-margin-header custom-but pull-left" >العودة 
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
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i> معلومات النصيحة</small>
            </h2>
          </div>

          <table class="table table-bordered table-hover table-width">
            <thead>
              <tr> 
                <th>عنوان النصيحة</th>
                @if(Auth::user()->hasAnyRole([0,1]))
                <th>التفعيل</th>   
                @endif
                <th>النوع</th>
                <th>رابط النصيحة</th>
                
              </tr>
            </thead>
            <tbody>
              <tr>
               <td>{{$advice->title}}</td>
               @if ( Auth::user()->hasAnyRole([0,1]))
               <td>
               @if($advice->active)
                  <form action="{{ route('advice.deactivate', $advice) }}" method="POST" id="activateForm">
                    {!! csrf_field() !!}
                    <button id="{{$advice->id+1}}" class=" btn-xs delete-button" style="display:none;"></button>
                    <a herf="javascript:;" class="" onclick="$('#{{$advice->id+1}}').click();" >
                      <i class="fa fa-check-circle" aria-hidden="true" style="font-size:18px;color:#5cb85c;cursor: pointer;"></i>
                    </a>
                  </form> 
                  @else
                  <form action="{{ route('advice.activate', $advice) }}" method="POST" id="activateForm">
                    {!! csrf_field() !!}
                    <button id="{{$advice->id}}" class=" btn-xs delete-button" style="display:none;"></button>
                    <a herf="javascript:;" class="" onclick="$('#{{$advice->id}}').click();" >
                      <i class="fa fa-times-circle" aria-hidden="true" style="font-size:18px;color:#dd4b39;cursor: pointer;"></i>
                    </a>
                  </form>
                  @endif          
               </td>
               @endif
               <td>{{$advice->type}}</td>
               <td><a href="{{$advice->src}}">تحميل النصيحة</a></td>
              </tr>
            </tbody>
          </table>
          
        </div>
      </div>
    </div>
  </div>

</div>
@endsection