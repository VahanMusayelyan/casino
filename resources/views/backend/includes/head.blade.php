<title>{{ __('Betscoins') }} | @yield('title')</title>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon.ico') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon.ico') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon.ico') }}">
<link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}">
<meta name="msapplication-TileColor" content="#9f00a7">
<meta name="theme-color" content="#ffffff">
<!-- END Favicon -->
@include('backend.includes.styles')