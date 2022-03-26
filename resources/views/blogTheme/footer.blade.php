<footer id="footer">
  <div class="container footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4 listing-style">
        <!-- Latest Blog Post -->
        <h4 class="letter-spacing-1 latest-post-heading">TOOLS</h4>
        <ul>
          <li><a href="/forums" target="_blank" class="">Ask Your Question</a></li>
          <li><a href="{{ route('tools-online-editor') }}" target="_blank" class="">Online Editor Of HTML CSS JS</a></li>
          <li><a href="{{ route('tools-online-counter') }}" target="_blank">Online Character Counter Tool</a></li>
          <li><a href="{{ route('tools-online-convert-case') }}" target="_blank">Online Convert Case</a></li>
          <li><a href="{{ route('tools-online-encode-decode-string') }}" target="_blank">Online Encode Decode String</a></li>
          <li><a href="/free-tutorials" target="_blank">Free Tutorials</a></li>
          <li><a href="{{ route('social.network') }}" target="_blank">Connect With Us</a></li>
        </ul>
<!--         <a href="{{ route('tools-online-editor') }}" target="_blank" class="btn btn-primary peach-gradient btn-rounded tools-btn"><h4 class="letter-spacing-1 online-editor">Online Editor</h4></a><br>

        <a href="{{ route('tools-online-counter') }}" target="_blank" class="btn btn-info tools-btn-counter"><h4 class="letter-spacing-1 online-counter">Online Counter</h4></a><br>
        
        <a href="{{ route('tools-online-convert-case') }}" class="btn btn-amber tools-btn-convert" target="_blank"><h4 class="letter-spacing-1 online-counter">Online Convert Case</h4></a>

        <a href="{{ route('tools-online-encode-decode-string') }}" class="btn btn-danger tools-btn-convert" target="_blank"><h4 class="letter-spacing-1 online-counter">Online Encode Decode String</h4></a> -->
      </div>

      <div class="col-md-4 listing-style">
        <h4 class="letter-spacing-1 latest-post-heading">Subscribe Your Email Address</h4>
        <div class="row">
          <form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open(‘https://feedburner.google.com/fb/a/mailverify?uri=Nicesnippets, ‘popupwindow’, ‘scrollbars=yes,width=550,height=520’);return true">
              <div class="col-md-12">
                <div class="input-group margin-bottom-20">
                    <input type="hidden" value="Nicesnippets" name="uri"/>
                    <input type="hidden" name="loc" value="en_US"/>
                    <input type="text" name="email" class="form-control" placeholder="Enter Your Email">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-danger subscribe-btn">Subscribe</button>
                    </span>
                </div>
              </div>
          </form>
        </div>
        <h4 class="letter-spacing-1 footer-pages-div latest-post-heading">Pages</h4>
          <ul>
            <li><a href="/forums" target="_blank">Forum</a></li>
            <li><a href="/free-tutorials" target="_blank">Tutorials</a></li>
            <li><a href="{{ route('social.network') }}">Social</a></li>
            <li><a href="{{ url('/tags') }}">Tags</a></li>
            <li><a href="{{ route('tag.pages','bootstrap-4') }}">Bootstrap 4</a></li>
          </ul>
      </div>
      <div class="col-md-4">        
        <h4 class="letter-spacing-1 latest-post-heading">Connect with us on Facebook</h4>
            <div id="fb-root"></div> 
            <script>
              (function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12&appId=1023676864409708&autoLogAppEvents=1'; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));
            </script>
            <div class="fb-page" data-height="350" data-width="400" data-href="https://www.facebook.com/NiceSnippets-593421841011199" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/NiceSnippets-593421841011199" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/NiceSnippets-593421841011199">NiceSnippets</a></blockquote></div>
      </div>

      <!-- <div class="col-md-4">
        <h4 class="letter-spacing-1">Connect with us on Twitter</h4>
          <a class="twitter-timeline" data-height="350" href="https://twitter.com/VimalKashiyani">Tweets by TwitterDev</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div> -->
    </div>
  </div>
  <div class="copyright margin-top-30">
    <div class="container">
      <ul class="pull-right nomargin list-inline mobile-block">
        <li><a href="#">Terms &amp; Conditions</a></li>
        <li>&bull;</li>
        <li><a href="#">Privacy</a></li>
      </ul>
      Copyright &copy; {{ date('Y') }} All Rights Reserved • <a href="http://nicesnippets.com" target="_blank" class="link">www.NiceSnippets.com</a> • Developed By <a href="http://www.aatmaninfotech.com" target="_blank" class="link">Aatman infotech</a>
    </div>
  </div>
</footer>