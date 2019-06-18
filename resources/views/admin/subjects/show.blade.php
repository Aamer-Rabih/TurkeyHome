@extends('admin.layouts.master')

@section('content')

<div id="content">
  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-5">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة مادة {{$subject->name}} ل {{$subject->class->name}}</small></h1>
        </div>
      </div>
      <div class="col-lg-2">
        @if(!$subject->active)
        <form action="{{ route('subject.activate', $subject) }}" method="POST" id="makeSubjectActivate" style="display:inline; margin-right:10px;">
          {!! csrf_field() !!}
          <a href="#" class="btn btn-success button-margin-header custom-but" onclick="document.getElementById('makeSubjectActivate').submit();"> اجعل المادة مفعلة </a>
          </form>
          @else
          <form action="{{ route('subject.deactivate', $subject) }}" method="POST" id="makeSubjectDeactivate" style="display:inline; margin-right:10px;">
            {!! csrf_field() !!}
            <a href="#" class="btn btn-success button-margin-header custom-but" onclick="document.getElementById('makeSubjectDeactivate').submit();"> اجعل المادة غير مفعلة</a>
        </form>
        @endif
      </div>
      <div class="col-lg-2">
        <!-- <a href="/classes/{{$subject->class->id}}/units/create?selectedsubject={{$subject->id}}" class="btn btn-success button-margin-header custom-but" style="margin-right: 22px" >إضافة وحدة 
         -->
         <a href="/units/create?selectedsubject={{$subject->id}}" class="btn btn-success button-margin-header custom-but" style="margin-right: 22px" >إضافة وحدة 
        
         <i class="fa fa-plus" aria-hidden="true" style="font-size:16px"></i> 
        </a>
      </div>
      <div class="col-lg-3">
        <a href="{{route('subject.index')}}" class="btn btn-primary button-margin-header custom-but pull-left" > إدارة كافة المواد 
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
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i> الوحدات الدراسية ضمن مادة ال {{$subject->name}}</small>
            </h2>
          </div>
          <table class="table table-bordered table-hover table-width">
            <thead>
              <tr> 
                <th>اسم الوحدة</th>
                <th>التفعيل</th>
                <th>عدد دروس الوحدة</th>
                <td>الصف</td>
                <th>العرض</th>
                <th>التعديل</th>
                <th>الحذف</th>
              </tr>
            </thead>
            <tbody>
              @foreach($subject->units as $unit)
              <tr>
                <td>{{$unit->title}}</td>
                <td class="operations">
                  @if($unit->active)
                  <form action="{{ route('unit.deactivate', $unit) }}" method="POST" id="activateForm">
                    {!! csrf_field() !!}
                    <button id="{{$unit->id+1}}" class=" btn-xs delete-button" style="display:none;"></button>
                    <a herf="javascript:;" class="" onclick="$('#{{$unit->id+1}}').click();" >
                      <i class="fa fa-check-circle" aria-hidden="true" style="font-size:18px;color:#5cb85c;cursor: pointer;"></i>
                    </a>
                  </form> 
                  @else
                  <form action="{{ route('unit.activate', $unit) }}" method="POST" id="activateForm">
                    {!! csrf_field() !!}
                    <button id="{{$unit->id+1}}" class=" btn-xs delete-button" style="display:none;"></button>
                    <a herf="javascript:;" class="" onclick="$('#{{$unit->id+1}}').click();" >
                      <i class="fa fa-times-circle" aria-hidden="true" style="font-size:18px;color:#dd4b39;cursor: pointer;"></i>
                    </a>
                  </form>
                  @endif          
                </td>
                <td>لم يتم البناء</td>
                <td>{{$unit->subject->class->name}}</td>
                <td>
                  <div class="operations show">
                    <a href="{{ route('unit.show', $unit) }}"><i class="fa fa-eye" style="font-size:18px;color:#5cb85c"></i></a>
                  </div>
                </td>
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
                      <button id="{{$unit->id}}" class=" btn-xs delete-button" style="display:none;"></button>
                      <a herf="javascript:;" class="" onclick="$('#{{$unit->id}}').click();" >
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