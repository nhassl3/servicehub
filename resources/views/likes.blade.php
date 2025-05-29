@php $active = true;
$categories = ['Скрипты', 'ПО']; @endphp

@extends('layouts.master')

@section('title', 'Понравившиеся')

@section('css')
<!-- <link rel="stylesheet" href="{{ asset("css/style-likes.css") }}"> -->
<!-- IN DEVELOP STYLE -->
<link rel="stylesheet" href="{{ asset("css/style-in-develop.css") }}">
@endsection

@section('content')
@include('in-develop')
@endsection