<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body align="right">
<h2> {{$subject->name}} تعديل مادة </h2>
<form action="{{route('subject.update', ['subject' => $subject->id])}}" method="POST">
    {{csrf_field()}}
    {{method_field('PUT')}}
<input type="text" name="name"  value={{$subject->name}} >
        <br>
        <br>

        <span>هل الدروس قابلة للتحميل</span>&nbsp;&nbsp;
        <input type="radio" name="downloable" value="1" {{$subject->downloable ? 'checked' : ''}}>
        <input type="radio" name="downloable" value="0" {{$subject->downloable ? 'checked' : ''}}>
        <br>
        <span>:المادة فعالة</span>
        <input type="radio"  name="active" value="1" {{$subject->active ? 'checked' : ''}}>
        <input type="radio" name="active" value="0" {{$subject->active ? 'checked' :'' }}>
        <br>
        <select name="class_id" id="">
            @foreach($classes as $class)
        <option value="{{$class->id}}" {{$subject->id == $class->id ? 'selected':''}}>{{$class->name}}</option>
            @endforeach
        </select>
        <label >:الصف</label>
        <br>
        <br>
        <button>تعديل المادة الدراسية</button>
    </form>

</body>
</html>