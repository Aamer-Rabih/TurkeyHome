@extends('admin.layouts.master')

@section('content')
<div id="content">
<form action="{{route('showlesson.update',['showLesson' => $showLesson->id])}}" method="POST">
<label for="title">title</label>
<input type="text" name="title">

<label for="title">order</label>
<input type="text" name="order">

<label for="title">source</label>
<input type="text" name="src">

<input type="hidden" name='_method' value="PUT">

<input type="submit">


</form>
</div>
@endsection