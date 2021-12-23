@extends('frontend.layouts.home')


{{-- @section('content')
<table class="table table-hover table-stackable">
	<thead>
		<tr>
			<th>
				{{ __('Balance') }}
				<span data-balloon="{{ __('in credits') }}" data-balloon-pos="up">
					<i class="far fa-question-circle"></i>
				</span>
			</th>
			<th class="text-right">{{ __('Created') }}</th>
			<th class="text-right">{{ __('Updated') }}</th>
			<th class="text-right">{{ __('Actions') }}</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td data-title="{{ __('Balance') }}">{{ $account->_balance }}</td>
			<td data-title="{{ __('Created') }}" class="text-right">
				{{ $account->created_at->diffForHumans() }}
				<span data-balloon="{{ $account->created_at }}" data-balloon-pos="up">
					<i class="far fa-clock"></i>
				</span>
			</td>
			<td data-title="{{ __('Updated') }}" class="text-right">
				{{ $account->updated_at->diffForHumans() }}
				<span data-balloon="{{ $account->updated_at }}" data-balloon-pos="up">
					<i class="far fa-clock"></i>
				</span>
			</td>
			<td class="text-right">
				@packageview('frontend.includes.account.actions')
			</td>
		</tr>
	</tbody>
</table>
@if(!$transactions->isEmpty())
<h2>{{ __('Transactions') }}</h2>
<table class="table table-hover table-stackable">
	<thead>
		<tr>
			<th>{{ __('ID') }}</th>
			<th>{{ __('Type') }}</th>
			<th class="text-right">
				{{ __('Amount') }}
				<span data-balloon="{{ __('in credits') }}" data-balloon-pos="up">
					<i class="far fa-question-circle"></i>
				</span>
			</th>
			<th class="text-right">
				{{ __('Running balance') }}
				<span data-balloon="{{ __('in credits') }}" data-balloon-pos="up">
					<i class="far fa-question-circle"></i>
				</span>
			</th>
			<th class="text-right">{{ __('Created') }}</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($transactions as $transaction)
		<tr>
			<td data-title="{{ __('ID') }}">
				{{ $transaction->transactionable->id }}
			</td>
			<td data-title="{{ __('Type') }}">{{ $transaction->transactionable->title }}</td>
			<td data-title="{{ __('Amount') }}"
				class="text-right {{ $transaction->amount > 0 ? 'text-success' : 'text-danger' }}">
				{{ $transaction->_amount }}
			</td>
			<td data-title="{{ __('Running balance') }}" class="text-right">
				{{ $transaction->_balance }}
				<i class="fas fa-long-arrow-alt-{{ $transaction->amount > 0 ? 'up text-success' : 'down text-danger' }}"></i>
			</td>
			<td data-title="{{ __('Created') }}" class="text-right">
				{{ $transaction->created_at->diffForHumans() }}
				<span data-balloon="{{ $transaction->created_at }}" data-balloon-pos="up">
					<i class="far fa-clock"></i>
				</span>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="d-flex justify-content-center">
	{{ $transactions->links() }}
</div>
@endif
@endsection --}}
@push("styles")
<link rel="stylesheet" href="{{asset('css/account.css')}}">
@endpush
@section('content')
<div class="content" style="align-items: unset;" id="desktop_table">
	<h1 class="account_heading">{{__("Account")}}</h1>
	<table class="account_table_head">
		<thead>
			<tr>
				<th colspan="4">
					<div style="display: flex; justify-content: space-around; align-items: center;">
						<span style="width: 25%;">{{__("Balance")}}</span>
						<span style="width: 25%;">{{__("Created")}}</span>
						<span style="width: 25%;">{{__("Updated")}}</span>
						<span style="width: 25%;">{{__("Actions")}}</span>
					</div>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr class="tr">
				<td>
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<span style="color: #6BA939; margin: 0 0 0 6vw;">{{ $account->_balance }}</span><img
							src="{{asset("assets/img/account/green_oval (1).png")}}" alt="" style="margin: 0 0.5vw 0 3vw">
					</div>
				</td>
				<td>
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<span style="margin: 0 0 0 6vw;">{{ $account->created_at->diffForHumans() }}</span>
						<span data-balloon="{{ $account->created_at }}" data-balloon-pos="up">
                            <img class="far fa-clock" src="/assets/img/topwins/green_oval (2).png" alt="" style="margin: 0 0 0 0.5vw">
                        </span>
					</div>
				</td>
				<td>
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<span style="margin: 0 0 0 6vw;">{{ $account->updated_at->diffForHumans() }}</span>
						<span data-balloon="{{ $account->updated_at }}" data-balloon-pos="up">
                            <img class="far fa-clock" src="/assets/img/topwins/green_oval (2).png" alt="" style="margin: 0 0 0 0.5vw">
                        </span>
					</div>
				</td>
				<td>
					<a href="{{url("user/deposits/create")}}"><button type="button" class="depostit_button">Deposit</button></a>
					<a href="/user/withdrawals/create"><button type="button" class="withdraw_button">Withdraw</button></a>
				</td>

			</tr>
		</tbody>
	</table>
	@if(!$transactions->isEmpty())
	<div>
		<h1 class="transactions">Transactions</h1>
		<table class="account_table_data">
			<thead>
				<tr class="tittle">
							<td class="text-center" style="width: 10%;">{{__("ID")}}</td>
							<td class="text-center"  style="width: 22.5%;">{{__("Type")}}</td>
							<td class="text-center"  style="width: 22.5%;">{{__("Amount")}}</td>
							<td class="text-center"  style="width: 22.5%;">{{__("Running balance")}}</td>
							<td class="text-center"  style="width: 22.5%;">{{__("Created")}}</td>
				</tr>
			</thead>
			<tbody>
				@foreach ($transactions as $transaction)
				<tr>
					<td  class="text-center">{{ $transaction->transactionable->id }}</td>
					<td  class="text-center">{{ $transaction->transactionable->title }}</td>
					<td class="amount_negative_number_check text-center">{{ $transaction->_amount }}</td>
					<td  class="text-center"><span>{{ $transaction->amount }}</span>
						<div class="bordered_block">
							@if($transaction->_amount > 0)
								<img src="{{asset("assets/img/account/green.svg")}}" alt="" style="margin: 5px 14px 0 32px">
							@else
								<img src="{{asset("assets/img/account/red-arrow.png")}}" alt="" style="margin: 5px 14px 0 32px">
							@endif
						</div>

					</td>
					<td class="text-center">
							<span>{{ $transaction->created_at->diffForHumans() }}</span>
							<span data-balloon="{{ $transaction->created_at }}" data-balloon-pos="up">
								<img class="far fa-clock" src="/assets/img/topwins/green_oval (2).png" alt="" style="margin: 0 0 0 0.5vw">
							</span>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
		<div class="d-flex justify-content-center">
			{{ $transactions->links() }}
		</div>

	@endif
</div>



<!-- table for mobile  -->
<div class="content" style="align-items: unset;" id="mobile_table">
	<h1 class="account_heading">Account</h1>
	<div class="cube_for_mobile">
		<div class="cube_first_side"
			style="display: flex; justify-content: space-between; align-items: center; flex-direction: row;">
			<div style="display: flex; justify-content: start; flex-direction: column;" class="headings">
				<div>Balance</div>
				<div>Created</div>
				<div>Updated</div>
				<div>Actions</div>
			</div>
			<div class="contents" style="display: flex; justify-content: end; flex-direction: column; text-align: right;">
				<div style="display: flex; justify-content: end; text-align: end;">
					<span style="color: #6BA939; margin: 0 0 0 6vw;">{{ $account->_balance }}</span><img
							src="{{asset("assets/img/account/green_oval (1).png")}}" alt="" style="margin: 0 0.5vw 0 3vw">
				</div>
				<div style="display: flex; justify-content: end; text-align: end; position: relative">
					<span style="margin: 0 0 0 6vw;">{{ $account->created_at->diffForHumans() }}</span>
					<span data-balloon="{{ $account->created_at }}" data-balloon-pos="up">
                            <img class="far fa-clock bal_clock" src="/assets/img/topwins/green_oval (2).png" alt="" style="margin: 0 0 0 0.5vw">
                        </span>
				</div>
				<div style="display: flex; justify-content: right; text-align: end;position: relative">
					<span style="margin: 0 0 0 6vw;">{{ $account->updated_at->diffForHumans() }}</span>
					<span data-balloon="{{ $account->updated_at }}" data-balloon-pos="up">
                            <img class="far fa-clock bal_clock" src="/assets/img/topwins/green_oval (2).png" alt="" style="margin: 0 0 0 0.5vw">
                        </span>
				</div>
				<div style="width: 10px; height: 35px;"></div>
			</div>
		</div>
		<div class="cube_second_side"
			style="display: flex; justify-content: center; align-items: center; flex-direction: row;">
			<div>
				<a href="{{url("user/deposits/create")}}"><button type="button" class="depostit_button">Deposit</button></a>
				<a href="{{url("user/withdrawals/create")}}"><button type="button" class="withdraw_button">Withdraw</button></a>
			</div>
		</div>
	</div>
	<h5 style="font-size: 14px; color: #959595; margin: 2px auto;">Total net win</h5>

	<!-- table mobile -->
	@foreach ($transactions as $transaction)
	<div class="cube_for_mobile" id="main_table_mobile">
		<div class="cube_first_side" style="display: flex; justify-content: space-between; flex-direction: row;">
				<div style="display: flex; justify-content: start; flex-direction: column;" class="headings">
					<div>{{__("ID")}}</div>
					<div>{{__("Type")}}</div>
					<div>{{__("Amount")}}</div>
					<div>{{__("Running balance")}}</div>
					<div>{{__("Created")}}</div>
				</div>
				<div style="display: flex; justify-content: end; flex-direction: column; text-align: right;" id="info_right">
					<div style="color: #6BA939;">{{ $transaction->transactionable->id }}</div>
					<div>{{ $transaction->transactionable->title }}</div>
					<div class="amount_negative_number_check">{{ $transaction->_amount }}</div>
					<div><span>{{ $transaction->amount }}</span>
{{--						@if($transaction->_amount > 0)--}}
{{--							<img src="assets/img/account/green.svg" alt="" style="margin: 5px 0 0 2vw">--}}
{{--						@else--}}
{{--							<img src="assets/img/account/red-arrow.png" alt="" style="margin: 5px 0 0 2vw">--}}
{{--						@endif--}}
					</div>
					<div style="display: flex; justify-content: end;">
						<span>{{ $transaction->created_at->diffForHumans() }}</span>
						<span data-balloon="{{ $transaction->created_at }}" data-balloon-pos="up">
								<img class="far fa-clock ml-1" src="/assets/img/topwins/green_oval (2).png" alt="" style="margin: 0 0 0 0.5vw">
							</span>
					</div>
				</div>
		</div>
	</div>
	@endforeach
	<div class="pagination_div">
		{{ $transactions->links() }}
	</div>
</div>
@endsection