@extends('admin.layouts.master')

@section('content')
<div id="content">

    <div class="header-card table-cards color-grey">
      <div class="row">
        <div class="col-lg-4">
          <div class="content-header">
            <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> لوحة التحكم</small></h1>
          </div>
        </div>
        <div class="col-lg-8 pull-left">
          <div class="content-header">
            <h6 style="color: #777; margin: 20px; float: left"><span style="color: #AC282F;">{{ Auth::user()->full_name }}</span> ، اهلا بك في لوحة تحكم الحساب.</h6>
          </div>
        </div>
      </div>
    </div>



        @if (Auth::user()->hasRole(0) || Auth::user()->hasRole(1))
        <div class="row" style="margin: 50px 20px 20px;">
          <div class="card-deck">

          @if (Auth::user()->hasRole(0))
            <div class="col-lg-3">
              <a href="{{route('users.indexmanager')}}">
                <div class="card color-p1">
                  <div class="card-body text-center">
                    <p class="card-text color-white">المشرفين</p>
                    <img src="imgs/classroom.png" class="myicon">
                  </div>
                </div>
              </a>
            </div>
            @endif
            <div class="col-lg-3">
              <a href="{{route('users.indexteacher')}}">
                <div class="card color-p2">
                  <div class="card-body text-center">
                    <p class="card-text color-white">المعلمين</p>
                    <img src="imgs/classroom.png" class="myicon">
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-3">
              <a href="{{route('users.indexstudent')}}">
              <div class="card color-p3">
                <div class="card-body text-center">
                  <p class="card-text color-white">الطلاب</p>
                  <img src="imgs/classroom.png" class="myicon">
                </div>
              </div>
              </a>
            </div>
            <div class="col-lg-3">
              <a href="{{route('deneme.index')}}">
                <div class="card bg-aqua">
                  <div class="card-body text-center">
                    <p class="card-text color-white">إدارة الدينيمي</p>
                    <img src="imgs/classroom.png" class="myicon">
                  </div>
                </div>
              </a>
            </div>
            @if (Auth::user()->hasRole(1))
            <div class="col-lg-3">
              <a href="{{route('course.index')}}">
                <div class="card color-p1">
                  <div class="card-body text-center">
                    <p class="card-text color-white">الكورسات</p>
                    <img src="imgs/classroom.png" class="myicon">
                  </div>
                </div>
              </a>
            </div>
            @endif

          </div>
        </div>


        <div class="row" style="margin: 20px;">
          <div class="card-deck">
            
            <div class="col-lg-3">
              <a href="{{route('class.index')}}">
                <div class="card bg-green">
                  <div class="card-body text-center">
                    <p class="card-text color-white">الصفوف</p>
                    <img src="imgs/classroom.png" class="myicon">
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-3">
              <a href="{{route('subject.index')}}">
                <div class="card bg-yellow">
                  <div class="card-body text-center">
                    <p class="card-text color-white">المواد</p>
                    <img src="imgs/classroom.png" class="myicon">
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-3">
              <a href="{{route('unit.index')}}">
                <div class="card bg-red">
                  <div class="card-body text-center">
                    <p class="card-text color-white">الوحدات الدرسية</p>
                    <img src="imgs/classroom.png" class="myicon">
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-3">
              <a href="{{route('lesson.index')}}">
                <div class="card color-p4">
                  <div class="card-body text-center">
                    <p class="card-text color-white">الدروس</p>
                    <img src="imgs/classroom.png" class="myicon">
                  </div>
                </div>
              </a>
            </div>

          </div>
        </div>


        <div class="row" style="margin: 20px;">
          <div class="card-deck">

            <div class="col-lg-3">
              <a href="{{route('notes.index')}}">
                <div class="card bg-yellow2">
                  <div class="card-body text-center">
                    <p class="card-text color-white">الملاحظات</p>
                    <img src="imgs/classroom.png" class="myicon">
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-3">
              <a href="{{route('studentthank.index')}}">
                <div class="card bg-pink">
                  <div class="card-body text-center">
                    <p class="card-text color-white">تشكرات الطلاب</p>
                    <img src="imgs/classroom.png" class="myicon">
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-3">
              <a href="{{route('showlesson.index')}}">
                <div class="card bg-aaa">
                  <div class="card-body text-center">
                    <p class="card-text color-white">الدروس الأستعراضية</p>
                    <img src="imgs/classroom.png" class="myicon">
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-3">
              <a href="{{route('carousel.index')}}">
                <div class="card bg-aab">
                  <div class="card-body text-center">
                    <p class="card-text color-white">إدارة القلاب</p>
                    <img src="imgs/classroom.png" class="myicon">
                  </div>
                </div>
              </a>
            </div>

          </div>
        </div>
        @endif

        @if (Auth::user()->hasRole(2) || Auth::user()->hasRole(3))
        <div class="row" style="margin: 50px 20px 20px;">
          <div class="card-deck">
            
            <div class="col-lg-3">
              <a href="{{route('class.index')}}">
                <div class="card bg-green">
                  <div class="card-body text-center">
                    <p class="card-text color-white">الصفوف</p>
                    <img src="imgs/classroom.png" class="myicon">
                  </div>
                </div>
              </a>
            </div>
            @if (Auth::user()->hasRole(3))
            <div class="col-lg-3">
              <a href="{{route('course.index')}}">
                <div class="card color-p1">
                  <div class="card-body text-center">
                    <p class="card-text color-white">الكورسات</p>
                    <img src="imgs/classroom.png" class="myicon">
                  </div>
                </div>
              </a>
            </div>
            @endif
            @if (Auth::user()->hasRole(2))
            <div class="col-lg-3">
              <a href="{{route('subject.index')}}">
                <div class="card bg-yellow">
                  <div class="card-body text-center">
                    <p class="card-text color-white">المواد</p>
                    <img src="imgs/classroom.png" class="myicon">
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-3">
              <a href="{{route('unit.index')}}">
                <div class="card bg-red">
                  <div class="card-body text-center">
                    <p class="card-text color-white">الوحدات الدرسية</p>
                    <img src="imgs/classroom.png" class="myicon">
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-3">
              <a href="{{route('lesson.index')}}">
                <div class="card color-p4">
                  <div class="card-body text-center">
                    <p class="card-text color-white">الدروس</p>
                    <img src="imgs/classroom.png" class="myicon">
                  </div>
                </div>
              </a>
            </div>
            @endif

          </div>
        </div>
        @endif


</div>
@endsection