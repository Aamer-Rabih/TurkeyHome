<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>{{$course->title}}</h1>
<form action="{{route('course.update',['course' => $course->id])}}" method="POST">
    {{csrf_field()}}
    {{method_field('PATCH')}}
<input type="text" name="title" value="{{$course->title}}">
    <div>
        <label for="">فعال</label>
        <input type="radio" name="active" value="1" {{$course->active ? "checked" : ""}}>
        <label for="">غير فعال</label>
        <input type="radio" name="active" value ="0"{{!$course->active ? "checked" : ""}}>
    </div>
    <button>عدل الدورة</button>
</form>
<hr>
<h2>حذف دورة</h2>
<form action="{{route('course.destroy', ['course' => $course->id ])}}" method="POST">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button>حذف الدورة</button>

</form>
<hr>
<h2>تعديل دورة</h2>

@if($course->active)
<form action="{{route('course.deactivate', ['course' => $course->id])}}" method="POST">
        {{csrf_field()}}
           <button> الغ تفعيل الدورة</button>
    </form>
@else
<form action="{{route('course.activate', ['course' => $course->id])}}" method="POST">
    {{csrf_field()}}
    <button>فعل الدورة</button>
</form>
@endif
</body>
</html>