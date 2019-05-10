@extends('admin.layouts.master')

@section('content')

<div id="content">
<br>
<br>
<h1>{{$showLesson->id}}</h1>
<h1>{{$showLesson->title}}</h1>
<h1>{{$showLesson->order}}</h1>
<h1>{{$showLesson->src}}</h1>

</div>

@endsection