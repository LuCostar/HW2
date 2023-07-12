@extends('layout')
@section('head')
@parent
<script src="{{ url('scripts/news.js') }}" defer></script>
<link rel="stylesheet" href="{{ url('stylesheets/news.css') }}">
@endsection

@section('content')
<h1 class="subtitle">The latest videogame-related news!</h1>

<main class="articles">

</main>
@endsection
