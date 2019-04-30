<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body align="right">
    <h2>إنشاء مادة جديدة</h2>
<form action="{{route('subject.store')}}" method="POST">
        {{csrf_field()}}
        <input type="text" name="name"  />
        <br>
        <br>
        <label > 
            
            <input type="radio" name="downloable" value="1" checked>
            قابل للتحميل
        </label>

        <label >
            
            <input type="radio" name="downloable" value="0">
            غير قابل للتحميل
        </label>


        <br>
        <br>
        <label>
                
                <input type="radio" name="active" value="1" checked>
                فعال
        </label>

        <label>
              
                <input type="radio" name="active" value="0">
                غير فعال
        </label>

        <br/>
        <br>
        
        
        <select name="class_id" id="">
            @foreach($classes as $class)
        <option value="{{$class->id}}">{{$class->name}}</option>
            @endforeach
        </select>
        <label >:الصف</label>
        <br>
        <br>
        <button>إنشاء المادة الدرسية</button>
    </form>

</body>
</html>