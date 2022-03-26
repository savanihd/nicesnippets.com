<!DOCTYPE html>
<html>
<head>
	@include('newTheme.meta')
	<link rel="icon" href="/image/favicon.ico">
  	<link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-toggle@2.2.2/css/bootstrap-toggle.min.css" integrity="sha256-rDWX6XrmRttWyVBePhmrpHnnZ1EPmM6WQRQl6h0h7J8=" crossorigin="anonymous">
  	<link href="{{ asset('newTheme/css/live-demo.css') }}" rel="stylesheet" type="text/css" />
</head>
<style type="text/css">
	.bg-light {
  		background-color: #f8f9fa!important;
	}
	#length_chars_select {
	  /*width:100px;*/
	}
	.chars_example {
	  font-family:'Courier New', Courier, monospace;
	}
	.password-string {
	  font-weight: bold;
	  height: 45px;
	  background-color: #fff;
	  border-top: 1px solid #96a0ad;
	  border-left: 1px solid #96a0ad;
	  border-right: 1px solid #96a0ad;
	  vertical-align: middle;
	  font-size: 26px;
	  max-width: 820px;
	  text-align: center;
	  margin: 10px auto 0px;
	}
	.password-meter {
	  text-align: center;
	  height: 6px;
	  max-width: 820px;
	  border-left: 1px solid #96a0ad;
	  border-right: 1px solid #96a0ad;
	  margin: 0px auto;
	}
	.password-copy-to-clipboard {
	  text-align: center;
	  max-width: 820px;
	  margin: 0px auto;
	  padding: 5px 0px;
	  background-color: #dee2e6;
	  border-left: 1px solid #96a0ad;
	  border-right: 1px solid #96a0ad;
	  border-bottom: 1px solid #96a0ad;
	}
	.btn-section-part{
		margin-top:-25px;
	}
</style>
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
	    <h1>Online Password Generator Tool</h1>
	    <span class="sub-title">we will give you free to generate secure passwords for Your Social Media Accounts, Computers, WIFI, Server, Website, Mobile App etc within a Click for Free.</span>
  		<div class="check-box">
  			<div id="option_choice">
			<form action="#">
				<div class="row">
					<div class="col-md-12 p-0" style="margin-top:-20px;">
						<div class="my-3 p-3 bg-white rounded box-shadow">
							<p>
								<span lang="en" class="text">password character length</span>
								<input type="number" name="length_chars_select" id="length_chars_select" min="3" max="120" value="10" class="form-control" />
							</p>
							<p>
								<div class="form-group">
									<input type="checkbox" name="alphalower_chars_checkbox" id="alphalower_chars_checkbox" checked="checked" />
									<label lang="en" class="text" for="alphalower_chars_checkbox">string letters [ a b c ... x y z ]</label>
								</div>
							</p>		
							<p>
								<div class="form-group">
									<input type="checkbox"  name="alphaupper_chars_checkbox" id="alphaupper_chars_checkbox" checked="checked" />
									<label lang="en" class="text" for="alphaupper_chars_checkbox">capital letters [ A B C ... X Y Z ]</label>
								</div>
							</p>
							<p>
								<div class="form-group">
									<input type="checkbox"  name="num_chars_checkbox" id="num_chars_checkbox" checked="checked" />
									<label lang="en" class="text" for="num_chars_checkbox">digits [ 0 1 2 ... 7 8 9 ]</label>
								</div>
							</p>	
							<p>
								<div class="form-group">
									<input type="checkbox"  name="hyphen_dash_underscore" id="hyphen_dash_underscore" />
									<label lang="en" class="text" for="hyphen_dash_underscore">hyphen, underscore [ - _ ]</label>
								</div>
							</p>
							<p>
								<div class="form-group">
									<input type="checkbox"  name="special_chars_checkbox" id="special_chars_checkbox" />
									<label lang="en" class="text" for="special_chars_checkbox">special symbols [  ~ ! @ ... &lt; &gt; ? ]</label>
								</div>
							</p>
							<p>
								<div class="form-group">
									<input type="checkbox"  name="ambiguous_chars_checkbox" id="ambiguous_chars_checkbox" />
									<label lang="en" class="text" for="ambiguous_chars_checkbox">ambiguous characters [ i o 0 O I 1 l ]</label>
								</div>
							</p>
						</div>
					</div>
					<div class="col-md-12 btn-section-part text-center">
						<div class="text-center"><button type="button" class="btn btn-default btn-success btn-lg" id="generate" lang="en">Generate Password</button></div>
						<div class="text-center" id="password-container" style="display: none;">
							<div id="password-container-top" class="password-string"></div>
							<div id="password-container-bottom" class="password-meter"></div>
							<div id="click-to-copy" class="password-copy-to-clipboard" lang="en" data-clipboard-target="#password-container-top"><span lang="en">click here to copy to clipboard</span></div>
						</div>
					</div>
				</div>
			</form>
		</div>
  		</div>
  	</section>
  	<div class="second-section">
        @include('front.tools.liveAdds')
    </div>
  	<script type="text/javascript" src="{{ asset('newTheme/plugins/jquery/jquery-2.1.4.min.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js" integrity="sha256-EGs9T1xMHdvM1geM8jPpoo8EZ1V1VRsmcJz8OByENLA=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/zxcvbn@4.4.2/dist/zxcvbn.js" integrity="sha256-9CxlH0BQastrZiSQ8zjdR6WVHTMSA5xKuP5QkEhPNRo=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.1/dist/clipboard.min.js" integrity="sha256-hIvIxeqhGZF+VVeM55k0mJvWpQ6gTkWk3Emc+NmowYA=" crossorigin="anonymous"></script>
  	<script type="text/javascript" src="{{ asset('newTheme/js/live-demo.js') }}"></script>
  	<script type="text/javascript">
			//<![CDATA[
			(function($) {
				$.generateRandomPassword = function(length, AlphaLower, AlphaUpper, Num, HypenDashUnderscore, Special, Ambiguous) {
					length = typeof length !== 'undefined' ? length : 8;
					AlphaLower = typeof AlphaLower !== 'undefined' ? AlphaLower : true;
					AlphaUpper = typeof AlphaUpper !== 'undefined' ? AlphaUpper : true;
					Num = typeof Num !== 'undefined' ? Num : true;
					HypenDashUnderscore = typeof HypenDashUnderscore !== 'undefined' ? HypenDashUnderscore : false;
					Special = typeof Special !== 'undefined' ? Special : false;
					Ambiguous = typeof Ambiguous !== 'undefined' ? Ambiguous : false;
					var password = '';
					var chars = '';
					if (AlphaLower) chars += 'abcdefghjkmnpqrstuvwxyz';
					if (AlphaUpper) chars += 'ABCDEFGHJKLMNPQRSTUVWXYZ';
					if (Num) chars += '23456789';
					if (HypenDashUnderscore) chars += '-_';
					if (Special) chars += '~!@#$%^&*()=+[]{};:,.<>/?';
					if (AlphaLower && Ambiguous) chars += 'iol';
					if (AlphaLower && Ambiguous) chars += 'IO';
					if (Num && Ambiguous) chars += '01';
					if (!AlphaLower && !Num && Ambiguous) chars += 'iolIO01';
					if (chars == '') return window.lang.convert('Please make at least one selection');
					var list = chars.split('');
					var len = list.length, i = 0;
					do {
						i++;
						var index = Math.floor(Math.random() * len);
						password += list[index];
					} while(i < length);
					return password;
				};
			})(jQuery);
			
			$('form').bind('submit', function(e) {
				e.preventDefault();
			});
			
			$(function() {
				$('#generate').click(function(event) {
					var pwd = $.generateRandomPassword(
						$("#length_chars_select").val(),
						$("#alphalower_chars_checkbox").is(":checked"),
						$("#alphaupper_chars_checkbox").is(":checked"),
						$("#num_chars_checkbox").is(":checked"),
						$("#hyphen_dash_underscore").is(":checked"),
						$("#special_chars_checkbox").is(":checked"),
						$("#ambiguous_chars_checkbox").is(":checked")
					);
					var score = zxcvbn(pwd).score;
					switch(score) {
						case 0:
						case 1:
							var color = '#C33';
						break;
						
						case 2:
							var color = '#F80';
						break;
						
						case 3:
							var color = '#FFEC20';
						break;
						
						case 4:
							var color = '#19ba20';
						break;
						
						default:
							var color = '#C33';
					}
					var image = 'img/' + score + '.jpg';
					$('#password-container').show();
					$('#password-container-top').text(pwd);
					$('#password-container-bottom').css('background', color);
					event.preventDefault();
				});
			});
			
			$( '.checkboxlist' ).on( 'click', 'input:checkbox', function () {
				$( this ).parent().toggleClass( 'checked_item', this.checked ); 
				$( this ).parent().toggleClass( 'unchecked_item' ); 
			});
			
			/*
			var lang = new Lang();
			lang.dynamic('fr', 'langpack/fr.json');
			lang.init({
				defaultLang: 'en'
			});
			*/
			
			$('#alphalower_chars_checkbox').click( function() {
				$(this).addClass('active').siblings().removeClass('active');
			});
			
			// Tooltip
			$('#click-to-copy').tooltip({
				trigger: 'click',
				placement: 'bottom'
			});
			function setTooltip(btn, message) {
				$(btn).tooltip('hide')
				.attr('data-original-title', message)
				.tooltip('show');
			}
			function hideTooltip(btn) {
				setTimeout(function() {
					$(btn).tooltip('hide');
				}, 1000);
			}

			// Clipboard
			var clipboard = new ClipboardJS('#click-to-copy');
			clipboard.on('success', function(e) {
				setTooltip(e.trigger, 'Copied!');
				hideTooltip(e.trigger);
			});
			clipboard.on('error', function(e) {
				setTooltip(e.trigger, 'Failed!');
				hideTooltip(e.trigger);
			});
			//]]>
		</script>
		<!-- Matomo -->
		<script type="text/javascript">
		  var _paq = _paq || [];
		  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
		  _paq.push(['trackPageView']);
		  _paq.push(['enableLinkTracking']);
		  (function() {
			var u="https://analytics.clicface.com/";
			_paq.push(['setTrackerUrl', u+'piwik.php']);
			_paq.push(['setSiteId', '25']);
			var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
			g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
		  })();
		</script>
  	@include('newTheme.onlineScript')
</body>
</html>
