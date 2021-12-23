{{-- <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('frontend.includes.head')
</head>
<body class="{{ str_replace('.','-',Route::currentRouteName()) }} theme-{{ config('settings.theme') }}">
	<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1191225694627683',
      cookie     : true,
      xfbml      : true,
      version    : 'v10.0'
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
</script>
	
    @includeWhen(config('settings.gtm_container_id'), 'frontend.includes.gtm-body')

    <div id="app">

        @yield('content')

        @includeFirst(['frontend.includes.footer-udf','frontend.includes.footer'])

    </div>

    @include('frontend.includes.scripts')

</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
  @include('frontend.includes.head')
  @stack('styles')
</head>
<body>
  @include('frontend.includes.header')

  @yield('content')
  @yield('js')
  @include('frontend.includes.footer')
</body>
</html>