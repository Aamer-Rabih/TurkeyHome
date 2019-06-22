<div class="container padding-section" style="color: #777;">
  <div class="text-center" style="margin: 10px auto 40px; width: 30%;">
    <h1>نماذج من دروسنا</h1>
    <div class="dropdown-divider" style="border-top: 3px solid;"></div>
  </div>
  <div class="showLessonCarouselIndicators">
    @foreach($showLessons as $showLesson)

    $segments = explode('/',$showLesson->src);
    $showLesson->src =array_shift($segments);
    <div class="card text-center showLessonItem">

      
      
      <div class="card-body">
      {!! $showLesson->src !!}
        <h4>{{ $showLesson->title }}</h4>
      </div>
    </div>
    @endforeach
  </div>
</div>
