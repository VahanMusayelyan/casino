@extends('frontend.layouts.home')

@push("styles")
	<link rel="stylesheet" href="{{asset('css/topwins.css')}}">
@endpush
@section('content')
	<style>
		table.top_wins_table_data td:nth-child(6) {
			border-right: 1px solid #464646;
		}

	</style>
	<div class="content" style="align-items: unset;" id="desktop_table">
		<h1 class="account_heading">{{__("Top wins")}}</h1>
		@if(!$games)
			<h1 class="account_heading">{{__("No wins")}}</h1>

		@elseif ($games)
			<table class="top_wins_table_data">
				<thead>

				<th style="width: 10%;">{{__("Name")}}</th>
				<th style="width: 22%;">{{__("Game")}}</th>
				<th style="width: 12%;">{{__("Bet")}}</th>
				<th style="width: 12%;">
					{{__("Win")}}
					<img src="/assets/img/topwins/sort_arrow.png" alt="" style="margin: 0 12px ">
				</th>
				<th style="width: 14%;">{{__("Result")}}</th>
				<th style="width: 27%;">{{__("Played")}}</th>

				</thead>
				<tbody>
				@foreach ($games as $game)
					<tr>
						<td class="name">{{substr($game->account->user->name, 0, 2)}}***{{substr($game->account->user->name, -1)}}</td>
						<td>{{ $game->title }}</td>
						<td>{{ $game->_bet }}</td>
						<td>{{ $game->_win }}</td>
						<td>{{ $game->gameable->result }}</td>
						<td>
							<span style="margin: 0 0 0 14px;width: 130px;">{{ $game->updated_at->diffForHumans() }}</span>
						<span data-balloon="{{ $game->updated_at }}" data-balloon-pos="up">
                            <img class="far fa-clock" src="/assets/img/topwins/green_oval (2).png" alt="" style="margin: 0 0 0 0.5vw">
                        </span>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		@endif
	</div>


	<div class="content" style="align-items: unset;" id="mobile_table">
		<h1 class="account_heading">{{__("Top wins")}}</h1>

		<!-- table mobile -->
		@foreach ($games as $game)
			<div class="cube_for_mobile" id="main_table_mobile">
				<div class="cube_first_side" style="display: flex; justify-content: space-between; flex-direction: row;">
					<div style="display: flex; justify-content: start; flex-direction: column;" class="headings">
						<div>{{__("Name")}}</div>
						<div>{{__("Game")}}</div>
						<div>{{__("Bet")}}</div>
						<div>{{__("Win")}}</div>
						<div>{{__("Result")}}</div>
						<div>{{__("Played")}}</div>
					</div>
					<div style="display: flex; justify-content: end; flex-direction: column; text-align: right;" id="info_right">
							<div style="color: #FFD400;">{{ $game->account->user->name }}</div>
							<div>{{ $game->title }}</div>
							<div>{{ $game->_bet }}</div>
							<div>{{ $game->_win }}</div>
							<div>{{ $game->gameable->result }}</div>
							<div style="display: flex; justify-content: right;"><span>{{ $game->updated_at->diffForHumans() }}</span>
								<img src="/assets/img/topwins/green_oval (2).png" alt="" style="margin: 0 0 0 2vw">
							</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>

	<!-- table for mobile  -->
	<!-- table mobile -->
{{--	<div class="content" style="align-items: unset;" id="mobile_table">--}}
{{--		<h1 class="account_heading">{{__("Top wins")}}</h1>--}}

{{--		<!-- table mobile -->--}}
{{--		<div class="cube_for_mobile" id="main_table_mobile">--}}
{{--			<div class="cube_first_side" style="display: flex; justify-content: space-between; flex-direction: row;">--}}
{{--				<div style="display: flex; justify-content: start; flex-direction: column;" class="headings">--}}
{{--					<div>{{__("Name")}}</div>--}}
{{--					<div>{{__("Game")}}</div>--}}
{{--					<div>{{__("Bet")}}</div>--}}
{{--					<div>{{__("Win")}}</div>--}}
{{--					<div>{{__("Result")}}</div>--}}
{{--					<div>{{__("Played")}}</div>--}}
{{--				</div>--}}
{{--				@foreach ($games as $game)--}}
{{--					<div style="display: flex; justify-content: end; flex-direction: column; text-align: right;" id="info_right">--}}
{{--						<div style="color: #FFD400;">{{ $game->account->user->name }}</div>--}}
{{--						<div>{{ $game->title }}</div>--}}
{{--						<div>{{ $game->_bet }}</div>--}}
{{--						<div>{{ $game->_win }}</div>--}}
{{--						<div>{{ $game->gameable->result }}</div>--}}
{{--						<div style="display: flex; justify-content: right;"><span>{{ $game->updated_at->diffForHumans() }}</span>--}}
{{--							<img src="assets/img/account/green_oval (2).png" alt="" style="margin: 0 0 0 2vw">--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				@endforeach--}}

{{--			</div>--}}
{{--		</div>--}}
{{--	</div>--}}
@endsection