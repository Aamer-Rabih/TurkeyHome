@extends('admin.layouts.master')

@section('content')

<div id="content">
  
  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة الإختبارات </small></h1>
        </div>
      </div>
      <div class="col-lg-2">
        @if (Auth::user()->hasRole(0) || Auth::user()->hasRole(1) || Auth::user()->hasRole(2))
        <a href="{{route('test.create')}}" class="btn btn-success myhover BP" role="button">إضافة إختبار<div><i class="material-icons" style="font-size:16px">add_box</i></div></a>
        @endif
      </div>
    </div>
  </div>

  <div id="table" class="row">
    <div class="col-lg-8">
      <div class="card table-cards color-grey">
        <div class="content-header">
          <h2>
            <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i> الإختبارات</small>
          </h2>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-hover table-width">
            <thead>
              <tr> 
                <th>عنوان الإختبار</th>
                @if (Auth::user()->hasRole(0) || Auth::user()->hasRole(1) || Auth::user()->hasRole(2))
                <th>التفعيل</th>
                @endif
                <th>الفصل</th>
                <th>نوع الملف</th>
                <th>العرض</th>
                @if (Auth::user()->hasRole(0) || Auth::user()->hasRole(1) || Auth::user()->hasRole(2))
                <th>التعديل</th>
                <th>الحذف</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach($tests as $test)
              <tr>
                <td>{{$test->title}}</td>
                @if (Auth::user()->hasRole(0) || Auth::user()->hasRole(1) || Auth::user()->hasRole(2))
                <td class="operations">
                  @if($test->active)
                  <form action="{{ route('test.deactivate', $test) }}" method="POST" id="deactivateForm">
                    {!! csrf_field() !!}
                    <button id="deactivate" class=" btn-xs delete-button" style="display:none;"></button>
                    <a herf="javascript:;" class="" onclick="$('#deactivate').click();" >
                      <i class="fa fa-check-circle" aria-hidden="true" style="font-size:18px;color:#5cb85c;cursor: pointer;"></i>
                    </a>
                  </form> 
                  @else
                  <form action="{{ route('test.activate', $test) }}" method="POST" id="activateForm">
                    {!! csrf_field() !!}
                    <button id="activate" class=" btn-xs delete-button" style="display:none;"></button>
                    <a herf="javascript:;" class="" onclick="$('#activate').click();" >
                      <i class="fa fa-times-circle" aria-hidden="true" style="font-size:18px;color:#dd4b39;cursor: pointer;"></i>
                    </a>
                  </form>
                  @endif          
                </td>
                @endif
                <td>{{ $test->term }}</td>
                <td>{{$test->type}}</td>
                <td>
                  <div class="operations show">
                    <a href="{{ route('test.show', $test) }}"><i class="fa fa-eye" style="font-size:18px;color:#5cb85c"></i></a>
                  </div>
                </td>
                @if (Auth::user()->hasRole(0) || Auth::user()->hasRole(1) || Auth::user()->hasRole(2))
                <td>
                  <div class="operations update">
                     <a href="{{ route('test.edit', $test) }}"><i class="fa fa-edit" style="font-size:18px;color:#00c0ef"></i></a>
                  </div>
                </td>
                <td>
                  <div class="operations delete">
                    <form action="{{ route('test.destroy', $test) }}" method="POST" id="deleteForm">
                      {!! csrf_field() !!}
                      <input type="hidden" name="_method" value="DELETE">    
                      <button id="button{{$test->id}}" class=" btn-xs delete-button" style="display:none;"></button>
                      <a herf="javascript:;" id="a{{$test->id}}" onclick="sweetAlert('a{{$test->id}}', 'button{{$test->id}}')" >
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