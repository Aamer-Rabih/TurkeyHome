<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تركي هوم</title>
    <link rel="stylesheet" href="{{asset('css/myBootstarp.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaijaan&amp;subset=arabic" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    @yield('styles')
  </head>

  <body>

    @include('admin.inc.messages')
    @include('admin.layouts.partials.header')

    @include('admin.layouts.partials.sidebar')
  
    @yield('content')
    
    @include('admin.layouts.partials.footer')

    <!-- jQuery (Bootstrap JS plugins depend on it) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="{{asset('js/myBootstrap.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    @yield('scripts')
  </body>
</html>
