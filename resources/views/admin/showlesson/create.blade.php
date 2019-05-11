@extends('admin.layouts.master')

@section('content')
<div id="content">
<form action="{{route('showlesson.store')}}" method="POST" enctype = 'multipart/form-data'>
{{csrf_field()}}
<div class="form-group">
<label for="title">title</label>
<input type="text" name="title">
</div>

<div  class="form-group">
<label for="title">order</label>
<input type="text" name="order">
</div>

<div class="form-group">
<label for="title">source</label>
<input type="file" name="src">
</div>

<input type="submit">


</form>
</div>
@endsection