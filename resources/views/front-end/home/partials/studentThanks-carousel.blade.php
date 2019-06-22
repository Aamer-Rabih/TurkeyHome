<div class="container-fluid padding-section studentThank-section">
  <div class="text-center" style="margin: 20px auto 40px; width: 20%;">
    <h1>أراء طلابنا</h1>
    <div class="dropdown-divider" style="border-top: 2px solid #e9ecef;"></div>
  </div>
  <div class="studentThankCarouselIndicators">
    @foreach($studentThanks as $studentThank)
    <div class="card text-center studentThankItem" style="height: 400px;">
      <div class="image-cropper"><img class="card-img-top ST-img" src="{{ $studentThank->src }}"></div>
        <div class="card-body">
          <h4>{{ $studentThank->content }}</h4>
        </div>
    </div>
    @endforeach
  </div>
</div>