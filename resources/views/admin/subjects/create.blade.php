<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>

    <form action="{{route('subject.store')}}" method="POST">
        {{csrf_field()}}
        <input type="text" name="name"  />
        <br>
    
        <label > 
            قابل للتحميل
            <input type="radio" name="downloable" value="1">
        </label>

        <label >
            غير قابل للتحميل
            <input type="radio" name="downloable" value="0">
        </label>


        <br>
        <label>
                فعال
                <input type="radio" name="active" value="1">
        </label>

        <label>
                غير فعال
                <input type="radio" name="active" value="0">
        </label>

        
        
        <label >الصف:</label>
        <select name="class_id" id="">
            @foreach($classes as $class)
        <option value="{{$class->id}}">$class->name</option>
            @endforeach
        </select>
        <button>إنشاء المادة الدرسية</button>
    </form>
    </div>
</body>
</html>