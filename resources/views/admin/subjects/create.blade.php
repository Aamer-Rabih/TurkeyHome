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
       
 
            <input type="checkbox" name="downloable" checked>
            <label>
                    :الدروس قابلة للتحميل
            </label>
         


        <br>
        <br>
        
                
                <input type="checkbox" name="active" checked>
                <label> :فعال
                    </label>
         


        <br/>
        <br>
        
        @if(request()->filled('selectedclass'))
                <input type="hidden" value="{{request()->input('selectedclass')}}" name="class_id">
        @else 

        <select name="class_id" >
                @foreach($classes as $class)
            <option value="{{$class->id}}" {{$selectedclass == $class->id ? 'selected' : ''}}>{{$class->name}}</option>
                @endforeach
            </select>
            <label >:الصف</label>
            <br>
            <br>

        @endif
        
        <button>إنشاء المادة الدرسية</button>
    </form>

</body>
</html>