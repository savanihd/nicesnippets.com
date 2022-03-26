<!DOCTYPE html>
<html>
<head>
	@include('newTheme.meta')
	<link rel="icon" href="/image/favicon.ico">
  	<link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet">
  	<link href="{{ asset('newTheme/css/live-demo.css') }}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{ asset('newTheme/plugins/jquery/jquery-2.1.4.min.js') }}"></script>
  	<style type="text/css">
      .encode-div textarea, .decode-div textarea{
          height: 350px;
      }
  		.div-center{
	  		width: 30%;
	  		float: left;
	  		text-align: center;
	  		margin-top: 120px;
  		}
  		.div-center button{
  			margin-bottom: 10px;
  			padding: 10px;
  			border: none;
  			color: #fff;
  			width: 150px;
        font-family: 'Ropa Sans', sans-serif;
  		}
      .div-center #encode{
        background: green;
      }
      .div-center #copy-string{
        background: #006495;
      }
      .div-center #decode{
        background: #44B3C2;
      }
  	</style>
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
	    <h1>Online Base64 Encode Decode String Tool</h1><br>
	    <span class="sub-title">online base64 decode string, online base64 encode string, online base64 encode decode, free online base64 encoder decoder, online free tool for convert base64 string, base64 decode online tool, base64 encode online tool <br><br>
      Here, we will give you free online tools for convert base64 encode decode string. So basically it will help to base64 string encode and decode. i added two box for input string, you can see and check demo online. i hope you will use and help you more.</span>
      <div class="encode-div">
        <textarea id="input" class="js-copytextarea1"></textarea>
      </div>
	    <div class="div-center">
	    	<button id="encode" class="btn btn-success">Encode</button><br>
	    	<button id="decode" class="btn btn-success">Decode</button><br>
	    	<button id="copy-string" class="btn btn-success js-textareacopybtn">Copy String</button>
	    </div>
      <div class="decode-div">
        <textarea id="output" class="js-copytextarea"></textarea>
      </div>
  	</section>
    <div class="second-section">
        @include('front.tools.liveAdds')
    </div>
    
  	<script>
    var Base64 = {

        _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

        encode: function(input) {
            var output = "";
            var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
            var i = 0;

            input = Base64._utf8_encode(input);

            while (i < input.length) {

                chr1 = input.charCodeAt(i++);
                chr2 = input.charCodeAt(i++);
                chr3 = input.charCodeAt(i++);

                enc1 = chr1 >> 2;
                enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
                enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
                enc4 = chr3 & 63;

                if (isNaN(chr2)) {
                    enc3 = enc4 = 64;
                } else if (isNaN(chr3)) {
                    enc4 = 64;
                }

                output = output + this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) + this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

            }

            return output;
        },

        decode: function(input) {
            var output = "";
            var chr1, chr2, chr3;
            var enc1, enc2, enc3, enc4;
            var i = 0;

            input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

            while (i < input.length) {

                enc1 = this._keyStr.indexOf(input.charAt(i++));
                enc2 = this._keyStr.indexOf(input.charAt(i++));
                enc3 = this._keyStr.indexOf(input.charAt(i++));
                enc4 = this._keyStr.indexOf(input.charAt(i++));

                chr1 = (enc1 << 2) | (enc2 >> 4);
                chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
                chr3 = ((enc3 & 3) << 6) | enc4;

                output = output + String.fromCharCode(chr1);

                if (enc3 != 64) {
                    output = output + String.fromCharCode(chr2);
                }
                if (enc4 != 64) {
                    output = output + String.fromCharCode(chr3);
                }

            }

            output = Base64._utf8_decode(output);

            return output;

        },

        _utf8_encode: function(string) {
            string = string.replace(/\r\n/g, "\n");
            var utftext = "";

            for (var n = 0; n < string.length; n++) {

                var c = string.charCodeAt(n);

                if (c < 128) {
                    utftext += String.fromCharCode(c);
                }
                else if ((c > 127) && (c < 2048)) {
                    utftext += String.fromCharCode((c >> 6) | 192);
                    utftext += String.fromCharCode((c & 63) | 128);
                }
                else {
                    utftext += String.fromCharCode((c >> 12) | 224);
                    utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                    utftext += String.fromCharCode((c & 63) | 128);
                }

            }

            return utftext;
        },

        _utf8_decode: function(utftext) {
            var string = "";
            var i = 0;
            var c = c1 = c2 = 0;

            while (i < utftext.length) {

                c = utftext.charCodeAt(i);

                if (c < 128) {
                    string += String.fromCharCode(c);
                    i++;
                }
                else if ((c > 191) && (c < 224)) {
                    c2 = utftext.charCodeAt(i + 1);
                    string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                    i += 2;
                }
                else {
                    c2 = utftext.charCodeAt(i + 1);
                    c3 = utftext.charCodeAt(i + 2);
                    string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                    i += 3;
                }

            }

            return string;
        }

    }
        
        
    var encode = document.getElementById('encode'),
        decode = document.getElementById('decode'),
        output = document.getElementById('output'),
        input = document.getElementById('input');

    encode.onclick = function() {
        output.innerHTML = Base64.encode(input.value);
    }
        
    decode.onclick = function() {
        var $str = output.innerHTML;
        output.innerHTML = Base64.decode($str);
    }    

    var copyTextareaBtn = document.querySelector('.js-textareacopybtn');

    copyTextareaBtn.addEventListener('click', function(event) {
      var copyTextarea = document.querySelector('.js-copytextarea');
      copyTextarea.select();

      try {
        var successful = document.execCommand('copy');
        var msg = successful ? 'successful' : 'unsuccessful';
        console.log('Copying text command was ' + msg);
      } catch (err) {
        console.log('Oops, unable to copy');
      }
    });
</script>
  	@include('newTheme.onlineScript')
</body>
</html>
