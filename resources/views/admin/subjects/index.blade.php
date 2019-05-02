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
            
            <div class="col-lg-3">
              <a href="subjects/create" class="btn btn-success myhover BP" role="button">إضافة مادة<div><i class="material-icons" style="font-size:16px">add_box</i></div></a>
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
                      <th>اسم المادة</th>
                      <th>الصف</th>
                      <th>الدروس قابلة للتحميل؟</th>
                      <th>فعالة</th>
                      <th>عدد الوحدات الدرسية</th>
                      <th>تاريخ الإضافة</th>
                      <th>تاريخ آخر تعديل</th>
                      <th>عرض</th>
                      <th>تعديل</th>
                      <th>حذف</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($subjects as $subject)
                    <tr>
                      <td>{{$subject->name}}</td>
                    <td><a href="{{route('class.show', ['class' => $subject->class->id])}}">{{$subject->class->name}} <i class="fa fa-briefase"></i></a>
                    </td>
                    <td>
                        {{$subject->downloable ? 'نعم' : 'لا'}}
                    </td>
                    <td>
                      @if($subject->active)
                      <i class="fa fa-check-circle" aria-hidden="true" style="font-size:18px;color:#5cb85c"></i>
                      @else
                      <i class="fa fa-times-circle" aria-hidden="true" style="font-size:18px;color:#dd4b39"></i>
                      @endif
                      </td>
                      <td>
                        {{$subject->units->count()}}
                      </td>

                      <!-- Creation Data -->
                      <td>
                          {{$subject->created_at}}
                      </td>
                      <!-- Last Update date -->
                      <td>
                        {{$subject->updated_at}}
                      </td>
                      <td>
                        <div class="operations update">
                        <a href="{{route('subject.show',['subject' => $subject->id])}}"><i class="fa fa-eye" style="font-size:18px;color:#5c958c"></i></a>
                        </div>
                      </td>
                      <td>
                        <div class="operations update">
                        <a href="{{route('subject.edit',['subject' => $subject->id])}}"><i class="fa fa-edit" style="font-size:18px;color:#00c0ef"></i></a>
                        </div>
                      </td>
                      <td>
                        <div class="operations delete">
                        <form action="{{route('subject.destroy',['subject' => $subject->id])}}" id="deleteForm" method="POST">
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