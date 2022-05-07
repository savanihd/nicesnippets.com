<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="a3VisJ_ZJdwMnP0PU2VGuLEjdQbUdBYaeo7JfdfJckg" />
<meta name="msvalidate.01" content="DBF95CC399808A1E00BA09DF2D07164E" />
<title>{{ $meta_title }}</title>
<meta name="description" content="{{ $meta_description }}">
<meta name="keywords" content="{{ $meta_keyword }}">
<meta name="theme-color" content="#398B8A"/>
@if(!empty($meta_image))
<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:image" content="{{ $meta_image }}" />
<meta property="og:image:url" content="{{ $meta_image }}" />
<meta property="data-caption" content="{{ $meta_image }}" />
@endif
<link rel="icon" href="{{ asset('/image/nice-logo-t.ico') }}" type="image/gif" sizes="16x16">
<meta property="og:description" content="{{ $meta_description }}" />
<meta property="og:title" content="{{ $meta_title }}" />
<meta property="og:url" content="{{ URL::current() }}" />
<meta property="og:type" content="article" />
<meta name="twitter:title" content="{{ $meta_title }}" />
<meta name="twitter:site" content="{{ URL::current() }}" />
<meta name="twitter:description" content="{{ $meta_description }}" />
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('newFTheme/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('newFTheme/css/shop-homepage.css') }}" rel="stylesheet">
<link href="{{ asset('newFTheme/css/custom.css') }}" rel="stylesheet">
@yield('style')
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-5716626356528112",
          enable_page_level_ads: true
     });
</script>
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  window.OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "fddcf79a-7ab0-4769-9e9a-21b4b2aad24c",
      safari_web_id: "web.onesignal.auto.364542e4-0165-4e49-b6eb-0136f3f4eaa9",
      notifyButton: {
        enable: true,
        position: "bottom-left"
      },
      promptOptions: {
        slidedown: {
          prompts: [
            {
              type: "push", // current types are "push" & "category"
              autoPrompt: true,
              text: {
                /* limited to 90 characters */
                actionMessage: "Subscribe US!, We will notify you on New Post.",
                /* acceptButton limited to 15 characters */
                acceptButton: "Allow",
                /* cancelButton limited to 15 characters */
                cancelButton: "Cancel"
              },
              delay: {
                pageViews: 1,
                timeDelay: 20
              }
            }
          ]
        }
      }
    });
  });
</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@200&display=swap" rel="stylesheet">
<style type="text/css">
  body, label, input{
    font-family: 'Crimson Pro', serif !important;
  }
</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
<style type="text/css">
  h1, h3, h5, .content-part h2 {
    font-family: 'Lilita One', cursive !important;
    font-weight: normal !important;
  }
  .main-section h1{
    font-size: 40px !important;
  }
</style>
</head>
<body>
    <div class="container-fluid">
      <div class="blog-heder-part">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <a class="navbar-brand" href="{{ route('home') }}">
              <img src="{{ asset('/image/nice-logo.png') }}" alt="NiceSnippets.com">
            </a>
          </div>
          <div class="col-lg-4 p-1">
            <div class="search-box-google">
               <script>
                      (function() {
                        var cx = '004794909148477167645:jiygg9zjfvy';
                        var gcse = document.createElement('script');
                        gcse.type = 'text/javascript';
                        gcse.async = true;
                        gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                        var s = document.getElementsByTagName('script')[0];
                        s.parentNode.insertBefore(gcse, s);
                      })();
                </script>
                <gcse:search></gcse:search>
             </div>
          </div>
        </div>
       </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-md p-0 navbar-dark bg-dark">
    <div class="container">
      <div class="nav-right">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('home') }}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{ route('blog.cat','laravel-9') }}" rel="noreferrer" target="_blank" class="nav-link">Laravel 9</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('blog.cat','react-native') }}" rel="noreferrer" target="_blank" class="nav-link">React Native</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('blog.cat','php') }}" rel="noreferrer" target="_blank" class="nav-link">PHP</a>
          </li>
          </li>
             <li class="nav-item">
            <a href="{{ route('blog.cat','jquery') }}" rel="noreferrer" target="_blank" class="nav-link">Jquery</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('blog.cat','jqury-ui') }}" rel="noreferrer" target="_blank" class="nav-link">Jqury UI</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('blog.cat','vuejs') }}" rel="noreferrer" target="_blank" class="nav-link">Vue JS</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('blog.cat','reactjs') }}" rel="noreferrer" target="_blank" class="nav-link">React JS</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('categories.index') }}" rel="noreferrer" target="_blank" class="nav-link">Category</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container main-section">
    <div class="row">
      <div class="col-lg-8">
        @yield('heading')
        <div class="content-part">
          <div class="row">
          @yield('content')

          {{-- <script type="text/javascript" src="//services.vlitag.com/adv1/?q=800ea5925dfc7c3a4aca0c649b41d8c3"></script><script> var vitag = vitag || {};</script>
            <div class="adsbyvli" data-ad-slot="outstream"></div> <script> vitag.outStreamConfig = { type: "slider", position: "right" }; </script> --}}

          </div>    
        </div>    
      </div>
      <div class="col-lg-4">
        <div class="right-sidebar">
            {{--
            <div class="row content-box advertisement-box">
              <div class="col-md-12 hed-text ribbon-top">
                  <h3>Advertisement</h3>
              </div>
              <div class="col-md-12 hed-sub-text">
                <div id="ezoic-pub-ad-placeholder-101">
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Sidebar fixed -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:360px;height:280px"
                     data-ad-client="ca-pub-5716626356528112"
                     data-ad-slot="2756925041"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                </div>
              </div>
            </div>
            --}}

            {{-- <div class="adsbyvli" style="width:300px; height:250px" data-ad-slot="vi_2190293150"></div> <script>(vitag.Init = window.vitag.Init || []).push(function () { viAPItag.display("vi_2190293150") })</script>               --}}

            <div class="row content-box-new latest-posts">
                <div class="col-md-12 hed-text ribbon-top latest-posts-ribbon">
                    <h3>Latest Posts</h3>
                </div>
                <div class="col-md-12 hed-sub-text random-posts-section">
                  <ul>
                    @foreach($latestBlogLimit as $key => $value)
                      <li class="rendomeBlogList"><a href="{{ route('blog.detail',$value->slug) }}" target="_blank"><i class="fa fa-caret-right" aria-hidden="true"></i> {{ $value->title }}</a></li>
                    @endforeach()
                  </ul>
                </div>
            </div>

            <div class="row content-box category-box">
                <div class="col-md-12 hed-text ribbon-top">
                    <h3>Category</h3>
                </div>
                <div class="col-md-12 hed-sub-text category-part">
                  <ul class="fa-ul tags">
                    @foreach($latestCategory as $key => $value)
                      <li><span class="fa-li"></span><a href="{{ route('blog.cat',$value->slug) }}" target="_blank" class="tag">{{ $value->name }}</a></li>
                    @endforeach()
                  </ul>
                </div>
            </div>

            <div class="row content-box tool-box">
                <div class="col-md-12 hed-text ribbon-top">
                    <h3>Tools</h3>
                </div>
                <div class="col-md-12 hed-sub-text">
                  <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa fa-hand-o-right"></i></span><a href="{{ route('tools-online-generate-password') }}" target="_blank">Online Password Generator Tool</a></li>
                    <li><span class="fa-li"><i class="fa fa-hand-o-right"></i></span><a href="{{ route('tools-online-editor') }}" target="_blank" class="">Online HTML CSS JS Editor</a></li>
                    <li><span class="fa-li"><i class="fa fa-hand-o-right"></i></span><a href="{{ route('tools-online-counter') }}" target="_blank">Online Character Counter Tool</a></li>
                    <li><span class="fa-li"><i class="fa fa-hand-o-right"></i></span><a href="{{ route('tools-online-convert-case') }}" target="_blank">Online Case Convert</a></li>
                    <li><span class="fa-li"><i class="fa fa-hand-o-right"></i></span><a href="{{ route('tools-online-encode-decode-string') }}" target="_blank">Online Encode Decode String</a></li>
                  </ul>
                </div>
            </div>

            <div class="row content-box-new random-posts">
                <div class="col-md-12 hed-text ribbon-top random-posts-ribbon">
                    <h3>Random Posts</h3>
                </div>
                <div class="col-md-12 hed-sub-text random-posts-section">
                  <ul>
                    @foreach($randomPostSidebar as $key => $value)
                      <li class="rendomeBlogList"><a href="{{ route('blog.detail',$value->slug) }}" target="_blank"><i class="fa fa-caret-right" aria-hidden="true"></i> {{ $value->title }}</a></li>
                    @endforeach()
                  </ul>
                </div>
            </div>

        </div>
      </div>
    </div>
  </div>
  
  <footer class="py-4 footer">
    <div class="container">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6 offset-3">
          <!-- Begin Mailchimp Signup Form -->
          <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
          <style type="text/css">
            #mc_embed_signup{background:#008B8B;border-radius: 5px; clear:left; font:14px Helvetica,Arial,sans-serif; width:100%;}
            /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
               We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
          </style>
          <div id="mc_embed_signup">
          <form action="https://nicesnippets.us1.list-manage.com/subscribe/post?u=95d328b89afb77a645e4de5cb&amp;id=db4147b558" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
              <div id="mc_embed_signup_scroll">
            <label for="mce-EMAIL" class="text-white"> Subscribe Your Email address:</label>
            <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Email Address" required>
              <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
              <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_95d328b89afb77a645e4de5cb_db4147b558" tabindex="-1" value=""></div>
              <div class="clear"><input type="submit" value="Subscribe" name=" subscribe" id="mc-embedded-subscribe" class="button btn-submit-sub"></div>
              </div>
          </form>
          </div>
        <!--End mc_embed_signup-->
        </div>
        <div class="col-md-12 text-center mt-3">
          <ul class="page-link-ul" >
            <li>
              <a href="{{ route('disclaimer.index') }}" class="text-white">Disclaimer</a>
            </li>
            <li>
              <a href="{{ route('privacy.policy.index') }}" class="text-white">Privacy Policy</a>
            </li>
          </ul>
        </div>
      </div>

    </div>
    <div class="col-md-12">
        <p class="m-0 text-center text-white"> Copyright &copy; {{ date('Y') }}</p>
    </div>
    </div>
    <!-- /.container -->
  </footer>
  <script src="{{ asset('newFTheme/vendor/jquery/jquery.min.js') }}"></script>

  <script type="text/javascript">
   function reloadMe() {
   location.reload(true);
      }

      function getInterval(){
          var lowerBound =560;
          var upperBound =660;
         
          var randNum = Math.floor((upperBound-lowerBound+1)*Math.random()+lowerBound) * 1000;
          return randNum; 
      }
      var interval = getInterval();

      var srcInterval = setInterval("reloadMe()",interval);

    </script>

  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b751dbd74890745"></script>
  <script src="//t1.extreme-dm.com/f.js" id="eXF-nicesnip-0" async defer></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118362679-1"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-118362679-1');

</script>

<script>(vitag.Init = window.vitag.Init || []).push(function () { viAPItag.display("vi_2190293151") })</script>

  @yield('script')
</body>

</html>
