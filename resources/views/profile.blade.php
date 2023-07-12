@extends('layout')
@section('head')
@parent
<script src="{{ url('scripts/favourites.js') }}" defer></script>
<link rel="stylesheet" href='{{ url("stylesheets/profile.css") }}'>
<link rel="stylesheet" href='{{ url("stylesheets/game_card.css") }}'>

@endsection

@section('content')
    <h1 class="subtitle">Profilo personale</h1>

    <div class="user_info">

        <div class="info_box">
            <h2>Username</h2>
            <div>Nome registrato</div>
            <div>e-mail</div>
        </div>

        <div class="info_box">
            <h2>{{$user->USERNAME}}</h2>
            <div>{{$user->NAME}} {{$user->SURNAME}}</div>
            <div>{{$user->EMAIL}}</div>
        </div>

    </div>
    <h1 class="subtitle">Lista preferiti</h1>
    <div class="cards"></div>
@endsection

