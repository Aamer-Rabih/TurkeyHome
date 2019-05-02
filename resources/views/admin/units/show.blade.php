@extends('admin.layouts.master')

@section('content')

    <div id="content">
      <div class="content-header">
        <h1>
            <small>إدارة الوحدات الدرسية</small>
        </h1>
      </div>


        <div class="row">
          <div class="card-deck">
            
            <div class="col-lg-12">
              <div class="card table-cards color-grey">
                  <div class="card-body table-hover">

                        <h4 style="display:inline;">{{$unit->title}} :</h4>
                        @if(!$unit->active)
                        <form action="{{ route('unit.activate',['unit' => $unit->id]) }}" method="POST" id="makeClassFreeForm" style="display:inline; margin-right:10px;">
                                {!! csrf_field() !!}
                                <a href="#" class="btn btn-success" onclick="document.getElementById('makeClassFreeForm').submit();">
                                فعل الوحدة الدرسية
                                </a>
                        </form>
                        @else
                        <form action="{{ route('unit.deactivate',['unit' => $unit->id]) }}" method="POST" id="makeClassUnfreeForm" style="display:inline; margin-right:10px;">
                                {!! csrf_field() !!}
                                <a href="#" class="btn btn-success" onclick="document.getElementById('makeClassUnfreeForm').submit();">
                                    الغ تفعيل الوحدة الدرسية
                                </a>
                        </form>
                        @endif

                       
                            <a href="#"class="btn btn-success" style="margin-right: 22px" >
                                إضافة درس للوحدة
                            </a>
                    </form>
                <a href="{{route('unit.index')}}" class="btn btn-primary pull-left" > >>إدارة كافة الوحدات </a>
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
                      <th>اسم الدرس</th>
                      <th>النوع</th>
                      <th>المصدر</th>
                      <th>المادة</th>
                      <th>الصف</th>
                      <th>تاريخ الإنشاء</th>
                      <th>تاريخ آخر تعديل</th>
                      <th>فعال؟</th>
                      <th>عرض</th>
                      <th>تعديل</th>
                      <th>حذف</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($unit->lessons as $lesson)
                    <tr>
                      <td>{{$lesson->name}}</td>

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



