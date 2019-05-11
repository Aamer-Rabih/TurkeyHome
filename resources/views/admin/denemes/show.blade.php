@extends('admin.layouts.master')

@section('content')

<div id="content">
<br>
<br>
<h1>{{$deneme->term}}</h1>
<h1>{{$deneme->title}}</h1>
<h1>{{$deneme->type}}</h1>
<h1>{{$deneme->src}}</h1>
<h1>{{$deneme->active}}</h1>

</div>

@endsection