@extends('layouts.layout')

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <img src="/img/welcome_image.jpg" alt="ticketing platform">
        <div class="title m-b-md">
            Online Ticketing Platform
        </div>
        <p class="mssg">{{ session('mssg') }}</p>
        <a href="/tickets/create">Create a Ticket</a>
        <a href="/ticketstatus">Find status of a Ticket</a>
    </div>
</div>
@endsection

