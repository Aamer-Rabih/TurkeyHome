@extends('admin.layouts.master')

@section('content')

<div id="content">
  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة الدروس </small></h1>
        </div>
      </div>
      <div class="col-lg-2">
        @if(!$lesson->active)
        <form action="{{ route('lesson.activate', $lesson) }}" method="POST" id="makelessonActivate" style="display:inline; margin-right:10px;">
          {!! csrf_field() !!}
          <a href="#" class="btn btn-success button-margin-header custom-but" onclick="document.getElementById('makelessonActivate').submit();"> اجعل الدرس مفعل </a>
          </form>
          @else
          <form action="{{ route('lesson.deactivate', $lesson) }}" method="POST" id="makelessonDeactivate" style="display:inline; margin-right:10px;">
            {!! csrf_field() !!}
            <a href="#" class="btn btn-success button-margin-header custom-but" onclick="document.getElementById('makelessonDeactivate').submit();"> اجعل الدرس غير مفعل</a>
        </form>
        @endif
      </div>
      
      <div class="col-lg-6">
        <a href="{{route('lesson.index')}}" class="btn btn-primary button-margin-header custom-but pull-left" >العودة 
          <i class="fa fa-angle-double-left" aria-hidden="true" style="font-size: 20px;"></i>
        </a>
      </div> 
    </div>
  </div>
  
  @if($lesson->type === 'video')
  <div id="table" class="row">
    <div class="col-lg-6">
      <div class="card table-cards color-grey">
        <div class="card-body">
          <div class="content-header">
            <h2>
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i> فيديو الدرس</small>
            </h2>
          </div>

          <video width="520" height="440" controls>
            <source src="{{$lesson->src}}" type="video/mp4">
          Your browser does not support the video tag.
          </video>
          
        </div>
      </div>
    </div>
  </div>
  @endif

  <div id="table" class="row">
    <div class="col-lg-10">
      <div class="card table-cards color-grey">
        <div class="card-body">
          <div class="content-header">
            <h2>
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i> معلومات الدرس</small>
            </h2>
          </div>

          <table class="table table-bordered table-hover table-width">
            <thead>
              <tr> 
                <th>اسم الدرس</th>
                <th>التفعيل</th>   
                <th>المقدمة</th>
                @if($lesson->type === 'image' || $lesson->type === 'pdf' || $lesson->type === 'word')
                <th>رابط الدرس</th>
                @elseif($lesson->type === 'url')
                <th>عنوان موقع الفيديو</th>
                @endif
                @if (Auth::user()->hasRole(3))<th>تقيم الدرس</th>@endif
              </tr>
            </thead>
            <tbody>
              <tr>
               <td>{{$lesson->title}}</td>
               <td>
               @if($lesson->active)
                  <form action="{{ route('lesson.deactivate', $lesson) }}" method="POST" id="activateForm">
                    {!! csrf_field() !!}
                    <button id="{{$lesson->id+1}}" class=" btn-xs delete-button" style="display:none;"></button>
                    <a herf="javascript:;" class="" onclick="$('#{{$lesson->id+1}}').click();" >
                      <i class="fa fa-check-circle" aria-hidden="true" style="font-size:18px;color:#5cb85c;cursor: pointer;"></i>
                    </a>
                  </form> 
                  @else
                  <form action="{{ route('lesson.activate', $lesson) }}" method="POST" id="activateForm">
                    {!! csrf_field() !!}
                    <button id="{{$lesson->id}}" class=" btn-xs delete-button" style="display:none;"></button>
                    <a herf="javascript:;" class="" onclick="$('#{{$lesson->id}}').click();" >
                      <i class="fa fa-times-circle" aria-hidden="true" style="font-size:18px;color:#dd4b39;cursor: pointer;"></i>
                    </a>
                  </form>
                  @endif          
               </td>
               <td>{{$lesson->intro}}</td>
               @if($lesson->type === 'image' || $lesson->type === 'pdf' || $lesson->type === 'word')
               <td><a href="{{$lesson->src}}">تحميل الدرس</a></td>
               @elseif($lesson->type === 'url')
               <td><a href="{{$lesson->src}} " target="_blank">الأنتقال إلى موقع الدرس </a></td>
               @endif
               @if (Auth::user()->hasRole(3))
               <td>
                @if($studentEvaluation === null)
                <form action="{{route('evaluation.store', $lesson)}}" method="POST">
                      {!! csrf_field() !!}
                  <div class="rate">
                    <input type="radio" id="star5" name="value" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="value" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="value" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="value" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="value" value="1" />
                    <label for="star1" title="text">1 star</label>
                    <input type="hidden" id="lesson_id" name="lesson_id" value="{{$lesson->id}}" />
                    <input type="hidden" id="lesson_id" name="student_id" value="{{Auth::user()->id}}" />
                    <button class="btn btn-sm btn-success">تأكيد</button>
                  </div>
                </form>
                @elseif($studentEvaluation != null)
                <form action="{{route('evaluation.update', $studentEvaluation)}}" method="POST">
                      {!! csrf_field() !!}
                  <div class="rate">
                    <input type="radio" id="star5" name="value" value="5" {{ $studentEvaluation->value === 5 ? 'checked' : '' }} />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="value" value="4" {{ $studentEvaluation->value === 4 ? 'checked' : '' }} />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="value" value="3" {{ $studentEvaluation->value === 3 ? 'checked' : '' }} />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="value" value="2" {{ $studentEvaluation->value === 2 ? 'checked' : '' }} />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="value" value="1" {{ $studentEvaluation->value === 1 ? 'checked' : '' }} />
                    <label for="star1" title="text">1 star</label>
                    <button class="btn btn-sm btn-success">تأكيد</button>
                  </div>
                </form>
                @endif
              </td>
              @endif
              </tr>
            </tbody>
          </table>
          
        </div>
      </div>
    </div>
  </div>

  
  <div id="table" class="row">
    <div class="col-lg-8">
      <div class="card table-cards color-grey">
        <div class="card-body">
          <div class="content-header">
            <h2>
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i>تعليقات الدرس</small>
            </h2>
          </div>
          <table class="table table-bordered table-hover table-width">
            <thead>
              <tr> 
                <th>المعلق</th>
                <th>نوع المستخدم</th>
                <th>التعليق</th>
                
                
              </tr>
            </thead>
            <tbody>
              @foreach($comments as $comment)
              <tr>
               <td>{{$comment->commenter->username}}</td>
               <td>{{$comment->commenter_type}}</td>
               <td>{{$comment->content}}</td>
               
              </tr>
              @endforeach
            </tbody>
          </table>

          <form action="{{ route('lesson.addcomment', $lesson) }}" method="POST"  style="display:inline; margin-right:10px;">
            {!! csrf_field() !!}
            <div class="form-group">
            <label for="comment"> اضافة تعليق</label>
            <input class="form-control" type="text" name="content">
            </div>
            <input type="submit" class="btn btn-success myhover" value="اضافة تعليق">
        </form>


        </div>
      </div>
    </div>
    
  </div>

  @if (Auth::user()->hasRole(0) || Auth::user()->hasRole(1) || Auth::user()->hasRole(2))
  <div id="table" class="row">
    <div class="col-lg-6">
      <div class="card table-cards color-grey">
        <div class="card-body">
          <div class="content-header">
            <h2>
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i>تقيم الدرس من قبل الطلاب</small>
            </h2>
          </div>

          <table class="table table-bordered table-hover table-width">
            <thead>
              <tr> 
                <th>الطالب</th>
                <th>التقيم</th>
              </tr>
            </thead>
            <tbody>
              @foreach($ratings as $rating)
              <tr>
               <td>{{$rating->student->full_name}}</td>
               <td>
                <div class="rating">
                  @for($i =0; $i < $rating->value; $i++)
                  <span class="fa fa-star checked"></span>
                  @endfor
                  @for($i =$rating->value; $i < 5; $i++)
                  <span class="fa fa-star"></span>
                  @endfor
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
  @endif

</div>
