@extends('admin.layouts.master')

@section('content')
    <div id="content">
      <div class="content-header">
        <h1>
        <small>إدارة الدورات</small>
        </h1>
      </div>


        <div class="row">
          <div class="card-deck">
            
            <div class="col-lg-3">
              <a href="{{route('course.create')}}" class="btn btn-success myhover BP" role="button">إضافة دورة تدريسية<div><i class="material-icons" style="font-size:16px">add_box</i></div></a>
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
                      <th>اسم الدورة</th>
                      <th>التفعيل</th>
                      <th>العرض</th>
                      <th>التعديل</th>
                      <th>الحذف</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($courses as $course)
                    <tr>
                      <td>{{$course->title}}</td>
                      @if($course->active)
                      <td>فعال</td>
                      @elseif(!$course->active)
                      <td>غير فعال</td>
                      @endif
                      <td>
                        <div class="operations update">
                          <a href="{{ route('course.show', $course) }}"><i class="fa fa-eye" style="font-size:18px;color:#5cb85c"></i></a>
                        </div>
                      </td>
                      <td>
                        <div class="operations update">
                          <a href="{{ route('course.edit', $course) }}"><i class="material-icons" style="font-size:18px;color:#00c0ef">update</i></a>
                        </div>
                      </td>
                      <td>
                        <div class="operations delete">

                          <form action="{{ route('course.destroy',['course' => $course]) }}" method="POST" id="deleteForm">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <a href="#" onclick="document.getElementById('deleteForm').submit();">
                              <i class="material-icons" style="font-size:18px;color:#dd4b39">cancel</i>
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