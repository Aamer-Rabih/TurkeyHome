@extends('front-end.layouts.master')

@section('content')

<!-- ===Image Slider=== -->
@include('front-end.home.partials.image-slider')

<!--  -->
<div class="col-12 text-center pt-3 pb-3" style="background-color:grey;">
  <h1>تركي هوم</h1>
  <p class="lead">slkdnfjasdlkjfgbaldfsjhabldsfjbhaldskjfb</p>
  <a class="btn btn-secondary bttn-md" href="#" target="_blank">رابط</a>
</div>

<!-- ===ShowLessons Carousel=== -->
@include('front-end.home.partials.showLessons-carousel')

<!-- ===ShowLessons Carousel=== -->
@include('front-end.home.partials.studentThanks-carousel')

@endsection