@extends('admin.layouts.master')

@section('content')

<div id="content">
  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة الأختبارات </small></h1>
        </div>
      </div>
      <div class="col-lg-2">
        @if(!$test->active)
        <form action="{{ route('test.activate', $test) }}" method="POST" id="maketestActivate" style="display:inline; margin-right:10px;">
          {!! csrf_field() !!}
          <a href="#" class="btn btn-success button-margin-header custom-but" onclick="document.getElementById('maketestActivate').submit();"> اجعل الإختبار مفعل </a>
          </form>
          @else
          <form action="{{ route('test.deactivate', $test) }}" method="POST" id="maketestDeactivate" style="display:inline; margin-right:10px;">
            {!! csrf_field() !!}
            <a href="#" class="btn btn-success button-margin-header custom-but" onclick="document.getElementById('maketestDeactivate').submit();"> اجعل الإختبار غير مفعل</a>
        </form>
        @endif
      </div>
      
      <div class="col-lg-6">
        <a href="{{route('test.index')}}" class="btn btn-primary button-margin-header custom-but pull-left" >العودة 
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
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i> معلومات الإختبار</small>
            </h2>
          </div>

          <table class="table table-bordered table-hover table-width">
            <thead>
              <tr> 
                <th>عنوان الإختبار</th>
                @if (Auth::user()->hasRole(0) || Auth::user()->hasRole(1) || Auth::user()->hasRole(2))
                <th>التفعيل</th>
                @endif
                <th>الفصل</th>
                <th>نوع الملف</th>
                <th>رابط الإختبار</th>
              </tr>
            </thead>
            <tbody>
              <tr>
               <td>{{$test->title}}</td>
               <td>
               @if($test->active)
                  <form action="{{ route('test.deactivate', $test) }}" method="POST" id="activateForm">
                    {!! csrf_field() !!}
                    <button id="{{$test->id+1}}" class=" btn-xs delete-button" style="display:none;"></button>
                    <a herf="javascript:;" class="" onclick="$('#{{$test->id+1}}').click();" >
                      <i class="fa fa-check-circle" aria-hidden="true" style="font-size:18px;color:#5cb85c;cursor: pointer;"></i>
                    </a>
                  </form> 
                  @else
                  <form action="{{ route('test.activate', $test) }}" method="POST" id="activateForm">
                    {!! csrf_field() !!}
                    <button id="{{$test->id}}" class=" btn-xs delete-button" style="display:none;"></button>
                    <a herf="javascript:;" class="" onclick="$('#{{$test->id}}').click();" >
                      <i class="fa fa-times-circle" aria-hidden="true" style="font-size:18px;color:#dd4b39;cursor: pointer;"></i>
                    </a>
                  </form>
                  @endif          
               </td>
               <td>{{$test->term}}</td>
               <td>{{$test->type}}</td>
               <td><a href="{{$test->src}}">تحميل الدرس</a></td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>


  <div id="table" class="row">
    <div class="col-lg-6">
      <div class="card table-cards color-grey">
        <div class="card-body">
          <div class="content-header">
            <h2>
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i> مرفقات الإختبار</small>
            </h2>
          </div>
          <table class="table table-bordered table-hover table-width">
          <thead>
              <tr> 
                <th>اسم الملف</th>
                <th>النوع</th>
              </tr>
            </thead>
            <tbody>
              @foreach($attachments as $attachment)
              <tr>
                <td>{{ $attachment->name }}</td>
                @if($attachment->type === 'file')
                <td>ملف</td>
                @elseif($attachment->type === 'image')
                <td>صورة</td>
                @endif
              </tr>
              @endforeach
            </tbody>
          </table>

          <form action="{{ route('test.addattachment', $test) }}" method="POST"  style="display:inline; margin-right:10px;">
            {!! csrf_field() !!}
                <div class="form-group">
                  <label for="attachment">أضف مرفق إلى الإختبار :</label>
                  <select class="form-control form-control-select mt-3" id="attachment" name="attachment_id">
                    <option selected>-- اختر مرفق --</option>
                    @foreach($attachments as $attachment)
                    <option value="{{$attachment->id}}">{{$attachment->name}}</option>
                    @endforeach 
                  </select>
                </div>
            <input type="submit" class="btn btn-success myhover" value="اضافة مرفق">
        </form>


        </div>
      </div>
    </div>
  </div>



</div>
