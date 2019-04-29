<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('course.store')}}" method="POST">
        {{csrf_field()}}
        <input type="text" name="title" />
        <div>
            <label for="">فعال</label>
            <input type="radio" name="active" id="" value="1">
            <label for="">غير فعال</label>
            <input type="radio" name="active" value="0">
        </div>
        <button>إنشاء صف جديد</button>
    </form>
</body>
</html>