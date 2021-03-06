@extends('frontend.layouts.main')

@section('title')
    {{ __('Game') }} {{ $game->id }} :: {{ __('Provably fair verification') }}
@endsection

@section('content')
    <style>
        #content {
            background-color: unset!important;
        }
    </style>
    <div class="form-group">
        <label>{{ __('Server secret') }}</label>
        <input type="text" class="form-control text-muted" value="{{ $game->secret }}" readonly>
        <small>{{ __('Randomly generated by the server before each game.') }}</small>
    </div>
    <div class="form-group">
        <label>{{ __('Server seed') }}</label>
        <input type="text" class="form-control text-muted" value="{{ $game->server_seed }}" readonly>
        <small>{{ __('Randomly generated by the server before each game.') }}</small>
    </div>
    <div class="form-group">
        <label>{{ __('Server hash') }}</label>
        <input type="text" class="form-control text-muted" value="{{ $game->server_hash }}" readonly>
        <small>
            {{ __('HMAC SHA256 hash of the server secret with server seed as the key, revealed before each game.') }}
            {{ __('Calculated as hash_hmac("sha256", ":secret", ":seed")', ['secret' => $game->secret, 'seed' => $game->server_seed]) }}
        </small>
    </div>
    <div class="form-group">
        <label>{{ __('Client seed') }}</label>
        <input type="text" class="form-control text-muted" value="{{ $game->client_seed }}" readonly>
        <small>{{ __('A random string supplied by the user before each game.') }}</small>
    </div>
    <div class="form-group">
        <label>{{ __('Client hash') }}</label>
        <input type="text" class="form-control text-muted" value="{{ $game->client_hash }}" readonly>
        <small>
            {{ __('HMAC SHA256 hash of the server secret and server seed with client seed as the key.') }}
            {{ __('Calculated as hash_hmac("sha256", ":secret:server_seed", ":client_seed")', ['secret' => $game->secret, 'server_seed' => $game->server_seed, 'client_seed' => $game->client_seed]) }}
        </small>
    </div>
    <div class="form-group">
        <label>{{ __('Shift value') }}</label>
        <input type="text" class="form-control text-muted" value="{{ $game->shift_value }}" readonly>
        <small>
            {{ __('Last 5 chars of the Client hash are converted to a decimal value.') }}
            {{ __('Calculated as hexdec(":v")', ['v' => substr($game->client_hash,-5)]) }}
        </small>
    </div>

    @include($game_package_id . '::frontend.pages.verify')

    <div class="mt-3">
        <a href="{{ route('frontend.history.my') }}">
            <i class="fas fa-long-arrow-alt-left"></i>
            {{ __('Back to my games') }}
        </a>
        <a class="float-right" role="button" data-toggle="collapse" href="#provably-fair-description" aria-expanded="false" aria-controls="provably-fair-description">
            {{ __('How it works') }}
        </a>
        <div id="provably-fair-description" class="collapse">
            @include($game_package_id . '::frontend.pages.verify-description')
        </div>
    </div>
@endsection