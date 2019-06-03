<nav class="navbar navbar-expand-md navbar-light bg-light">
  <div class="container">

    <div class="col-lg-5 col-md-5 col-sm-8">
      <a class="navbar-brand pull-right" href="#"><img id="img-brand" src="{{asset('imgs/logo1.png')}}" width="100px">
        <!--<div id="brand-label">
          <h2><strong><span class="main-red">تركي </span>هوم</strong></h2>
          <h6><span class="main-red" style="padding-left: 15px;">Turkey </span>&nbsp;Home</h6>
        </div>-->
      </a>
    </div>

    <div class="col-lg-7 col-md-7 col-sm-4" style="padding: 0px;">
      <button class="navbar-toggler" type="button" data-toggler="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#home">الرئيسية</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              الصفوف
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              @foreach($classes as $class)
              <a class="dropdown-item" href="#">{{ $class->name }}</a>
              @endforeach
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              الدورات
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach($classes as $class)
              <a class="dropdown-item" href="#">{{ $courses->title }}</a>
              <div class="dropdown-divider"></div>
            @endforeach
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">عن المدرسة</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">تواصل معنا</a>
          </li>
        </ul>
      </div>
    </div>

  </div>
</nav>