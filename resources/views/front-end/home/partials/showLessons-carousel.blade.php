<div class="container padding-section" style="color: #777;">
  <div class="text-center" style="margin-bottom:20px;">
    <h1>نماذج من دروسنا</h1>
  </div>
  <div class="showLessonCarouselIndicators">
    @foreach($showLessons as $showLesson)

    $segments = explode('/',$showLesson->src);
    $showLesson->src =array_shift($segments);
    <div class="card text-center showLessonItem">
      <!-- <video width="320" height="240" controls style="width: 100%;">
        <source src="{{$showLesson->src}}" type="video/mp4">
          Your browser does not support the video tag.
      </video> -->
      <iframe width="100%" height="240" src="{{$showLesson->src}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <div class="card-body">
        <h4>{{ $showLesson->title }}</h4>
      </div>
    </div>
    @endforeach
  </div>
</div>
