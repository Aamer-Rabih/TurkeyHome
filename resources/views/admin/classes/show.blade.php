@extends('admin.layouts.master')

@section('content')

<?php 
    $subjects= $class->subjects;
?>

    <div id="content">
      <div class="content-header">
        <h1>
          داش بورد
          <small>لوحة التحكم</small>
        </h1>
      </div>


        <div class="row">
          <div class="card-deck">
            
            <div class="col-lg-12">
              <div class="card table-cards color-grey">
                  <div class="card-body table-hover">

                        <h4 style="display:inline;">{{$class->name}} :</h4>
                        @if(!$class->free)
                        <form action="{{ route('class.free', $class) }}" method="POST" id="makeClassFreeForm" style="display:inline; margin-right:10px;">
                                {!! csrf_field() !!}
                                <a href="#" class="btn btn-success" onclick="document.getElementById('makeClassFreeForm').submit();">
                                اجعل الصف مجاني
                                </a>
                        </form>
                        @else
                        <form action="{{ route('class.priced', $class) }}" method="POST" id="makeClassUnfreeForm" style="display:inline; margin-right:10px;">
                                {!! csrf_field() !!}
                                <a href="#" class="btn btn-success" onclick="document.getElementById('makeClassUnfreeForm').submit();">
                                اجعل الصف غير مجاني
                                </a>
                        </form>
                        @endif

  
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
                      <th>اسم المادة الدراسية</th>
                      <th>قابلية التنزيل</th>
                      <th>عدد الوحدات الدراسية</th>
                      <th>العرض</th>
                      <th>التعديل</th>
                      <th>الحذف</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($subjects as $subject)
                    <tr>
                      <td>{{$subject->name}}</td>
                      @if($subject->free)
                      <td>مجاني</td>
                      @elseif(!$subject->free)
                      <td>غير مجاني</td>
                      @endif
                      <td>1</td>
                      <td>
                        <div class="operations update">
                          <a href="{{ route('class.show', $subject) }}"><i class="fa fa-eye" style="font-size:18px;color:#5cb85c"></i></a>
                        </div>
                      </td>
                      <td>
                        <div class="operations update">
                          <a href="{{ route('class.edit', $subject) }}"><i class="material-icons" style="font-size:18px;color:#00c0ef">update</i></a>
                        </div>
                      </td>
                      <td>
                        <div class="operations delete">
                          <form action="{{ route('class.destroy', $subject) }}" method="POST" id="deleteForm">
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


>>>>>>> a05f3ba100acce596f029dc00eb1f84359f138b5
