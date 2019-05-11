@extends('admin.layouts.master')

@section('content')
<div id="content">
<form action="{{route('studentthank.store')}}" method="POST" enctype='multipart/form-data'>
{{csrf_field()}}
<div class="form-group">
<label for="title">type</label>
<input type="text" name="type">
</div>

<div class="form-group"> 
<label for="title">src</label>
<input type="text" name="order">
</div>

<div class="form-group">
<label for="title">source</label>
<input type="file" name="src">
</div>

<div class="form-group">
<label for="title">text</label>
<input type="text" name="content">
</div>

<input type="submit">


</form>
</div>
@endsection