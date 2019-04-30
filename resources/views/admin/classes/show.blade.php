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
<table border="1">
    <thead>
        <tr>
            <th>Subject Name</th>
            <th>Active</th>
        </tr>
    </thead>
    <tbody>
        @foreach($class->subjects as $subject)
        <tr>
            <td>{{$subject->name}}</td>
            <td>{{$subject->active ? 'نعم' : 'لا'}}
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
