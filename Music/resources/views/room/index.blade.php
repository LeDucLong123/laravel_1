@extends('master')
@section('title','Show Room')
@section('main')
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-8">
						<h2><b>Music Room</b></h2>
					</div>
					@if(Auth::check()&&Auth::user()->userRole==1)
					<div class="col-sm-4">
						<div class="search-box">
							<a href="{{ route('room.create') }}" class="btn btn-primary" >+ Add</a>
						</div>
					</div>
					@endif
				</div>
			</div>
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name <i class="fa fa-sort"></i></th>
						<th>Capacity</th>
						<th class="text-center">Status</th>
						<th style="width: 10%;">Order</th>
						@if(Auth::check()&&Auth::user()->userRole==1)
						<th style="width: 16.5%;">Actions</th>
						@endif
					</tr>
				</thead>

				<tbody>
					@if(!$rooms->isEmpty())
					@foreach ($rooms as $room)
						<tr>
							<td>{{ $room->id }}</td>
						<td>{{ $room->roomName }}</td>
						<td>{{ $room->roomCapacity }}</td>
						<td class="text-center">
							@if($room->roomStatus==1)
								<i class="fa fa-solid fa-circle" style="color: #ff0000" title="Occupied"></i>
							@endif
							@if($room->roomStatus==0)
								<i class="fa fa-solid fa-circle" style="color: #00ff00" title="Empty"></i>
							@endif
						</td>
						<td>
							@if(Auth::check()&&$room->roomStatus==0)
							<a href="{{ route('room.order',['id'=>$room->id]) }}" class="btn btn-success" style="color:white;">Select</a>
							@else
							<a class="btn btn-secondary" style="color:white;">Select</a>
							@endif
						</td>

						
							@if(Auth::check()&&Auth::user()->userRole==1)
							<td>
								<a href="{{ route('room.edit', ['id'=>$room->id]) }}" class="btn btn-warning" style="color:white;">Edit</a>
								<a href="{{ route('room.delete', ['id'=>$room->id]) }}" class="btn btn-danger" style="color:white;">Delete</a>	
							</td>
							@endif
						</tr>
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

