<div class="container padding-section" style="color: #777;">
  <div class="text-center" style="margin-bottom:20px;">
    <h1>نماذج من دروسنا</h1>
  </div>
  <div class="showLessonCarouselIndicators">


  @foreach($carousels as $carousel)
  <div class="card text-center showLessonItem">
    <img class="card-img-top" src="{{$carousel->src}}">
    <div class="card-body">
      <h4>عنوان الدرس</h4>
    </div>
  </div>
  @endforeach
</div>
  </div>
<!--
    <div class="card text-center showLessonItem">
      <img class="card-img-top" src="{{asset('imgs/carousels/1.jpg')}}">
      <div class="card-body">
        <h4>عنوان الدرس</h4>
      </div>
    </div>
    <div class="card text-center showLessonItem">
      <img class="card-img-top" src="{{asset('imgs/carousels/1.jpg')}}">
      <div class="card-body">
        <h4>عنوان الدرس</h4>
      </div>
    </div>
    <div class="card text-center showLessonItem">
      <img class="card-img-top" src="{{asset('imgs/carousels/1.jpg')}}">
      <div class="card-body">
        <h4>عنوان الدرس</h4>
      </div>
    </div>
    <div class="card text-center showLessonItem">
      <img class="card-img-top" src="{{asset('imgs/carousels/1.jpg')}}">
      <div class="card-body">
        <h4>عنوان الدرس</h4>
      </div>
    </div>
  </div>

-->