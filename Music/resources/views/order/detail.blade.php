@extends('master')
@section('title','Order Detail')
@section('main')
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
      <a href="{{ route('order.index') }}" class="btn btn-danger float-end">BACK</a>
			<div class="table-title">
				<div class="row">
					<div class="col-sm-8">
						<h2><b>Order Detail</b></h2>
					</div>
				</div>
			</div>
      <div class="container-detail">

        <div class="user-detail">

          <div class="user-info">
            <label for="orderID">Order ID:</label>
            <p id="orderID">{{ $order->id }}</p>
          </div>
          <div class="user-info">
            <label for="userID">User ID:</label>
            <p id="userID">{{ $order->userID }}</p>
          </div>
          <div class="user-info">
            <label for="userName">Full Name:</label>
            <p id="userName">{{ $order->userName }}</p>
          </div>
          <div class="user-info">
            <label for="roomID">Room ID:</label>
            <p id="roomID">{{ $order->roomID }}</p>
          </div>
          <div class="user-info">
            <label for="roomName">Room Name:</label>
            <p id="roomName">{{ $order->roomName }}</p>
          </div>
          <div class="user-info">
            <label for="time">TIME:</label>
            <p id="time">{{ $order->time }}</p>
          </div>
          <div class="user-info">
            <label for="date">DATE:</label>
            <p id="date">{{ $order->date }}</p>
          </div>
          
        </div>
      </div> 
    </div>
	</div>
</div>
@endsection