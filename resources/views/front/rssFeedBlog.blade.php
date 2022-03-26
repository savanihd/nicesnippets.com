<?php echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"; ?>

<rss version='2.0' xmlns:media="http://search.yahoo.com/mrss/">
<channel>
<?php
					function cleanS($string) {
   $string = str_replace(' ', '--', $string); // Replaces all spaces with hyphens.

   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   return  str_replace('--', ' ', $string);
}
?>
	<title>Nicesnippets.com</title>
  	<link>{{ URL::to('/') }}</link>
  	<description>Nicesnippets website focuses on all web language and framework tutorial PHP, Laravel, Laravel 6, MySQL, AJAX, jQuery, JavaScript, Demo</description>

	@if(!empty($blogs))
		@foreach($blogs as $key=>$value)
			@if($value->title != '/upload/Google map.png')
			<item>
							<?php
					$p = str_replace('—','',$value->title);
					$p = str_replace('&','',$p);
					$p = str_replace('“','',$p);
					$p = str_replace('”','',$p);
					$p = str_replace('-','',$p);
					$p = str_replace('–','',$p);
					$p= cleanS($p);																		
				?>
				<title>{{ htmlspecialchars($p, ENT_XML1, 'UTF-8') }}</title>
				<link>{{ URL::route('post.detail',$value->slug) }}</link>

				<?php

					$img = URL::to('/').'/image/imgpsh_fullsize.png';

		            if(!empty($value->path)){
		                $img = URL::to('/').$value->path;
		            }

				?>

				<image>
				  <url>{{ $img }}</url>
				  <title>{{ htmlspecialchars($p, ENT_XML1, 'UTF-8') }}</title>
				  <link>{{ $img }}</link>
				</image>
				
				<?php
					$p = str_replace('—','',Str::limit($value->body,300));
					$p = str_replace('&','',$p);
					$p = str_replace('“','',$p);
					$p = str_replace('”','',$p);
					$p = str_replace('-','',$p);
					$p = str_replace('–','',$p);
					$p= cleanS($p);

				?>
				<description>{{ htmlspecialchars($p, ENT_XML1, 'UTF-8') }}</description>
				<author>Admin</author>
				<pubDate>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('M d Y') }}</pubDate>

			</item>
			@endif
		@endforeach
	@endif

</channel>
</rss>