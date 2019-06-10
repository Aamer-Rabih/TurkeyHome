@extends('admin.layouts.master')

@section('content')



<div id="content">

  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة الطلابات على الصفوف</small></h1>
        </div>
      </div>
      
    </div>
  </div>
  
  <div id="table" class="row">
    <div class="col-lg-8">
      <div class="card table-cards color-grey">
        <div class="card-body">
          <div class="content-header">
            <h2>
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i> طلبات الصفوف</small>
            </h2>
          </div>
          <table class="table table-bordered table-hover table-width">
            <thead>
              <tr> 
                <th>اسم الطالب </th>
                <th>اسم الصف</th>
                <th></th>
                
              </tr>
            </thead>
            <tbody>
              @foreach($requests as $request)
              <tr>
                <td>{{$request->student->full_name}}</td>
                
                <td>{{$request->class->name}}</td>
                <td>
                  <div class="operations delete">
                    <form action="{{ route('classrequest.destroy',['id' => $request->id]) }}" method="POST" id="deleteForm">
                      {!! csrf_field() !!}
                      <input type="hidden" name="_method" value="DELETE">    
                      <input type="submit" class="btn btn-success" value="Approve">
                        
                      </a>
                    </form>       
                  </div>
                </td>
                
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection