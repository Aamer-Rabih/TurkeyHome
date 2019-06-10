<div class="container padding-section" style="color: #777;">
  <div class="text-center" style="margin-bottom:20px;">
    <h1>نماذج من دروسنا</h1>
  </div>
  <div class="showLessonCarouselIndicators">
    @foreach($carousels as $carousel)
    <div class="card text-center showLessonItem">
      <img class="card-img-top" src="{{$carousel->src}}" height="200px">
      <video width="320" height="240" controls>
        <source src="{{$carousel->src}}" type="video/mp4">
      Your browser does not support the video tag.
      </video>
      <div class="card-body">
        <h4>عنوان الدرس</h4>
      </div>
    </div>
    @endforeach
  </div>
</div>
