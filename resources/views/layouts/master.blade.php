<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	@yield("meta")
	<title>ServiceHub | @yield('title')</title>
	<link rel="stylesheet" href="{{ asset("css/style.css") }}">
	@yield('css')
	@include('layouts.connect_favicon')
</head>

<body>
	@include('layouts.header')

	<main>
		@yield('content')
	</main>

	@include('layouts.footer')
	<script src='{{ asset("js/auth-visible.js") }}'></script>
	@yield('scripts')
</body>

</html>