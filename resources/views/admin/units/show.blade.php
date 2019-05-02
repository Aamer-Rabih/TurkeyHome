<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body align="right" dir="rtl">
<h1>{{$unit->title}}</h1>
<p>المادة: {{$unit->subject->name}}</p>
<p>مفعلة: {{$unit->active}}</p>
<p>عدد الدروس: {{$unit->lessons->count()}}</p>
<div>
    @if($unit->active)
<form action="{{route('unit.deactivate', ['unit' => $unit->id])}}" method="POST">
            {{csrf_field()}}
            <button>الغ تفعيل الوحدة</button>
        </form>
    @else 
    <form action="{{route('unit.activate',['unit' => $unit->id ])}}" method="POST">
        {{csrf_field()}}
        <button>فعل الوحدة</button>
        </form>
    @endif
</div>
</body>
</html>