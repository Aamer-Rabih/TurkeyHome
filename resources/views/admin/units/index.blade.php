@extends('admin.layouts.master')

@section('content')
    <div id="content">
      <div class="content-header">
        <h1>
            <small>إدارة الوحدات الدرسية</small>
             
        </h1>
      </div>


        <div class="row">
          <div class="card-deck">
            
            <div class="col-lg-3">
              <a href="units/create" class="btn btn-success myhover BP" role="button">إضافة وحدة درسية<div><i class="material-icons" style="font-size:16px">add_box</i></div></a>
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
                      <th>المادة الدراسية</th>
                      <th>الصف</th>
                      <th>عرض</th>
                      <th>تعديل</th>
                      <th>حذف</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($units as $unit)
                    <tr>
                      <td>{{$unit->title}}</td>
                      @if($unit->active)
                      <td><i class="fa fa-check-circle" aria-hidden="true" style="font-size:18px;color:#5cb85c"></i></td>
                      @else
                      <td><i class="fa fa-times-circle" aria-hidden="true" style="font-size:18px;color:#dd4b39"></i></td>
                      @endif
                      <td>
                      <a href="{{route('subject.show',['subject' =>$unit->subject->id ])}}"> {{$unit->subject->name}}</a>
                      </td>
                      <td>
                      <a href="{{route('class.show', ['class' =>$unit->subject->class->id ])}}">{{$unit->subject->class->name}}
                            </a>
                      </td>
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
                            {{method_field('DELETE')}}

                            <button class="btn btn-danger btn-xs" style="background-color:#FFF;border:0"><i class="fa fa-trash" style="font-size:18px;color:#dd4b39"></i>
                              
                            </button>
                           

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