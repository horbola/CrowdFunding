<div>
    <meta name="twitter:title" content="{{ $campaign->title }}">
    <meta name="twitter:description" content="{{ $campaign->short_description }}">
    <meta name="twitter:image" content="{{ $campaign->feature_image }}">
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="Oporajoy Crowd Funding">
    <meta name="twitter:creator" content="@author_handle">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $campaign->title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="{{ $campaign->short_description }}" />
    <meta property="og:image" content="{{ $campaign->feature_image }}" />
    <meta property="og:site_name" content="Oporajoy Crowd Funding" />
    <meta property="og:url" content="{{ URL::current() }}" />
    <!--<meta property="fb:app_id" content="">-->
</div>




