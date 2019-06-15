
<header id="main-header">
  <nav id="header-nav" class="navbar navbar-default">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">
        <img src="{{asset('imgs/admin-logo.png')}}" alt="Logo" style="width:50px;">
      </a>
      <a href="/" class="pull-right">
        <div id="logo-name">تركي هوم</div>
      </a>
    </div>
    <a class="logout" href="{{ route('logout') }}"
         onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                                        {{ __('تسجيل الخروج') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </nav>
</header>

