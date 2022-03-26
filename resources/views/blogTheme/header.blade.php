<div id="header" class="sticky clearfix">

	<!-- TOP NAV -->
	<header id="topNav">
		<div class="container">

			<!-- Logo -->
			<a class="logo pull-left" href="{{ url('/') }}">
				<img src="{{ asset('/image/imgpsh_fullsize.png') }}" alt="nicesnippets" />
				NiceSnippets.com
			</a>

			<!-- 
				Top Nav 
				
				AVAILABLE CLASSES:
				submenu-dark = dark sub menu
			-->
			<div class="navbar-collapse pull-right nav-main-collapse collapse submenu-dark">
				<nav class="nav-main">
					<ul id="topMain" class="nav nav-pills nav-main">
						<li class="dropdown goog-search"><!-- PAGES -->
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
						</li>
						<li class="dropdown"><!-- HOME -->
							<a href="{{ url('/') }}">
								HOME
							</a>
						</li>
						<!-- <li class="dropdown">
							<a href="/forums">
								FORUM
							</a>
						</li> -->
						<li class="dropdown">
							<a href="/forums" target="_blank">
								FORUM
							</a>
						</li>
						<li class="dropdown">
							<a href="/free-tutorials" target="_blank">
								TUTORIALS
							</a>
						</li>
						<li class="dropdown"><!-- PAGES -->
							<a href="{{ url('/tagslist') }}">
								TAGS
							</a>
						</li>
						<li class="dropdown"><!-- PAGES -->
							<a href="{{ route('tag.pages','bootstrap-4') }}" target="_blank">
								BOOTSTRAP 4
							</a>
						</li>
						<li class="dropdown"><!-- PAGES -->
							<a href="{{ route('blogs.index') }}" target="_blank">
								BLOG
							</a>
						</li>
					</ul>
				</nav>
			</div>

		</div>
	</header>
</div>