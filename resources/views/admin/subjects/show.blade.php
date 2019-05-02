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
            
            <div class="col-lg-12">
                <div class="card table-cards color-grey">
                    <div class="card-body table-hover">

                        <h4 style="display:inline;">{{$subject->name}} :</h4>
                            @if(!$subject->active)
                            <form action="{{ route('subject.activate', $subject) }}" method="POST" id="makeActiveForm" style="display:inline; margin-right:10px;">
                                    {!! csrf_field() !!}
                                <a href="#" class="btn btn-success" onclick="document.getElementById('makeActiveForm').submit();">
                                    اجعل المادة مفعلة
                                </a>
                            </form>
                            @else
                            <form action="{{ route('course.deactivate', $course) }}" method="POST" id="makeDeactiveForm" style="display:inline; margin-right:10px;">
                                    {!! csrf_field() !!}
                                    <a href="#" class="btn btn-success" onclick="document.getElementById('makeDeactiveForm').submit();">
                                    اجعل المادة غير مفعلة
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


