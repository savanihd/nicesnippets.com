<!DOCTYPE html>
<html>
<head>
  @include('newTheme.meta')
  <link rel="icon" href="/image/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet">
    <link href="{{ asset('newTheme/css/live-demo.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('newTheme/css/convertCase.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>
<body>
  <div class="top-add-section">
    {{--<div class="top-add-section-left">
      {!! $settingsFrontData['demo-top-left-add'] !!}
    </div>--}}
    <div class="top-add-section-middal">
      <a href="{{ url('/') }}">
        <img src="/image/nicesnippets.png">
      </a>
    </div>
    {{--<div class="top-add-section-right">
      {!! $settingsFrontData['demo-top-right-add'] !!}
    </div>--}}
  </div>
  <div class="left-add">
    <center>{!! $settingsFrontData['demo-left-add'] !!}</center>
  </div>
  <div class="right-add">
    <center>{!! $settingsFrontData['demo-right-add'] !!}</center>
  </div>
    <section>
      <h1>Online Convert Lowercase, Uppercase, Capitalized, Sentence case & Title case</h1><br>
      <span class="sub-title">Here, NiceSnippets.com provide a tool to convert a string to lowercase, uppercase, capitalized, sentence case or title case. you can convert your string very easily using this free online tool. we almost require to convert lowercase to uppercase and uppercase to lowercase a string or paragraph. So let use!!!</span>
      <p class="desc-p">
      </p>
      <textarea id="content" placeholder="Write Your Content...." class="convert-case"></textarea>
      <div class="actions">
        <button id="sentence" class="btn">Sentence Case</button> 
        <button id="lower" class="btn">Lower Case</button> 
        <button id="upper" class="btn">Upper Case</button> 
        <button id="capitalized" class="btn">Capitalized Case</button> 
        <button id="alternating" class="btn">aLtErNaTiNg cAsE</button> 
        <button id="title" class="btn">Title Case</button> 
        <button id="inverse" class="btn">InVeRsE CaSe</button> 
        <button id="download" class="btn" style="display: inline-block;">Download Text</button> 
        <button id="copy" class="btn" data-clipboard-target="#content">Copy to Clipboard</button>
      </div>
    </section>
    <div class="second-section">
        @include('front.tools.liveAdds')
    </div>

    <script>window.jQuery||document.write('<script src="/js/jquery-3.1.1.min.js"><script>')</script>
    <script>var copied="Text copied to clipboard!",manual_copy="Press Ctrl+C to copy text",downloaded="Text downloaded!",no_text="Please enter some text first!",file_name="convertcase-net.txt"</script>
    
    <script src="https://www.google-analytics.com/analytics.js"></script>
    <script src="https://www.googletagservices.com/tag/js/gpt.js"></script>
    <script src="https://pagead2.googlesyndication.com/pagead/js/r20180423/r20180425/osd.js"></script>
    <script src="https://securepubads.g.doubleclick.net/gpt/pubads_impl_rendering_199.js"></script>
    <script src="https://pagead2.googlesyndication.com/pub-config/r20160913/ca-pub-1701743848159343.js"></script>
    <script src="https://www.google-analytics.com/analytics.js"></script>
    <script src="https://convertcase.net/js/app.min.js"></script>

  	@include('newTheme.onlineScript')
</body>
</html> 