@extends('master')
@section('title','Show Order')
@section('main')
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-8">
						<h2><b>Order</b></h2>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Customer<i class="fa fa-sort"></i></th>
						<th>Room</th>
						<th style="width: 10%;">Check Out</th>
						<th style="width: 10%;">Actions</th>
					</tr>
				</thead>
				{{-- @if(!$users->isEmpty())
					@foreach ($users as $user)
						{{ $user->userName }}
					@endforeach
				@endif --}}

				{{-- {{ $user-> }} --}}
				<tbody>
					
					@if(!$orders->isEmpty())
					@foreach ($orders as $order)
						<tr>
							<td>{{ $order->id }}</td>
						<td>{{ $order->userName }}</td>
						<td>{{ $order->roomName }}</td>
						<td>
							@if(Auth::check()&&Auth::user()->id==$order->userID&&$order->checkout==0)
								<a href="{{ route('order.checkout',['idRoom'=>$order->roomID,'idOrder'=>$order->id]) }}" class="btn btn-success" style="color:white;">Select</a>
							@else
								<a class="btn btn-secondary" style="color:white;">Select</a>
							@endif
						</td>
						<td>
							<a href="{{ route('order.detail',['id'=>$order->id]) }}" class="btn btn-info" style="color:white;">Detail</a>
						</td>
						</tr>
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
