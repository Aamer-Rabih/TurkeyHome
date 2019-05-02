@extends('admin.layouts.master')

@section('content')
    <div id="content">
      <div class="content-header">
        <h1>
          داش بورد
          <small>لوحة التحكم</small>
        </h1>
      </div>


        <div class="row">
          <div class="card-deck">
            
            <div class="col-lg-3">
              <a href="{{route('subject.create')}}" class="btn btn-success myhover BP" role="button">إضافة مادة درسية :<div><i class="material-icons" style="font-size:16px">add_box</i></div></a>
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
                      <th>التفعيل</th>
                      <th>قابلية التنزيل</th>
                      <th>عدد الوحدات الدرسية</th>
                      <th>الصف الدراسي</th>
                      <th>العرض</th>
                      <th>التعديل</th>
                      <th>الحذف</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($subjects as $subject)
                    <tr>
                      <td>{{$subject->name}}</td>
                      @if($subject->active)
                      <td>فعال</td>
                      @else
                      <td>غير فعال</td>
                      @endif
                      @if($subject->downloable)
                      <td>قابلة للتنزيل</td>
                      @else
                      <td>غير قابلة للتنزيل</td>
                      @endif
                      <td>{{$subject->units_num}}</td>
                      <td>{{$subject->class->name}}</ td>
                      <td>
                        <div class="operations update">
                          <a href="{{ route('subject.show', $subject) }}"><i class="fa fa-eye" style="font-size:18px;color:#5cb85c"></i></a>
                        </div>
                      </td>
                      <td>
                        <div class="operations update">
                          <a href="{{ route('subject.edit', $subject) }}"><i class="material-icons" style="font-size:18px;color:#00c0ef">update</i></a>
                        </div>
                      </td>
                      <td>
                        <div class="operations delete">

                          <form action="{{ route('subject.destroy', $subject) }}" method="POST" id="deleteForm">
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