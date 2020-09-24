<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Parky Rabbit') }}</title>


    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config(' ', 'Perky Rabbit') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
{{--                    <li>--}}
{{--                        <a href="{{route('customer.view')}}"><i class="fa fa-users" aria-hidden="true"></i> Customer</a>--}}
{{--                    </li>&nbsp;--}}
{{--                    <li>--}}
{{--                        <a href="{{route('product.view')}}"><i class="fa fa-dropbox" aria-hidden="true"></i> Product</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{route('category.view')}}"><i class="fa fa-list" aria-hidden="true"></i> Category</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{route('proposal.create')}}"><i class="fa fa-briefcase" aria-hidden="true"></i>--}}
{{--                            Proposal</a>--}}
{{--                    </li>--}}
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        {{--                            <li><a href="{{ route('register') }}">Register</a></li>--}}
                    @else


                        <li>
                            <a href="{{route('customer.view')}}"><i class="fa fa-users" aria-hidden="true"></i> Customer</a>
                        </li>&nbsp;
                        <li>
                            <a href="{{route('product.view')}}"><i class="fa fa-dropbox" aria-hidden="true"></i> Product</a>
                        </li>
                        <li>
                            <a href="{{route('category.view')}}"><i class="fa fa-list" aria-hidden="true"></i> Category</a>
                        </li>
                        <li>
                            <a href="{{route('proposal.create')}}"><i class="fa fa-briefcase" aria-hidden="true"></i>
                                Proposal</a>
                        </li>



                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>

<!-- Scripts -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<script>
    $('#flash-overlay-modal').modal();
</script>
@yield('js')
</body>
</html>
