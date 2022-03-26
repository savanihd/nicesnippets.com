<title>{{ $meta_title }}</title>

<meta name="description" content="{{ $meta_description }}">
<meta name="keywords" content="{{ $meta_keyword }}">
    
<meta property="og:description" content="{{ $meta_description }}" />
<meta property="og:title" content="{{ $meta_title }}" />
<meta property="og:url" content="{{ URL::current() }}" />
<meta property="og:type" content="articles" />

@if(!empty($meta_image))
<meta property="og:image:url" content="{{ $meta_image }}" />
@endif

<meta name="twitter:title" content="{{ $meta_title }}" />
<meta name="twitter:site" content="{{ URL::current() }}" />
<meta name="twitter:description" content="{{ $meta_description }}" />