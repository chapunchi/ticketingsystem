@extends('layouts.app')

@section('content')    
<div class="wrapper ticket-index">
    <h1>Ticket List</h1>
    @foreach ($tickets as $ticket)
    <div class="ticket-item">
        <img src="/img/pizza.png" alt="pizza icon">
        <a href="/tickets/{{ $ticket->id }}">{{ $ticket-> id}}</a>
    </div>
    @endforeach
</div>
@endsection

