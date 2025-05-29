@extends('layouts.master')

@section('title', 'Связь с продавцом')

@section('css')
<link rel="stylesheet" href="{{ asset('css/style-market.css') }}">
<!-- DEVELOP -->
<link rel="stylesheet" href="{{ asset('css/style-in-develop.css') }}">
@endsection

@section('content')
@include('in-develop')
@endsection