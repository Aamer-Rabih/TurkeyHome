<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>إدارة الدورات</title>
</head>
<body>
    <ul>
        @foreach($courses as $course)
            <li>{{$course->title}}</li>
            <li>{{$course->active}}</li>
        @endforeach
    </ul>
</body>
</html>