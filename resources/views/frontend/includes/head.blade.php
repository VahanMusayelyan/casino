@if(Route::currentRouteName() == 'frontend.index')
    <title>{{ __('Betscoins') }} | {{ __('Bet and win crypto') }}</title>
@else
    <title>{{ __('Betscoins') }} | @yield('title')</title>
@endif
<!-- {{ config('app.version') }} -->
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="{{ __('Betscoins games') }}" />
<meta name="keywords" content="{{ __('crypto,casino,slots,slot machine,betting,gambling') }}" />
<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon.ico') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon.ico') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon.ico') }}">
<link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}">
<meta name="msapplication-TileColor" content="#9f00a7">
<meta name="theme-color" content="#ffffff">
<!-- END Favicon -->

<!--Open Graph tags-->
<meta property="og:url" content="{{ url('/') }}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ __('Betscoins') }}" />
<meta property="og:description" content="{{ __('Casino, where you can bet and get paid in cryptocurrencies.') }}" />
<meta property="og:image" content="{{ File::exists(base_path('public/images/og-image-udf.jpg')) ? asset('images/og-image-udf.jpg') : asset('images/og-image.jpg') }}" />
<!--END Open Graph tags-->
@includeWhen(config('settings.gtm_container_id'), 'frontend.includes.gtm-head')
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;500&display=swap" rel="stylesheet">
<!--<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{your-app-id}',
      cookie     : true,
      xfbml      : true,
      version    : '{api-version}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>-->
@include('frontend.includes.styles')
