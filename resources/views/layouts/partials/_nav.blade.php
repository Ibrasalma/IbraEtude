<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{ asset('/css/navbar.css') }}">
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid" style="background: #033649;">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand avatar img-circle img-thumbnail" href="{{ route('root_path') }}"><img src="{{ asset('/images/ib-logo.png') }}"></a>
    </div>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="nav navbar-nav">
        <li class="{{ set_active_route('root_path') }}">
          <a href="{{ route('root_path') }}"><i class="fa fa-home fa-fw"></i> Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="{{ set_active_route('bourses.liste') }}">
          <a href="{{ route('bourses.liste') }}"><i class="fa fa-envelope fa-fw"></i> Etudier en Chine</a>
        </li>
        <li class="{{ set_active_route('universities.liste') }}">
          <a href="{{ route('universities.liste') }}"><i class="glyphicon glyphicon-eye-open"></i> Universités</a>
        </li>
        <li class="{{ set_active_route('about_path') }}">
          <a href="{{ route('about_path') }}"><i class="fa fa-link"></i> A propos</a>
        </li>
        <li class="{{ set_active_route('contact.create') }}">
          <a href="{{ route('contact.create') }}"><i class="fa fa-envelope fa-fw"></i> Contact</a>
        </li>
      </ul>
      @if (Route::has('login'))
      <ul class="nav navbar-nav navbar-right">        
        @auth
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <li class=" nav-item {{ set_active_route('home') }}">
              <a href="{{ url('/home') }}"><i class="glyphicon glyphicon-eye-open"></i> profile</a>
            </li>
            <li class="nav-item {{ set_active_route('lougout') }}">
              <a class="dropdown-item" href="{{ route('logout') }}" data-confirm="Êtes-vous sûr?" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="glyphicon glyphicon-log-out"></i> {{ __('Logout') }}
              </a>
                
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          </ul>
        </li>
        @else
        <li><a href="{{ route('login') }}"><i class="glyphicon glyphicon-log-in"></i> Login</a></li>
          @if (Route::has('register'))
          <li><a href="{{ route('register') }}"><i class="glyphicon glyphicon-registration-mark"></i> Register</a></li>
          @endif
        @endauth
      @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
