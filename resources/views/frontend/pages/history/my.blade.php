@extends('frontend.layouts.home')

@section('content')
    <style>
        .container{
            min-height: 67vh;
        }
        .pagination li, .pagination li a , .pagination li a span, .pagination span {
            background-color: #141414!important;
        }
        .pagination li.active span{
            color: #FFFFFF;
            background-color: #538c31!important;

        }
        .page-item.disabled .page-link{
            border: 1px solid #538c31!important;
            color: #FFFFFF;
            font-weight: bold;
        }
        .page-link,.page-item.active .page-link {
            border: 1px solid #538c31;
            color: #FFFFFF;
            font-weight: bold;
        }
        .table thead th,.table thead th tr{
            border: none;
        }
        .table td, .table th {
            border-top: none;
        }
        td:nth-child(5) {
            display: table-cell;
        }
        .table {
            width: 99%;
        }

        @media (width: 991px) {
            body > div.container > div > table > thead > tr > th{
                padding: 0!important;
            }
        }

        @media (width: 768px) {
        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 30px;
            margin-right: auto;
            margin-left: auto;
        }
        }
    </style>
    <div class="container" style="align-items: unset;" id="">
    @if($games->isEmpty())
        <div class="alert alert-info" role="alert">
            {{ __('There are no games yet.') }}
        </div>
    @else
        <table class="table table-hover table-stackable">
            <thead>
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Game') }}</th>
                <th class="text-right">{{ __('Bet') }}</th>
                <th class="text-right">{{ __('Win') }}</th>
                <th>{{ __('Result') }}</th>
                <th class="text-right">
                    <i class="fas fa-arrow-down"></i>
                    {{ __('Played') }}
                </th>
                <th>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($games as $game)
                <tr>
                    <td data-title="{{ __('ID') }}">
                        {{ $game->id }}
                    </td>
                    <td data-title="{{ __('Game') }}">
                        {{ $game->title }}
                    </td>
                    <td data-title="{{ __('Bet') }}" class="text-right">
                        {{ $game->_bet }}
                    </td>
                    <td data-title="{{ __('Win') }}" class="text-right">
                        {{ $game->_win }}
                    </td>
                    <td data-title="{{ __('Result') }}">
                        {{ $game->gameable->result }}
                    </td>
                    <td data-title="{{ __('Played') }}" class="text-right">
                        {{ $game->updated_at->diffForHumans() }}
                        <span data-balloon="{{ $game->updated_at }}" data-balloon-pos="up">
                            <img class="far fa-clock" src="/assets/img/topwins/green_oval (2).png" alt="" style="margin: 0 0 0 0.5vw">
                        </span>
                    </td>
                    <td class="text-right">
                        <a href="{{ route('frontend.history.verify', $game) }}" class="btn btn-primary btn-sm">{{ ('Verify') }}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $games->links() }}
        </div>
    @endif
    </div>
@endsection