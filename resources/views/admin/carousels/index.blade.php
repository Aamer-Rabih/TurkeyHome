<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body dir="rtl" align="right">
    <h1>All Carousels</h1>
    <table>
        <tr>
        <th>مصدر الصورة</th>
        <th>الترتيب</th>
        <th>تاريخ الإضافة</th>
        <th>تاريخ التعديل</th>
    </tr>
    @foreach($carousels as $carousel)
        <tr>
        <td>{{$carousel->src}}</td>
        <td>{{$carousel->order}}</td>
        <td>{{$carousel->created_at->toDateString()}}</td>
        <td>{{$carousel->updated_at->toDateString()}}</td>
        </tr>


    @endforeach
    </table>
</body>
</html>