@extends('master')

@sectoin('content')

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
              <a href="">
                <div class="card color-p1">
                  <div class="card-body text-center">
                    <p class="card-text">المشرفين</p>
                    <img src="imgs/classroom.png" class="myicon">
                  </div>
                </div>
              </a>
              
            </div>
            <div class="col-lg-3">
              <div class="card color-p2">
                <div class="card-body text-center">
                  <p class="card-text">المعلمين</p>
                  <img src="imgs/classroom.png" class="myicon">
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card color-p3">
                <div class="card-body text-center">
                  <p class="card-text">الطلاب</p>
                  <img src="imgs/classroom.png" class="myicon">
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card bg-aqua">
                <div class="card-body text-center">
                  <p class="card-text">الصفوف</p>
                  <img src="imgs/classroom.png" class="myicon">
                </div>
              </div>
            </div>


          </div>
        </div>

        <div class="row">
          <div class="card-deck">
            
            <div class="col-lg-3">
              <div class="card bg-green">
                <div class="card-body text-center">
                  <p class="card-text">المواد</p>
                  <img src="imgs/classroom.png" class="myicon">
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card bg-yellow">
                <div class="card-body text-center">
                  <p class="card-text">الدورات</p>
                  <img src="imgs/classroom.png" class="myicon">
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card bg-red">
                <div class="card-body text-center">
                  <p class="card-text">الوحدات الدرسية</p>
                  <img src="imgs/classroom.png" class="myicon">
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card color-p4">
                <div class="card-body text-center">
                  <p class="card-text">الدروس</p>
                  <img src="imgs/classroom.png" class="myicon">
                </div>
              </div>
            </div>

          </div>
        </div>

    </div>

@stop