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
        <a href="{{route('studentthank.create')}}" class="btn btn-success myhover BP" role="button">إضافة تشكر<div><i class="material-icons" style="font-size:16px">add_box</i></div></a>
      </div>
    </div>
  </div>
  
  <div id="table" class="row">
    <div class="col-lg-8">
      <div class="card table-cards color-grey">
        <div class="card-body">
          <div class="content-header">
            <h2>
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i>تشكرات الطلاب</small>
            </h2>
          </div>
          <table class="table table-bordered table-hover table-width">
            <thead>
              <tr> 
                <th>النوع</th>
                <th>الترتيب</th>
                <th>عرض</th>
                <th>تعديل</th>
                <th>حذف</th>
              </tr>
            </thead>
            <tbody>
              @foreach($studentThanks as $studentThank)
              <tr>
                @if($studentThank->type == 'img')
                <td>صورة</td>
                @elseif($studentThank->type == 'video')
                <td>فيديو</td>
                @else
                <td>نص و صورة</td>
                @endif
                <td>{{$studentThank->order}}</td>
                <td>
                  <div class="operations show">
                    <a href="{{ route('studentthank.show', $studentThank) }}"><i class="fa fa-eye" style="font-size:18px;color:#5cb85c"></i></a>
                  </div>
                </td>
                <td>
                  <div class="operations update">
                    <a href="{{ route('studentthank.edit', $studentThank) }}"><i class="fa fa-edit" style="font-size:18px;color:#00c0ef"></i></a>
                  </div>
                </td>
                <td>
                  <div class="operations delete">
                    <form action="{{ route('studentthank.destroy',['studentThank' => $studentThank->id]) }}" method="POST" id="deleteForm">
                      {!! csrf_field() !!}
                      <input type="hidden" name="_method" value="DELETE">    
                      <button id="button{{$studentThank->id}}" class=" btn-xs delete-button" style="display:none;"></button>
                      <a herf="javascript:;" id="a{{$studentThank->id}}" onclick="sweetAlert('a{{$studentThank->id}}', 'button{{$studentThank->id}}')" >
                        <i class="fa fa-trash" style="font-size:18px;color:#dd4b39"></i>
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