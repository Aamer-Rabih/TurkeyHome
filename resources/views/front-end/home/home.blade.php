@extends('front-end.layouts.master')

@section('content')

<!-- === Image Slider === -->
@include('front-end.home.partials.image-slider')

<!-- === News Bar === -->
@include('front-end.home.partials.news-bar')

<!-- === ShowLessons Carousel === -->
@include('front-end.home.partials.showLessons-carousel')

<!-- === ShowLessons Carousel === -->
@include('front-end.home.partials.studentThanks-carousel')

@endsection