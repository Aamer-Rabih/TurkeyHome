<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

    <form action="">
    
        <input type="file" name="src" id="" value="{{Storage::url($carousel->src)}}">



        <br>

        <select name="order" id="">

            @foreach($orders as $order)
                    <option value="{{$order}}" {{$carousel->order == $order ? "selected" : ""}}>{{$order}}</option>
            @endforeach
        </select>
    
    </form>
</body>
</html>