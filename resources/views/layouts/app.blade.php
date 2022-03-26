<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $routeName = Request::route()->getName();
        $t = "Nicesnippets.com - Forum";
        $d = "you can ask any question related to php, laravel framework, codeigniter, angularjs, vuejs, ajax, jquery, html, apis, web security, composer packages, also other general that you want to ask. we will try to give answerer as soon as possible.";
        if($routeName == 'chatter.discussion.showInCategory'){
            $t = $discussion->title;
            $string = preg_replace("/\s|&nbsp;/",' ',strip_tags($posts->first()->body));
            $d = Str::limit($string, 180);
        }
    @endphp

    <title>{{ $t }}</title>
    <meta name="description" content="{{ $d }}">
    <meta name="keywords" content="{{ $d }}">

    <!-- Styles -->
    <link href="{{ asset('forum/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prism.css') }}" rel="stylesheet">
    @yield('css')

    <?php 

    $settingsFrontData = \App\Models\FrontSettings::pluck('value','type')->all();

    echo $settingsFrontData['head-tag'];

    ?>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style type="text/css">
        .navbar-brand img {
            width: 240px;
            display: inline;
        }
        .navbar-inverse {
            background-color: #272727;
        }
        .navbar-brand{
            padding-top: 13px;
            font-weight: bold;
            color: white !important;
            font-size: 25px;
        }
        .btn-primary{
            background: rgb(46, 204, 113) !important;
            color: white !important;
        }
        .rand-h3{
            background: #263238;
            color: white;
            padding: 15px;
            text-align: center;
        }
        .rand-ul li{
            padding-bottom: 12px;
            font-size: 16px;
        }
        #eXTReMe-Free-nicesnip{
            display: none;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top navbar-inverse">
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
                        NiceSnippets.com
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('login') }}">Login</a></li>
                            <li><a href="{{ url('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
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

        <div class="container">
            <h3 class="rand-h3">* You May Also Like Bellow Issue to check *</h3>
            {!! $settingsFrontData['detail-add'] !!}
        </div>

    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="{{ asset('js/prism.js') }}"></script>
    @yield('js')
    @include('newTheme.onlineScript')

</body>
</html>
