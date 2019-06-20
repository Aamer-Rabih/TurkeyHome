<div class="container padding-section" style="color: #777;">
  <div class="text-center" style="margin-bottom:20px;">
    <h1>نماذج من دروسنا</h1>
  </div>
  <div class="showLessonCarouselIndicators">
    @foreach($showLessons as $showLesson)

    $segments = explode('/',$showLesson->src);
    $showLesson->src =array_shift($segments);
    <div class="card text-center showLessonItem">

      {!! $showLesson->src !!}
      
      <div class="card-body">
        <h4>{{ $showLesson->title }}</h4>
      </div>
    </div>
    @endforeach
  </div>
</div>
