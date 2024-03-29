@extends('admin.layouts.master')

@section('content')

<div id="content">
  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة الملاحظات </small></h1>
        </div>
      </div>
      
      <div class="col-lg-6">
        <a href="{{route('notes.index')}}" class="btn btn-primary button-margin-header custom-but pull-left" >العودة 
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
                <th>الصف </th>
                
                <th>عامة او خاصة</th>   
                
                
                <th>محتوى الملاحظة</th>
                
              </tr>
            </thead>
            <tbody>
              <tr>
               <td>{{$note->class->name}}</td>
               
               <td>
               @if($note->type === 'public')
                  عامة 
                  @else
                  خاصة
                  @endif          
               </td>
               
               
               <td>{{$note->content}}</td>
              </tr>
            </tbody>
          </table>
          
        </div>
      </div>
    </div>
  </div>

</div>
@endsection