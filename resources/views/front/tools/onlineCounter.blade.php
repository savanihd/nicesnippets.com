<!DOCTYPE html>
<html>
<head>
	@include('newTheme.meta')
	<link rel="icon" href="/image/favicon.ico">
  	<link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet">
  	<link rel="stylesheet" href="http://live24u.com/tools/counter/style.css">
  	<link href="{{ asset('newTheme/css/live-demo.css') }}" rel="stylesheet" type="text/css" />
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
	    <h1>Online Character, Letter, Word, Space & Paragraph Count Tool</h1><br>
	    <span class="sub-title">in this web page, we will give you tools for character counter, letter counter, word with spaces counter, word without spaces counter tools page. here i give you simple text area for write content and see counter.</span>
	    <p class="desc-p">
	    </p>
        <textarea autofocus id="countableArea" placeholder="Start entering some text here" class="text-area-box">Try it out yourself, Countable is enabled on this textarea. Just start typing.... </textarea>
  		<div class="result chr-cou-part">
          <div class="grid">
            <div class="col med-col-1-2">
              <div class="result-item">
                <strong>Paragraphs: </strong><span class="result-count badge" id="result__paragraphs">1</span>
              </div>
            </div>
            <div class="col med-col-1-2">
              <div class="result-item">
                <strong>Words: </strong><span class="result-count badge" id="result__words">13</span>
              </div>
            </div>
            <div class="col med-col-1-2">
              <div class="result-item">
                <strong>Characters: </strong><span class="result-count badge" id="result__characters">69</span>
              </div>
            </div>
            <div class="col med-col-1-2">
              <div class="result-item">
                <strong>Characters (with spaces): </strong><span class="result-count badge" id="result__all">82</span>
              </div>
            </div>
          </div>
        </div>
  	</section>
    <div class="second-section">
        @include('front.tools.liveAdds')
    </div>

  	<script type="text/javascript" src="{{ asset('newTheme/plugins/jquery/jquery-2.1.4.min.js') }}"></script>
  	<script type="text/javascript">
  		sessionStorage["html"] = $("#html").html();
  		sessionStorage["css"] = $("#css").html();
  		sessionStorage["js"] = $("#js").html();
  		console.log(sessionStorage);
  	</script>
  	<script type="text/javascript" src="{{ asset('newTheme/js/live-demo.js') }}"></script>
  	<script async="" src="https://www.google-analytics.com/analytics.js"></script>
  	<script type="text/javascript">
  		$('.full-screen').click(function(){
  			$('textarea').toggle();
  			$('iframe').toggleClass('full-screen-height');

  			if($(this).text() == "Full Screen"){	
		       	$(this).text("Min Screen")
  			}else{
		       	$(this).text("Full Screen");
		    }   	
  		});
  	</script>
    <script>
      var area = document.getElementById('countableArea'),
          results = {
            paragraphs: document.getElementById('result__paragraphs'),
            words: document.getElementById('result__words'),
            characters: document.getElementById('result__characters'),
            all: document.getElementById('result__all')
          }

      new Countable(area, function (counter) {
        if ('textContent' in document.body) {
          results.paragraphs.textContent = counter.paragraphs
          results.words.textContent = counter.words
          results.characters.textContent = counter.characters
          results.all.textContent = counter.all
        } else {
          results.paragraphs.innerText = counter.paragraphs
          results.words.innerText = counter.words
          results.characters.innerText = counter.characters
          results.all.textContent = counter.all
        }
      })
    </script>
    
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
  	@include('newTheme.onlineScript')
</body>
</html>
