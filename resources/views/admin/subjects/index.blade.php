<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Subject Name</th>
                <th>Active</th>
                <th>Is Downloable?</th>
                <th>Class</th>
                <th>Number of Units</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($subjects as $subject)
                <tr>
                <td><a href="{{route('subject.show', ['subject' => $subject->id])}}">{{$subject->name}}</a></td>
                <td>{{$subject->active ? 'نعم' : 'لا'}}</td>
                <td>{{$subject->downloable? 'نعم' : 'لا'}}</td>
                <td><a href="{{route('class.show',['class' => $subject->class->id])}}">{{$subject->class->name}}</a></td>
                <td>{{$subject->units->count()}}</td>
                <td>
                <form action="{{route('subject.destroy', ['subject' => $subject->id])}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button>حذف المادة</button>
                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>