@extends('layouts.app')

@section('content')
<div class="wrapper ticket-details">
    <h1>Ticket for {{ $ticket->name }}</h1>
    <p class="desc">Description - {{ $ticket->desc }}</p>
    <p class="email">Email - {{ $ticket->email }}</p>
    <p class="contact">Contact No - {{ $ticket->contact }}</p>
    <p class="refno">Reference no - {{ $ticket->refno }}</p>
</div>
<a href="/tickets" class="back"> <- Back to all tickets</a>
@endsection