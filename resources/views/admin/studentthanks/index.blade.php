@extends('admin.layouts.master')

@section('content')
<div id="content">
<h1>student Thanks</h1> 
<table>
  <thead>
  <tr>
   <th>order</th>
   <th>type</th>
   <th>src</th>
   <th>text</th>
   <th></th>
   </tr>
  </thead>
  <tbody>
  @foreach ($studentThanks as $studentThank)
  <tr>
  <td>{{$studentThank->order}}</td>
  <td>{{$studentThank->type}}</td>
  <td>{{$studentThank->src}}</td>
  <td>{{$studentThank->content}}</td>
  <td><form action="{{ route('studentthank.destroy',['studentThank'=> $studentThank]) }}" method="POST" id="deleteForm">
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