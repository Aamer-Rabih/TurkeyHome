@extends('admin.layouts.master')

@section('content')

<div id="content">
  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> ادارة المستخدمين</small></h1>
        </div>
      </div>
    </div>
  </div>
  <div id="table" class="row">
    <div class="card-deck">       
      <div class="col-lg-6">
        <div class="card color-grey">
          <div class="card-body">
            <div class="card-header">اضافة مستخدم جديد <i class="fa fa-plus-square" aria-hidden="true"></i></div>
              
              <form action="{{route('users.store')}}" method="POST">
                      {!! csrf_field() !!}

                 <div class="form-group">
                  <label for="role">اختر نوع المستخدم :</label>
                  <select name="role" id="role" class="form-control">
                  @if(Auth::user()->hasRole(0))
                  <option value="0">مدير نظام</option>
                  <option value="1">مشرف</option>
                  @endif
                  <option value="2">مدرس</option>
                  <option selected value="3">طالب</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="username"><h5>اسم المستخدم :</h5></label>
                  <input type="text" class="form-control" id="username" name="username" required placeholder="اسم المستخدم">
                </div>

                <div class="form-group">
                  <label for="password"><h5>كلمة المرور :</h5></label>
                  <input type="password" class="form-control" id="password" name="password" required placeholder="كلمة السر">
                </div>

                <div class="form-group">
                  <label for="full_name"><h5>الاسم الكامل :</h5></label>
                  <input type="text" class="form-control" id="full_name" name="full_name" required placeholder="الاسم الكامل">
                </div>

                <div class="form-group">
                  <label for="tc"><h5>رقم الجمبلك:</h5></label>
                  <input type="text" class="form-control" id="tc" name="tc" required placeholder="tc">
                </div>

                <!-- <div class="form-group">
                  <label for="email"><h5>البريد الالكتروني :</h5></label>
                  <input type="text" class="form-control" id="email" name="email" required placeholder="البريد">
                </div> -->

                <div class="form-group">
                  <label for="phone"><h5>رقم الهاتف:</h5></label>
                  <input type="text" class="form-control" id="phone" name="phone" required placeholder="رقم الهاتف">
                </div>

                <div class="radioG">
                  <h5>تفعيل المستخدم  :</h5>
                  <div class="radio">
                    <input type="radio" name="active" value="1" checked>
                    <label>مفعل</label>
                  </div>
                  <div class="radio">
                    <input type="radio" name="active" value="0">
                    <label>غير مفعل</label>
                  </div>
                </div>

                
                
                <button type="submit" class="btn btn-success button1">إضافة</button>
                <a href="{{ URL::previous() }}" class="btn btn-default" style="margin-right:5px">إلغاء</a>
              </form>
              
          </div>
        </div>
      </div>      
    </div>
  </div>
</div>

@endsection