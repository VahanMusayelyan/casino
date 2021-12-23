@extends('frontend.layouts.home')

@section('title')
    {{ __('Provably fair') }}
@endsection

@section('content')
    <style>
        .container{
            padding-top: 20px;
            padding-bottom: 20px;
        }
        footer{
            position: unset!important;
        }
        h2{
            margin-bottom: 15px;
        }
        .container.terms{
            background-color: #ffffff;
            border-radius: 10px;
            padding: 35px;
            color: #000000;
            margin-top: 25px!important;
            margin-bottom: 25px!important;
        }
    </style>
    <div class="container terms" >
    <h2>{{ __('Slots') }}</h2>
    @include('game-slots::frontend.pages.verify-description')

    @installed('game-dice')
        <h2 class="mt-4">{{ __('Dice') }}</h2>
        @include('game-dice::frontend.pages.verify-description')
    @endinstalled

    @installed('game-video-poker')
        <h2 class="mt-4">{{ __('Card games') }}</h2>
        @include('game-video-poker::frontend.pages.verify-description')
    @endinstalled

    @installed('game-roulette')
        <h2 class="mt-4">{{ __('Roulette') }}</h2>
        @include('game-roulette::frontend.pages.verify-description')
    @endinstalled

    @installed('game-american-bingo')
        <h2 class="mt-4">{{ __('Bingo') }}</h2>
        @include('game-american-bingo::frontend.pages.verify-description')
    @endinstalled

    @installed('game-keno')
        <h2 class="mt-4">{{ __('Keno') }}</h2>
        @include('game-keno::frontend.pages.verify-description')
    @endinstalled
    </div>
@endsection