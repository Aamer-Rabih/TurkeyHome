@extends('admin.layouts.master')

@section('content')

<?php 
    $subjects= $class->subjects;
?>

    <div id="content">
      <div class="content-header">
        <h1>
          <small>إدارة الصفوف</small>
           
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
                      <a href="/subjects/create?selectedclass={{$class->id}}" class="btn btn-success" style="margin-right: 22px" >
                            إضافة مادة
                        </a>

                        <a href="{{route('class.index')}}" class="btn btn-primary pull-left" > >>إدارة كافة الصفوف </a>
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
                        <th>اسم المادة</th>
                       
                        <th>قابلية الدروس للتنزيل</th>
                        <th>التفعيل</th>
                        
                        <th>عدد الوحدات الدرسية</th>
                        
                        <th>العرض</th>
                        <th>التعديل</th>
                        <th>الحذف</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($class->subjects as $subject)
                      <tr>
                        <td>{{$subject->name}}</td>
                      
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

@endsection



