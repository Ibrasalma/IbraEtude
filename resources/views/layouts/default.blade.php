<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<title>{{ page_title($title ?? '') }}</title>

	<!-- For the mobile device so that the application can be responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- FontAwesome -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/footer.css') }}">


	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    
</head>
<body>
	@include('layouts.partials._nav')

	@if (session()->has('notification.message'))
		<div class="alert alert-<?php echo session()->get('notification.type');?>">
			{{ session('notification.message') }}	
		</div>
	@endif

    @yield('content')

    @include('layouts.partials._footer')
    

    <script src="//code.jquery.com/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	@include('flashy::message')
	<script src="{{ asset('/js/navbar.js') }}"></script>
	<script src="{{ asset('/js/galerie.js') }}"></script>
</body>
</html>