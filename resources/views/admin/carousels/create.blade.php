<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('carousel.store')}}" enctype="multipart/form-data" method="POST">
        {{csrf_field()}}
        <label for="">Src</label>
        <input type="file" name="src" id="src" accept="image/*">

        <br>
        <label for="">Order:</label>
        <select name="order" id="">
            @foreach($orders as $order)
                <option value="{{$order}}">{{$order}}</option>
            @endforeach
        </select>

        <button>Submit</button>
    </form>
</body>
</html>