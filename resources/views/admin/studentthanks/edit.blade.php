@extends('admin.layouts.master')

@section('content')
<div id="content">
<form action="{{route('studentthank.update',['studentThank' => $studentThank->id])}}" method="POST">
<label for="title">content</label>
<input type="text" name="content">

<label for="title">order</label>
<input type="text" name="order">

<label for="title">source</label>
<input type="text" name="src">

<label for="title">type</label>
<input type="text" name="type">

<input type="hidden" name='_method' value="PUT">

<input type="submit">


</form>
</div>
@endsection