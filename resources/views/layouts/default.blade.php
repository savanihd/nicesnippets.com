<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="/image/favicon.ico">
    <link rel="stylesheet" href="{{ asset('/front/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="a3VisJ_ZJdwMnP0PU2VGuLEjdQbUdBYaeo7JfdfJckg" />
    @include('layouts.meta')

    <!-- Bootstrap Core CSS -->
    <link href="/front/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/front/css/3-col-portfolio.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('/front/css/custom.css')}}">
    <!-- jQuery -->
    <script src="/front/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/front/js/bootstrap.min.js"></script>

    <script src="//connect.facebook.net/en_EN/sdk.js#xfbml=1&amp;version=v2.5"></script>


</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container menubar">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}" style="font-weight: bold;font-size: 24px"><img src="/image/imgpsh_fullsize.png">NiceSnippets.com</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav text-left menu">
                    <!-- <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li> -->
                    <li>
                        <a href="{{ route('taglist') }}" class="tag"><i class="fa fa-tags" aria-hidden="true"></i> TAGS</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Page Content -->
    <div class="container">
        @yield('content')
    </div>
        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 footer-left">
                        <p class="" style="margin-top:200px;">Copyright &copy; {{ date('Y') }} All Rights Reserved • www.NiceSnippets.com</p>
                    </div>
                    <div class="col-md-4 footer-right">
                        <p>Connect with us on Facebook</p>
                        <div class="fb-page"
                          data-href="https://www.facebook.com/Nicesnippets-277818909364639/"
                          data-width="340"
                          data-hide-cover="false"
                          data-show-facepile="true">
                      </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </footer>
    <!-- /.container -->
    <script src="//t1.extreme-dm.com/f.js" id="eXF-nicesnip-0" async defer></script>
</body>
</html>
