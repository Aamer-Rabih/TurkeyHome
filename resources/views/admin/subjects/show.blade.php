@extends('admin.layouts.master')

@section('content')

<div id="content">
    <div class="content-header">
        <h1>
            <small>إدارة المواد</small>
        </h1>
    </div>


    <div class="row">
        <div class="card-deck">
            
            <div class="col-lg-12">
                <div class="card table-cards color-grey">
                    <div class="card-body table-hover">

                        <h4 style="display:inline;">{{$subject->name}} :</h4>
                            @if(!$subject->active)
                            <form action="{{ route('subject.activate', ['subject' => $subject->id]) }}" method="POST" id="makeActiveForm" style="display:inline; margin-right:10px;">
                                    {!! csrf_field() !!}
                                <a href="#" class="btn btn-success" onclick="document.getElementById('makeActiveForm').submit();">
                                    اجعل المادة مفعلة
                                </a>
                            </form>
                            @else
                            <form action="{{route('subject.deactivate',['subject' => $subject->id])}}" method="POST" id="makeDeactiveForm" style="display:inline; margin-right:10px;">
                                    {!! csrf_field() !!}
                                    <a href="#" class="btn btn-success" onclick="document.getElementById('makeDeactiveForm').submit();">
                                    اجعل المادة غير مفعلة
                                    </a>
                            </form>
                            @endif

                        <a href="/classes/{{$subject->class->id}}/units/create?selectedsubject={{$subject->id}}" class="btn btn-success" style="margin-right: 22px" >
                               إضافة وحدة درسية
                            </a>
    
                            <a href="{{route('subject.index')}}" class="btn btn-primary pull-left" > >>إدارة كافة المواد </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="table" class="row">
            <div class="col-lg-8">
              <div class="card table-cards color-grey">
                <div class="card-body">
                  <table class="table table-bordered table-hover table-width">
                    <thead>
                      <tr> 
                        <th>الوحدة الدرسية</th>
                        <th>مفعلة</th>
                        <th>عرض</th>
                        <th>تعديل</th>
                        <th>حذف</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($subject->units as $unit)
                      <tr>
                        <td>{{$unit->title}}</td>
                        @if($unit->active)
                        <td><i class="fa fa-check-circle" aria-hidden="true" style="font-size:18px;color:#5cb85c"></i></td>
                        @else
                        <td><i class="fa fa-times-circle" aria-hidden="true" style="font-size:18px;color:#dd4b39"></i></td>
                        @endif 
                        <td>
                          <div class="operations update">
                          <a href="{{route('unit.show',['unit' => $unit->id])}}"><i class="fa fa-eye" style="font-size:18px;color:#5c958c"></i></a>
                          </div>
                        </td>
                        <td>
                          <div class="operations update">
                          <a href="{{route('unit.edit',['unit' => $unit->id])}}"><i class="fa fa-edit" style="font-size:18px;color:#00c0ef"></i></a>
                          </div>
                        </td>
                        <td>
                          <div class="operations delete">
                          <form action="{{route('unit.destroy',['unit' => $unit->id])}}" id="deleteForm" method="POST">
                              {{csrf_field()}}
                              <input type="hidden" name="_method" value="DELETE">
                              <a href="#" onclick="document.getElementById('deleteForm').submit();">
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


