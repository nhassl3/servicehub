@extends("layouts.master")

@section("title", "Срок истек")

@section("css")
<link rel="stylesheet" href="{{ asset("css/style-error.css") }}">
@endsection

@section('content')
<h2 class="page-error">419</h2>
<div class='page-error-text'>Срок действия страницы истек</div>
@endsection