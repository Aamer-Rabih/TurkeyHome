<<<<<<< HEAD
><!DOCTYPE html>
=======
<!DOCTYPE html>
>>>>>>> c0e5502b8f06221878f8a85668d5f31c0dcb5d38
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<<<<<<< HEAD
<body>
    

    @foreach($carousels as $carousel)

        <h1>{{$carousel->src}}</h1>

        <h2>Order: {{$carousel->order}}</h2>
        <br>
        <form action="{{route('carousel.destroy', ['carousel' => $carousel->id])}}" method="POST">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button>Delete</button>

            
        </form>

    @endforeach
=======
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
>>>>>>> c0e5502b8f06221878f8a85668d5f31c0dcb5d38
</body>
</html>