<!DOCTYPE html>
<html lang="{{ locale()->current() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

        <style>
            body {
                font-family: 'Lato';
            }

            .fa-btn {
                margin-right: 6px;
            }
        </style>
    </head>
    <body id="app-layout">
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

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Laravel Task List
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="{{ Request::is('home') ? 'active' : '' }}"><a href="{{ url('/home') }}">{{ __('app.mainbar.home') }}</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ __('app.mainbar.language') }}</a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach(locale()->supported() as $locale => $name_locale)
                                        <li class="@if($locale == locale()->current()) active @endif"><a href="{{ url('/' . $locale) }}"></i>{{ $name_locale }}</a></li>
                                    @endforeach
                                    {{-- <li class="active"><a href="{{ url('/en') }}"></i>English</a></li> --}}
                                    {{-- <li class="{{  }}"><a href="{{ url('/pt') }}"></i>Português</a></li> --}}
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ __('app.mainbar.task') }}<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="{{ Request::is('tasks') ? 'active' : '' }}"><a href="{{ url('/'.locale()->current() .'/tasks') }}"><i class="fa fa-btn fa-tasks" aria-hidden="true"></i>{{ __('app.mainbar.tasklist.overview') }}</a></li>
                                    <li class="{{ Request::is('tasks-all') ? 'active' : '' }}"><a href="{{ url('/'.locale()->current() .'/tasks-all') }}"><i class="fa fa-btn fa-filter" aria-hidden="true"></i>{{ __('app.mainbar.tasklist.all') }}</a></li>
                                    <li class="{{ Request::is('tasks-incomplete') ? 'active' : '' }}"><a href="{{ url('/'.locale()->current() .'/tasks-incomplete') }}"><i class="fa fa-btn fa-square-o" aria-hidden="true"></i> {{ __('app.mainbar.tasklist.incomplete') }}</a></li>
                                    <li class="{{ Request::is('tasks-complete') ? 'active' : '' }}"><a href="{{ url('/'.locale()->current() . '/tasks-complete') }}"><i class="fa fa-btn fa-check-square-o" aria-hidden="true"></i>{{ __('app.mainbar.tasklist.complete') }}</a></li>
                                    <li class="{{ Request::is('tasks/create') ? 'active' : '' }}"><a href="{{ url('/'.locale()->current() .'/tasks/create') }}"><i class="fa fa-btn fa-plus" aria-hidden="true"></i>{{ __('app.mainbar.tasklist.create') }}</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out" aria-hidden="true"></i>{{ __('app.mainbar.logout') }}</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <!-- JavaScripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

        @yield('scripts')

    </body>
</html>