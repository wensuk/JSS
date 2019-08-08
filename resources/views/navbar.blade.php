<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title>Jobs Status System</title>

        <!--CSS-->
        <link href="{{ asset('css/index.css') }}" rel="stylesheet">
        <link type="text/javascript" src="js/bootstrap.js">


        <!-- JS files -->
        <script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
        <!-- <script type="text/javascript" src="js/bootstrap.js"></script> -->


    </head>

    <body>

        @section('nav_bar')
              @guest
              <div class="collapse navbar-collapse">
                <div class="links">
                  <a href="{{url('/')}}">Home</a>
                  <a href="{{route('login')}}">Login</a>
                  <a href="{{route('register')}}">Register</a>
              @endguest

              @if (Auth::check())
                      @auth
                      <div class="collapse navbar-collapse">
                        <div class="links">
                          <a href="{{ url('/dashboard') }}">Home</a>
                          <a href="{{ route('task')}}">New Job</a>
                          <a href="{{ url('/logout')}}">Logout</a>
                          <a>
                          <input type="text" class="search-form" placeholder="  Search...">
                            <button type="submit" class="btn btn-info">Go
                              <!-- <span class="glyphicon glyphicon-search"></span> -->
                            </button>
                          </input>
                          </a>
                        </div>
                      </div>
                      @endauth
              @endif
        @show

            <!-- External js files containing all the actions for the front-end data passing -->
            <script src="{{ asset('js/index.js') }}" rel="text/javascript"></script>

  </body>
</html>
