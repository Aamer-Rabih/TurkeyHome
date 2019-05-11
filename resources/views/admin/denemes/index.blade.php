@extends('admin.layouts.master')

@section('content')
<div id="content">
<h1>show lesson</h1> 
<table>
  <thead>
  <tr>
   <th>term</th>
   <th>title</th>
   <th>active</th>
   <th>src</th>
   <th>type</th>
   <th></th>
   </tr>
  </thead>
  <tbody>
  @foreach ($denemes as $deneme)
  <tr>
  <td>{{$deneme->term}}</td>
  <td>{{$deneme->title}}</td>
  <td>{{$deneme->active}}</td>
  <td>{{$deneme->src}}</td>
  <td>{{$deneme->type}}</td>
  <td><form action="{{ route('deneme.destroy',['deneme'=> $deneme]) }}" method="POST" id="deleteForm">
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