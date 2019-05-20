@extends('admin.layouts.master')

@section('content')

<div id="content">
    
    <div class="header-card table-cards color-grey">
        <div class="row">
            <div class="col-lg-4">
                <div class="content-header">
                    <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة الدورات الدراسية</small></h1>
                </div>
            </div>
            <div class="col-lg-2">
                @if(!$course->active)
                <form action="{{ route('course.activate', $course) }}" method="POST" id="makeCourseActive" style="display:inline; margin-right:10px;">
                    {!! csrf_field() !!}
                    <a href="#" class="btn btn-success button-margin-header custom-but" onclick="document.getElementById('makeCourseActive').submit();">تفعيل الدورة</a>
                </form>
                @else
                <form action="{{ route('course.deactivate', $course) }}" method="POST" id="makeCourseDeactive" style="display:inline; margin-right:10px;">
                    {!! csrf_field() !!}
                    <a href="#" class="btn btn-success button-margin-header custom-but" onclick="document.getElementById('makeCourseDeactive').submit();">إلغاء تفعيل الدورة</a>
                </form>
                @endif
            </div>
            <div class="col-lg-2">
                <!-- <a href="/subjects/create?selectedclass={{$course->id}}" class="btn btn-success button-margin-header" style="margin-right: 22px" >إضافة مادة 
                    <i class="fa fa-plus" aria-hidden="true" style="font-size:16px"></i>
                </a> -->
            </div>
            <div class="col-lg-4">
                <a href="{{route('course.index')}}" class="btn btn-primary button-margin-header custom-but pull-left" > إدارة كافة الدورات 
                    <i class="fa fa-angle-double-left" aria-hidden="true" style="font-size: 20px;"></i>
                </a>
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
                                <th></th>
                                <th></th>
                                <th>  </th>
                                <th>العرض</th>
                                <th>التعديل</th>
                                <th>الحذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
    </div>

</div>

@endsection


