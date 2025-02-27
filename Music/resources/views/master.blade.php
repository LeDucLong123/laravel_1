<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title')</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    {{-- {{ asset('pdashboard/') }} --}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('pdashboard/css/all.min.css') }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="{{ asset('pdashboard/css/style.css') }}" />
	{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> --}}
	<link href="{{ asset('css/boot4.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="{{ asset('pdashboard/css/table.css') }}">
	<link href="{{ asset('css/detail.css') }}" rel="stylesheet">
    
</head>

<body>
	
	<div class="wrapper d-flex align-items-stretch">
	
		<nav id="sidebar">
			<div class="custom-menu">
				<button type="button" id="sidebarCollapse" class="btn btn-primary">
					<i class="fa fa-bars"></i>
					<span class="sr-only">Toggle Menu</span>
				</button>
			</div>
			<div class="p-4">
				<h1>
					<a href="index.html" class="logo">
						<i class="fa fa-solid fa-music mr-3"></i>Karaoke
						<span>
							Âm Nhạc Trăng Hoa
							<i class="fa fa-solid fa-play ml-2"></i>
						</span>
					</a>
				</h1>
				<ul class="list-unstyled components mb-5">
					<li>
						<a href="{{ route('user.index') }}"><span class="fa fa-user mr-3"></span>Customers</a>
					</li>
					<li>
						<a href="{{ route('room.index') }}"><span class="fa fa-solid fa-microphone mr-3"></span>Music Room</a>
					</li>
					<li>
						<a href="{{ route('order.index') }}"><span class="fa fa-solid fa-check mr-3"></span>Orders</a>
					</li>
					<li>
						<a href="{{ route('auth.register') }}"><span class="fa fa-user-plus mr-3"></span>Sign up</a>
					</li>
					<li>
						<a href="{{ route('auth.logout') }}"><i class="fa fa-solid fa-arrow-right-to-bracket mr-3"></i>

							Log In</a>
					</li>
				</ul>
			</div>
		</nav>

		<!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            @if(session('crud'))
                <div class="alert alert-success" role="alert">
                    <i class=" fa fa-regular fa-square-check mr-2"></i> 
                    {{session('crud')}} 
                    <span>- SUCCESS</span>
                </div>
            @endif
			@if(session('err'))
                <div class="alert alert-danger" role="alert">
                    <i class=" fa fa-solid fa-triangle-exclamation mr-2"></i> 
                    {{session('err')}} 
                    <span>- Error</span>
                </div>
            @endif
            <h2 class="mb-4"></h2>
            @yield('main')
        </div>
		
		
	</div>
	<script src="{{ asset('pdashboard/js/jquery.min.js') }}"></script>
	<script src="{{ asset('pdashboard/js/popper.js') }}"></script>
	<script src="{{ asset('pdashboard/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('pdashboard/js/main.js') }}"></script>
    
</body>

</html>