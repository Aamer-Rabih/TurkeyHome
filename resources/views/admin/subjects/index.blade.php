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
                      <th>الصف الدراسي</th>
                      <th>قابلية الدروس للتنزيل</th>
                      <th>التفعيل</th>
                      
                      <th>عدد الوحدات الدرسية</th>
                      
                      <th>العرض</th>
                      <th>التعديل</th>
                      <th>الحذف</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($subjects as $subject)
                    <tr>
                      <td>{{$subject->name}}</td>
                    <td><a href="{{route('class.show',['class' => $subject->class->id])}}">{{$subject->class->name}}</a></td>
                    @if($subject->downloable)
                      <td>قابلة للتنزيل</td>
                      @else
                      <td>غير قابلة للتنزيل</td>
                    @endif
                    @if($subject->active)
                      <td>فعال</td>
                    @else
                      <td>غير فعال</td>
                    @endif
                      
                      <td>{{$subject->units->count()}}</td>
                      
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

                          <form action="{{ route('subject.destroy',['subject'=> $subject]) }}" method="POST" id="deleteForm">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
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