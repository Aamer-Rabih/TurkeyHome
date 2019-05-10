@extends('admin.layouts.master')

@section('content')

<div id="content">

  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة القلاب</small></h1>
        </div>
      </div>
      <div class="col-lg-2">
        <a href="{{route('carousel.create')}}" class="btn btn-success myhover BP" role="button">إضافة صورة للقلاب<div><i class="material-icons" style="font-size:16px">add_box</i></div></a>
      </div>
    </div>
  </div>
  
  <div id="table" class="row">
    <div class="col-lg-8">
      <div class="card table-cards color-grey">
        <div class="card-body">
          <div class="content-header">
            <h2>
              <small><i class="fa fa-picture-o" aria-hidden="true" style="font-size:24px;"></i> صور القلاب </small>
            </h2>
          </div>
          <table class="table table-bordered table-hover table-width">
            <thead>
              <tr> 
                <th>الصورة</th>
                <th>ترتيب العرض</th>
                <th>عرض</th>
                <th>تعديل</th>
                <th>حذف</th>
              </tr>
            </thead>
            <tbody>
              @foreach($carousels as $carousel)
              <tr>
                <td>
                    <img src="{{$carousel->src}}" width="60" height="40" alt="Picture">
                </td>
                <td>{{$carousel->order}}</td>
                <td>
                  <div class="operations update">
                    <a href="{{ route('carousel.show', $carousel) }}"><i class="fa fa-eye" style="font-size:18px;color:#5cb85c"></i></a>
                  </div>
                </td>
                <td>
                  <div class="operations update">
                    <a href="{{ route('carousel.edit', $carousel) }}"><i class="fa fa-edit" style="font-size:18px;color:#00c0ef"></i></a>
                  </div>
                </td>
                <td>
                  <div class="operations delete">
                    <form action="{{ route('carousel.destroy',$carousel) }}" method="POST">
                      {!! csrf_field() !!}
                      <input type="hidden" name="_method" value="DELETE">    
                      <button id="{{$carousel->id}}" class=" btn-xs delete-button" style="display:none;">
                        <i class="fa fa-trash" style="font-size:18px;color:#dd4b39"></i>
                      </button>
                      <a herf="javascript:;" onclick="$('#{{$carousel->id}}').click();" >
                        <i class="fa fa-trash" style="font-size:18px;color:#dd4b39"></i>
                      </a>
                    </form>       
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

</div>

@endsection