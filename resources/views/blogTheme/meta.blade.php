<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="a3VisJ_ZJdwMnP0PU2VGuLEjdQbUdBYaeo7JfdfJckg" />
<meta name="msvalidate.01" content="DBF95CC399808A1E00BA09DF2D07164E" />
<title>{{ $meta_title }}</title>
<meta name="description" content="{{ $meta_description }}">
<meta name="keywords" content="{{ $meta_keyword }}">
@if(!empty($meta_image))
<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:image" content="{{ $meta_image }}" />
<meta property="og:image:url" content="{{ $meta_image }}" />
<meta property="data-caption" content="{{ $meta_image }}" />
@endif
<meta property="og:description" content="{{ $meta_description }}" />
<meta property="og:title" content="{{ $meta_title }}" />
<meta property="og:url" content="{{ URL::current() }}" />
<meta property="og:type" content="article" />
<meta name="twitter:title" content="{{ $meta_title }}" />
<meta name="twitter:site" content="{{ URL::current() }}" />
<meta name="twitter:description" content="{{ $meta_description }}" />

