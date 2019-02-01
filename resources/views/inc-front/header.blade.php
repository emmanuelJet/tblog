<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>JBlog @yield('title')</title>

		<link rel="shortcut icon" href="{{ asset('img/jet.png') }}" type="image/png">
		
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{ asset('css/uikit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/neat.min.css?v=1.0') }}">
</head>

<body>

@if (Route::has('login'))
	<div class="circle">
		@auth
			<div class="ring">
					<a href="{{ route('index_front') }}" class="menuItem fa fa-home fa-2x" title="Home"></a>
					<a href="{{ route('home') }}" class="menuItem fa fa-dashboard fa-2x" title="DashBoard"></a>
					<a href="#" class="menuItem fa fa-search fa-2x " data-toggle="modal" data-target="#myModal" title="Search"></a>
					<a href="{{ route('logout') }}" class="menuItem fa fa-sign-out fa-2x" title="Sign Out"></a>
					<a href="{{ route('show_profile') }}" class="menuItem fa fa-user fa-2x" title="Profile"></a>
			</div>
			<a href="#" class="center fa fa-th fa-2x"></a>
@else		
			<div class="ring">
					<a href="{{ route('index_front') }}" class="menuItem fa fa-home fa-2x" title="Home"></a>
					<a href="#" class="menuItem fa fa-user fa-2x"></a>
					<a href="#" class="menuItem fa fa-search fa-2x " data-toggle="modal" data-target="#myModal" title="Search"></a>
					<a href="{{ route('login') }}" class="menuItem fa fa-sign-in fa-2x" title="Sign In"></a>
					<a href="{{ route('register_new_user') }}" class="menuItem fa fa-user-plus fa-2x" title="Sign Up"></a>
			</div>
			<a href="#" class="center fa fa-th fa-2x"></a>
		@endauth
	</div>
@endif

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Search For : </h4>
            </div>
            <form action="{{ route('search') }}" method="GET">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="type something ex: technology , developers ..." name="query">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" >Search</button>
            </div>
            </form>
        </div>
    </div>
</div>