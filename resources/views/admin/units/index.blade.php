<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body >
    <h1 style="text-align: right">الوحدات الدرسيّة</h1>
    <table border="1" style="border: 1px solid #555;background:#DDD;margin-left:75%" dir="rtl">
        <thead>
            <tr>
                <th>اسم الوحدة الدراسية</th>
                <th>مفعلة</th>
                <th>المادة</th>
                <th>الصف</th>
                <th>عدد الدروس</th>
                <th>عرض</th>
                <th>تعديل</th>
                <th>حذف</th>
            </tr>
        </thead>
        <tbody>
            @foreach($units as $unit)
                <tr>
                <td><a href="{{route('unit.show', ['unit' => $unit->id])}}">{{$unit->title}}</a></td>
                <td>{{$unit->active}}</td>
                <td><a href="{{route('subject.show',['subject' => $unit->subject->id])}}">{{$unit->subject->name}}</a></td>
                <td><a href="{{route('class.show',['class' => $unit->subject->class->id])}}">{{$unit->subject->class->name}}</a></td>
                <td>{{$unit->lessons->count()}}</td>
                <td>عرض</td>
                <td><a href="{{route('unit.edit', ['unit' => $unit->id])}}">تعديل</a></td>
                <td> 
                <form action="{{route('unit.destroy', ['unit' => $unit->id])}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button>حذف الوحدة الدرسية</button>
                </form>
                </td>
                </tr>

            @endforeach
        </tbody>
    </table>
</body>
</html>