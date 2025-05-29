@extends("layouts.master")

@section("title", "Страница не найдена")

@section("css")
<link rel="stylesheet" href="{{ asset("css/style-error.css") }}">
@endsection

@section('content')
<h2 class="page-error">404</h2>
<div class='page-error-text'>Страница не найдена!</div>
@endsection