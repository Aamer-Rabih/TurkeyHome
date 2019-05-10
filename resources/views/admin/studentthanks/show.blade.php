@extends('admin.layouts.master')

@section('content')

<div id="content">
<br>
<br>
<h1>{{$studentThank->content}}</h1>
<h1>{{$studentThank->type}}</h1>
<h1>{{$studentThank->order}}</h1>
<h1>{{$studentThank->src}}</h1>

</div>

@endsection