@extends('navbar')

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


        <title>Jobs Status System</title>

        <!--CSS-->
        <link href="{{ asset('css/index.css') }}" rel="stylesheet">


    </head>

    <body>

        @section('header')
        <div class="content">
            <div class="title m-b-md">
                JSS
            </div>
        </div>
        @show


        @yield('nav-bar')
        <!-- @section('navbar') -->
              <!-- <div class="collapse navbar-collapse">

                <div class="links">
                  <a href="{{url('')}}">Home</a>
                  <a>New</a>
                  <a href="{{route('login')}}">Login</a>
                </div>

                <div class="form-group">
                    <input type="text" class="search-form" placeholder="  Search...">
                </div>
              </div> -->
        <!-- @show -->

    </body>
</html>
