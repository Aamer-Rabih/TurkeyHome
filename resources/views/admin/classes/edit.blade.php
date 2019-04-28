<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>{{$class->name}}</h1>
<form action="{{route('class.update',['class' => $class->id])}}" method="POST">
    {{csrf_field()}}
    {{method_field("PATCH")}}
    <input type="text" name="name" value="{{$class->name}}">
    <input type="checkbox" name="free" checked={{$class->free}}>

    <br>
    <button>عدل الصف</button>
</form>

<h2>حذف الصف</h2>
<form action="{{route('class.destroy', ['class' => $class->id])}}" method="POST">
    {{csrf_field()}}
    {{method_field("DELETE")}}
    <button>حذف الصف</button>
</form>

<h3>تعديل الصف</h3>

@if($class->free)
<form action="{{route('class.priced', ['class' => $class->id])}}" method="POST">
        {{csrf_field()}}
           <button> اجعل الصف مدفوع</button>
    </form>
@else
<form action="{{route('class.free', ['class' => $class->id])}}" method="POST">
    {{csrf_field()}}
    <button>اجعل الصف مجاني</button>
</form>
@endif
</body>
</html>