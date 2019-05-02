<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body dir="rtl" align="right">
    
<form action="{{route('unit.store')}}" method="POST">
        {{csrf_field()}}
        <div>اسم الوحدة الدرسية: <br>
        <input type="text" name="title" />
        </div>
        <div>
            مفعلة:
            <input type="checkbox" name="active" >
        </div>
        <div>
            المادة:
            <select  name="subject_id" >
                @foreach($class->subjects as $subject)
            <option value="{{$subject->id}}">{{$subject->name}}</option>

                @endforeach
            </select>
        </div>
        <br><br>
        <button>إنشاء الوحدةالدرسية</button>
    </form>

</body>
</html>