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
        @if (Auth::user()->hasRole(0) || Auth::user()->hasRole(1))
        <a href="{{route('unit.create')}}" class="btn btn-success custom-but BP" >إضافة وحدة دراسية <div><i class="fa fa-plus-square" aria-hidden="true"></i></div></a>
        @endif
      </div>
    </div>
  </div>
  
  <div id="table" class="row">
    <div class="col-lg-10">
      <div class="card table-cards color-grey">
        <div class="card-body">
          <div class="content-header">
            <h2>
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i> الوحدات الدراسية</small>
            </h2>
          </div>
          <table class="table table-bordered table-hover table-width">
            <thead>
              <tr> 
                <th>اسم الوحدة</th>
                @if (Auth::user()->hasRole(0) || Auth::user()->hasRole(1))<th>التفعيل</th>@endif
                
                <th>المادة الدراسية</th>
                <th>الصف</th>
                <th>عرض</th>
                @if (Auth::user()->hasRole(0) || Auth::user()->hasRole(1))
                <th>تعديل</th>
                <th>حذف</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach($units as $unit)
              <tr>
                <td>{{$unit->title}}</td>
                @if (Auth::user()->hasRole(0) || Auth::user()->hasRole(1))
                <td class="operations">
                  @if($unit->active)
                  <form action="{{ route('unit.deactivate', $unit) }}" method="POST" id="deactivateForm">
                    {!! csrf_field() !!}
                    <button id="deactivate" class=" btn-xs delete-button" style="display:none;"></button>
                    <a herf="javascript:;" class="" onclick="$('#deactivate').click();" >
                      <i class="fa fa-check-circle" aria-hidden="true" style="font-size:18px;color:#5cb85c;cursor: pointer;"></i>
                    </a>
                  </form> 
                  @else
                  <form action="{{ route('unit.activate', $unit) }}" method="POST" id="activateForm">
                    {!! csrf_field() !!}
                    <button id="activate" class=" btn-xs delete-button" style="display:none;"></button>
                    <a herf="javascript:;" class="" onclick="$('#activate').click();" >
                      <i class="fa fa-times-circle" aria-hidden="true" style="font-size:18px;color:#dd4b39;cursor: pointer;"></i>
                    </a>
                  </form>
                  @endif          
                </td>
                @endif
               
                <td>{{$unit->subject->name}}</td>
                <td>{{$unit->subject->class->name}}</td>
                <td>
                  <div class="operations show">
                    <a href="{{ route('unit.show', $unit) }}"><i class="fa fa-eye" style="font-size:18px;color:#5cb85c"></i></a>
                  </div>
                </td>
                @if (Auth::user()->hasRole(0) || Auth::user()->hasRole(1))
                <td>
                  <div class="operations update">
                    <a href="{{ route('unit.edit', $unit) }}"><i class="fa fa-edit" style="font-size:18px;color:#00c0ef"></i></a>
                  </div>
                </td>
                <td>
                  <div class="operations delete">
                    <form action="{{ route('unit.destroy',['unit' => $unit->id]) }}" method="POST" id="deleteForm">
                      {!! csrf_field() !!}
                      <input type="hidden" name="_method" value="DELETE">    
                      <button id="button{{$unit->id}}" class=" btn-xs delete-button" style="display:none;"></button>
                      <a herf="javascript:;" id="a{{$unit->id}}" onclick="sweetAlert('a{{$unit->id}}', 'button{{$unit->id}}')" >
                        <i class="fa fa-trash" style="font-size:18px;color:#dd4b39"></i>
                      </a>
                    </form>       
                  </div>
                </td>
                @endif
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