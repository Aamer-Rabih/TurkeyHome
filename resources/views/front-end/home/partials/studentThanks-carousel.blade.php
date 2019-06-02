<div class="container-fluid padding-section studentThank-section">
  <div class="text-center" style="margin-top:20px; margin-bottom:20px;">
    <h1>أراء طلابنا</h1>
  </div>
  <div class="studentThankCarouselIndicators">



  @foreach($studentThanks as $studentThank)
    <div class="card text-center studentThankItem">
      <div class="image-cropper"><img class="card-img-top ST-img" src="{{ $studentThank->src }}"></div>
      <div class="card-body">
        <h4>التشكر</h4>
      </div>
    </div>
    @endforeach
  </div>
</div>

<!--
    <div class="card text-center studentThankItem">
      <div class="image-cropper"><img class="card-img-top ST-img" src="{{asset('imgs/carousels/1.jpg')}}"></div>
      <div class="card-body">
        <h4>التشكر</h4>
      </div>
    </div>
    <div class="card text-center studentThankItem">
    <div class="image-cropper"><img class="card-img-top ST-img" src="{{asset('imgs/carousels/1.jpg')}}"></div>
      <div class="card-body">
        <h4>التشكر</h4>
      </div>
    </div>
    <div class="card text-center studentThankItem">
    <div class="image-cropper"><img class="card-img-top ST-img" src="{{asset('imgs/carousels/1.jpg')}}"></div>
      <div class="card-body">
        <h4>التشكر</h4>
      </div>
    </div>
    <div class="card text-center studentThankItem">
    <div class="image-cropper"><img class="card-img-top ST-img" src="{{asset('imgs/carousels/1.jpg')}}"></div>
      <div class="card-body">
        <h4>التشكر</h4>
      </div>
    </div>
  </div>

-->