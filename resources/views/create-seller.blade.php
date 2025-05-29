@extends('layouts.master')

@section('title', 'Стать продавцом')

@section('css')
<link rel="stylesheet" href="{{ asset("css/style-market.css") }}">
<!-- DEVELOP STYLE -->
<link rel="stylesheet" href="{{ asset("css/style-in-develop.css") }}">
@endsection

@section('content')
@include('in-develop')
@endsection