@extends('frontend.layouts.home')

@section('title')
	{{ __('Login') }}
@endsection


@push("styles")
	<link rel="stylesheet" href="{{asset('css/login.css')}}">


@endpush


@section('content')

	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v10.0&appId=1191225694627683&autoLogAppEvents=1" nonce="2HVWR5hK"></script>
	{{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-primary">
                    <div class="card-header bg-primary">{{ __('Login') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                        value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                        name="password" required>

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            @if(config('settings.recaptcha.public_key'))
            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="g-recaptcha" data-sitekey="{{ config('settings.recaptcha.public_key') }}"
                        data-theme="{{ config('settings.theme')=='light-blue' ? 'light' : 'dark' }}"></div>
                </div>
            </div>
            @endif

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </div>

            @social
            <div class="row mt-3">
                <div class="col text-center">
                    <div class="or-seperator"><i>{{ __('or') }}</i></div>
                    <span>{{ __('Log in with') }}</span>
                    <div class="btn-group ml-2">
                        @foreach(array_keys(config('services.login_providers')) as $provider)
                        @social($provider)
                        <a href="{{ url('login/' . $provider) }}" class="btn btn-primary">
                            <i class="{{ config('services.login_providers.' . $provider . '.icon') }} mr-1"></i>
                            {{ ucfirst($provider) }}
                        </a>
                        @break
                        @endsocial
                        @endforeach
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu">
                            @foreach(array_keys(config('services.login_providers')) as $provider)
                            @social($provider)
                            <a href="{{ url('login/' . $provider) }}" class="dropdown-item">
                                <i class="{{ config('services.login_providers.' . $provider . '.icon') }}"></i>
                                {{ ucfirst($provider) }}
                            </a>
                            @endsocial
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endsocial
        </form>
    </div>
    </div>
    </div>
    </div>
    </div> --}}
	{!! NoCaptcha::renderJs() !!}
	<div class="content" style="align-items: unset;" id="reg_form_and_social">
		<div class="for_border_right">
			<h1>{{__("Welcome back")}}!</h1>
			@if ($errors->first() != "")
				<p style="color: rgb(255, 190, 0)">
					<strong>{{ $errors->first() }}</strong>
				</p>
			@endif
			<form action="{{ route('login') }}" method="post" class="registration">
				@csrf
				<label for="email">{{__("E-mail Address")}}
					<input type="email" id="email" name="email" placeholder="example@email.com" required>
					@if ($errors->first() != "")
						<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first() }}</strong>
				</span>
					@endif
				</label>
				<label for="pass">{{__("Password")}}
					<input type="password" id="pass" name="password" required>
					@if ($errors->has('password'))
						<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('password') }}</strong>
				</span>
					@endif
				</label>

				<div style="margin-bottom: 30px;" class="check_captcha">
					{!! NoCaptcha::display() !!}
				</div>

				<button type="submit">{{__("Login")}}</button>
				@if (Route::has('password.request'))
					<div class="password_settings"><a href="{{ route('password.request') }}">{{__("Forgot your password?")}}</a></div>
				@endif

				<div class="password_settings"><a href="{{route('register')}}">{{__("Don't have an account ? Sign up!")}}</a></div>
			</form>
		</div>
		<div class="empty_div_border">
		</div>
		<div class="social_network">
			@if(session()->has("message"))
				<div class="text-center  ml-auto mr-auto mb-2" style="color: rgb(255, 190, 0)">{{session()->get("message")}}	</div>
			@endif
			<a href="{{url('auth/facebook')}}"><img src="assets/img/registration/fb.png" alt="">{{__("Sign up using Facebook")}} </a>
			<a href="{{ url('auth/google') }}"><img src="assets/img/registration/google.png" alt="">{{__("Sign up using Google")}}</a>
		</div>
	</div>
@endsection

@section('js')
	<script src="//ulogin.ru/js/ulogin.js"></script>
@endsection

@if(config('settings.recaptcha.public_key'))
	@push('scripts')
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	@endpush
@endif