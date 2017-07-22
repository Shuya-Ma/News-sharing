<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>NewsPoint</title>

  <!-- Styles -->
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <link href="/css/app.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/css/commentsCss.css">
  <link rel="stylesheet" type="text/css" href="/css/css-fontawesome/font-awesome.css">
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <!-- Scripts -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script>
  window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
    ]); ?>
  </script>
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">

          <!-- Collapsed Hamburger -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
          <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">NewsPoint</a>
          </div>
          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">
            <!-- search bar -->
            <li>
              {!! Form::open([
              'method'=>'GET',
              'route'=>'listusers',
              'class'=>'navbar-form navbar-left',
              'role'=>'search'
              ]) !!}
              <div class="input-group custom-search-form">
                <input type="text" class="form-control" name="search" placeholder="Search users ...">
                <span class="input-group-btn">
                  <button class="btn btn-default-sm" type="submit">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
              {!! Form::close() !!}
            </li>
            <!-- Authentication Links -->
            @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
            @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="{{ url('/logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Logout</a>

                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </li>
                <li>
                  <a href="{{ url('showavatar', Auth::id()) }}">Profile Photo</a>
                </li>
                <li>
                  <a href="{{ route('tasks.index') }}">Manage Posts</a>
                </li>
                <li>
                  <a href="{{route('users.show', Auth::id())}}">Home Page</a>
                </li>
              </ul>
            </li>
            @endif
          </ul>

          <!-- Left Side Of Navbar -->
          <ul class="nav navbar-nav navbar-left">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('tasks.create') }}">Post +</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <main>
      <div class="container">
        @include('partials.alerts.successflash')

        @yield('content')
      </div>
    </main>

  </div>
  <!-- Scripts -->
  <script src="/js/app.js"></script>
  <script src="http://code.jquery.com/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  @yield('footer')
</body>
</html>
