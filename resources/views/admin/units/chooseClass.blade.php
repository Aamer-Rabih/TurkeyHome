<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body dir="rtl" align="right">



    
        اختر الصف لإنشاء الوحدة الدرسية:
        <select id="classSelect" name="class_id">
            @foreach($classes as $class)
        <option value="{{$class->id}}">{{$class->name}}</option>
            @endforeach
        </select>

        <br>
        <br>
        <button id="select">اختر</button>
    
<script>
    var selectButton = document.getElementById('select'); 

    selectButton.addEventListener('click', function(){
        var classSelect = document.getElementById('classSelect');

        var id = classSelect.selectedIndex ; 

        window.location = '/classes/' + id + '/units/create'; 


    });
</script>
</body>
</html>