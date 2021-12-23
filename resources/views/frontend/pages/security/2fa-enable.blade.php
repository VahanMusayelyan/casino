@extends('frontend.layouts.main')

@section('title')
    {{ __('Enable two-factor authentication') }}
@endsection

@section('content')
    <style>
        #content{
            background-color: transparent!important;;
        }
        .sec_urity,.sec_urity:hover,.sec_urity:active,.sec_urity:focus{
            background-color:#538c31!important;
            border: none;
            outline: none;
            box-shadow: none!important;
        }
    </style>
    <p>{{ __('Open Google Authenticator app on your mobile phone.') }}</p>
    <p>{{ __('Scan the below QR code with the authenticator app.') }}</p>
    <p>{{ __('After that input the one-time password that you see on the screen to complete the process.') }}</p>
    <div class="my-3">
        {!! $qr !!}
    </div>
    <form method="POST" action="{{ route('frontend.security.2fa.enable') }}">
        @csrf
        <input type="hidden" name="secret" value="{{ old('secret', $secret) }}">
        <div class="form-group">
            <label>{{ __('One-time password') }}</label>
            <input type="text" name="totp" class="form-control" required autofocus>
            <small>{{ __('Input one-time password that you currently see in the Google Authenticator app.') }}</small>
        </div>
        <button type="submit" class="btn btn-primary sec_urity">{{ __('Complete') }}</button>
    </form>
@endsection