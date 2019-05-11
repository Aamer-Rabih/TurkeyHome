@extends('admin.layouts.master')

@section('content')
<div id="content">
<form action="{{route('deneme.update',['deneme' => $deneme->id])}}" method="POST" enctype = 'multipart/form-data'>
{{csrf_field()}}
<div class="form-group">
<label for="title">title</label>
<input type="text" name="title">
</div>

<div  class="form-group">
<label for="title">term</label>
<input type="text" name="term">
</div>

<div class="form-group">
<label for="title">active</label>
<input type="file" name="active">
</div>

<div class="form-group">
<label for="title">src</label>
<input type="file" name="src">
</div>

<div class="form-group">
<label for="title">type</label>
<input type="file" name="type">
</div>

<input type="hidden" name='_method' value="PUT">

<input type="submit">


</form>
</div>
@endsection