@extends("layouts.master")

@section("title", "Страница не найдена")

@section("css")
<link rel="stylesheet" href="{{ asset("css/style-404.css") }}">
@endsection

@section('content')
<h2 class="page404">404</h2>
<div class='page404-text'>Страница не найдена!</div>
@endsection