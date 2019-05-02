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
            
            <div class="col-lg-6">
              <div class="card color-grey">
                <div class="card-body">
                  <div class="card-header">إضافة صف</div>
                  <?php $array= ["الصف الأول","الصف الثاني"];?>

                  <form action="{{route('class.store')}}" method="POST">
                      {!! csrf_field() !!}
                    <div class="form-group">
                      <label for="classRoom"><h5>الصف الدراسي:</h5></label>
                        <select class="form-control form-control-select" id="classRoom" name="name">
                          <option selected>--اختر الصف--</option>
                          <option value="الصف الأول">الصف الأول</option>
                          <option value="الصف الثاني">الصف الثاني</option>
                          <option value=" الصف الثالث">الصف الثالث</option>
                          <option value=" الصف الرابع">الصف الرابع</option>
                          <option value="الصف الخامس">الصف الخامس</option>
                          <option value="الصف السادس">الصف السادس</option>
                          <option value="الصف السابع">الصف السابع</option>
                          <option value="الصف الثامن">الصف الثامن</option>
                          <option value="الصف التاسع">الصف التاسع</option>
                          <option value="الصف العاشر">الصف العاشر</option>
                          <option value="الصف الحادي عشر">الصف الحادي عشر</option>
                          <option value="بكالوريا">بكالوريا</option>
                        </select>
                    </div>
                    
                    <div class="radioG">
                        <h5>مجانية الصف :</h5>
                        <div class="radio">
                        <input type="radio" name="free" value="1" checked>
                        <label>مجاني</label>
                        </div>
                        <div class="radio">
                        <input type="radio" name="free" value="0">
                        <label>غير مجاني</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success myhover">إضافة</button>

                  </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>

    </div>

@endsection