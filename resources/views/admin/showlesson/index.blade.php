@extends('admin.layouts.master')

@section('content')
<div id="content">
<h1>show lesson</h1> 
<table>
  <thead>
  <tr>
   <th>Id</th>
   <th>title</th>
   <th>order</th>
   <th>src</th>
   <th></th>
   </tr>
  </thead>
  <tbody>
  @foreach ($showLessons as $showLesson)
  <tr>
  <td>{{$showLesson->id}}</td>
  <td>{{$showLesson->title}}</td>
  <td>{{$showLesson->order}}</td>
  <td>{{$showLesson->src}}</td>
  <td><form action="{{ route('showlesson.destroy',['showLesson'=> $showLesson]) }}" method="POST" id="deleteForm">
                  {{ csrf_field() }}
                  <input type ="hidden" name="_method" value="DELETE">
                  <input type ="submit" value ="Delete" >
                  </form> </td>
  </tr>
  @endforeach
  </tbody>
</table>
</div>
@endsection