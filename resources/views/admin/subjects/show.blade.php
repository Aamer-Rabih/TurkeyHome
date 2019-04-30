<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>{{$subject->name}}</h1>
<table border="1">

    <thead>
    <th>Unit Name</th>
    <th>Active</th>
    </thead>

    <tbody>
        @foreach($subject->units as $unit)
        <tr>
        <td>{{$unit->title}}</td>
        <td>{{$unit->active ? 'نعم' : 'لا'}}</td>
        </tr>

        @endforeach
    </tbody>
</table>
</body>
</html>