><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
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
</body>
</html>