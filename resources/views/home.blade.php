@extends('layout')

@section('head')
@parent
<script src="{{ url('scripts/home.js') }}" defer></script>
<link rel="stylesheet" href="{{ url('stylesheets/search_bar.css') }}">
<link rel="stylesheet" href="{{ url('stylesheets/game_card.css') }}">
@endsection

@section('content')
<div id="search_container">
    <form autocomplete="off">
        <div id="search_box">
            <label for="search"></label>
            <input type="text" name="search" id="search_bar">
            <input type="submit" value="Cerca" id="submit_btn">
        </div>
    </form>
</div>
<div class= "cards">

@endsection
