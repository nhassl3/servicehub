@extends('layouts.master')

@section('title', 'Оформление заказа')

@section('css')
<link rel="stylesheet" href="{{ asset('css/style-market.css') }}">
<link rel="stylesheet" href="{{ asset("css/style-gocheckout-section.css") }}">
<!-- DEVELOP -->
<link rel="stylesheet" href="{{ asset('css/style-in-develop.css') }}">
@endsection

@section('content')
@include('in-develop')
<!-- @include('gocheckout-section') -->
@endsection