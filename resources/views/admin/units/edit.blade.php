<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body dir="rtl" align="right">
<h2>{{$unit->title}}</h2>
<form action="{{route('unit.update', ['unit' => $unit->id ])}}" method="POST">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <input type="text" name="title" value="{{$unit->title}}">
        <br>
        <label>مفعلة</label>
        <input type="radio" name="active" value="1" {{$unit->active ? 'checked' : ''}}>
        <label>غير مفعلة</label>
        <input type="radio" name="active" value="1" {{!$unit->active ? 'checked' : ''}} />
        <br><br>
        @foreach($classes as $class)
            <h2>{{$class->name}}</h2>
            @foreach($class->subjects as $subject)
                <label>{{$subject->name}}</label>
                <input type="radio" name="subject_id" value="subject_id" {{$unit->subject_id == $subject->id ? 'checked' : ''}}>
                <br>
            @endforeach
        @endforeach
        <div>
          <button>عدل الوحدة الدرسية</button>
        </div>
    </form>

    
</body>
</html>