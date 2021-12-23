@extends('frontend.layouts.home')
{!! NoCaptcha::renderJs() !!}

{{-- @section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card border-primary">
				<div class="card-header bg-primary">{{ __('Register') }}</div>

<div class="card-body">
	<form method="POST" action="{{ route('register') }}">
		@csrf

		<div class="form-group row">
			<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

			<div class="col-md-6">
				<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
					value="{{ old('name') }}" required autofocus>

				@if ($errors->has('name'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
				@endif
			</div>
		</div>

		<div class="form-group row">
			<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

			<div class="col-md-6">
				<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
					value="{{ old('email') }}" required>

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
			<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

			<div class="col-md-6">
				<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
			</div>
		</div>

		<div class="form-group row">
			<input id="is_webmaster" type="checkbox" name="is_webmaster" value="1" />
			<label for="is_webmaster" class="col-md-4 col-form-label text-md-right">{{ __('Webmaster') }}</label>
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
			<div class="col-md-6 offset-md-4">
				<button type="submit" class="btn btn-primary">
					{{ __('Register') }}
				</button>
			</div>
		</div>

		@social
		<div class="row mt-3">
			<div class="col text-center">
				<div class="or-seperator"><i>{{ __('or') }}</i></div>
				<span>{{ __('Sign up with') }}</span>
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
</div>
@endsection

@if(config('settings.recaptcha.public_key'))
@push('scripts')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush
@endif --}}

@push("styles")
<link rel="stylesheet" href="{{asset('css/registration.css')}}">
@endpush
@section('content')
	<style>
		.registration input{
			margin-top: 10px;
		}
		.registration label{
			margin-bottom: 10px;
		}
	</style>

<div class="content" style="align-items: unset;" id="reg_form_and_social">
	<div>
		<h2>{{__("Sign Up. It's free")}}!</h2>
		@if ($errors->first() != "")
			<p style="color: rgb(255, 190, 0)">
				<strong>{{ $errors->first() }}</strong>
			</p>
		@endif
		<form action="{{ route('register') }}" method="post" class="registration" autocomplete="off">
			@csrf
			<label for="name">{{__("Name")}}
				<input type="text" name="name" id="name" placeholder="Michael" required>
				@if ($errors->has('name'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
				@endif
			</label>
			<label for="email">{{__("E-mail Address")}}
				<input type="email" name="email" id="email" placeholder="example@email.com" required>
				@if ($errors->has('email'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
				@endif
			</label>
			<label for="pass">{{__("Password")}}
				<input type="password" name="password" id="pass" required>
				@if ($errors->has('password'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('password') }}</strong>
				</span>
				@endif
			</label>
			<label for="confirmpass">{{__("Confirm Password")}}
				<input type="password" name="password_confirmation" id="confirmpass" required>
			</label>
{{--			<div style="margin-bottom: 15px;" class="check_webmaster">--}}
{{--				<input type="checkbox" id="todo" name="is_webmaster" value="1" value="todo">--}}
{{--				<label for="todo" class="webmaster">{{__("Webmaster")}}</label>--}}
{{--			</div>--}}
			<div style="margin-bottom: 15px;" class="check_captcha">
				{!! NoCaptcha::display() !!}
			</div>
			<button type="submit">
				{{__("Create account")}}
			</button>
		</form>
	</div>
	<div class="empty_div_border"></div>
	<div class="social_network">
		@if(session()->has("message"))
			<div class="text-center  ml-auto mr-auto mb-2" style="color: rgb(255, 190, 0)">{{session()->get("message")}}	</div>
		@endif
			<a href="{{url('auth/facebook')}}"><img src="assets/img/registration/fb.png" alt="">{{__("Sign up using Facebook")}} </a>
			<a href="{{ url('auth/google') }}"><img src="assets/img/registration/google.png" alt="">{{__("Sign up using Google")}}</a>
	</div>
</div>
@endsection