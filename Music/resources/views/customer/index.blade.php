@extends('master')
@section('title','Show Customers')
@section('main')
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-8">
						<h2><b>Customers</b></h2>
					</div>
					@if(Auth::check()&&Auth::user()->userRole==1)
					<div class="col-sm-4">
						<div class="search-box">
							<a href="{{ route('user.create') }}" class="btn btn-primary" >+ Add</a>
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
						<th>Account</th>
						@if(Auth::check()&&Auth::user()->userRole==1)
						<th style="width: 16.5%;">Actions</th>
						@endif
					</tr>
				</thead>

				<tbody>
					
					@if(!$users->isEmpty())
					@foreach ($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
						<td>
							{{ $user->userName }}
							@if(Auth::check()&&$user->userRole==1&&Auth::user()->userRole==1)
								<span>[Admin]</span>
							@endif
						</td>
						<td>{{ $user->userAccount }}</td>
						@if(Auth::check()&&Auth::user()->userRole==1)
						<td>
							<a href="{{ route('user.edit', ['id'=>$user->id]) }}" class="btn btn-warning" style="color:white;">Edit</a>
							<a href="{{ route('user.delete', ['id'=>$user->id]) }}" class="btn btn-danger" style="color:white;">Delete</a>
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
