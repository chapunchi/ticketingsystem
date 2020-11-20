@extends('layouts.app')

@section('content')
<div class="wrapper ticket-details">
    <h1>Ticket for {{ $ticket->name }}</h1>
    <p class="desc">Description - {{ $ticket->desc }}</p>
    <p class="email">Email - {{ $ticket->email }}</p>
    <p class="contact">Contact No - {{ $ticket->contact }}</p>
    <p class="refno">Reference no - {{ $ticket->refno }}</p>
    @if ($ticket->comment)
    <p class="desc">Last Comment - {{ $ticket->comment }}</p>
    @endif


<form action="/ticketupdate" method="POST">
    @csrf
    <label for="comment">Comment:</label>
    <input type="comment" id="comment" name="comment">
    <input type="hidden" id="refno" name="refno" value={{ $ticket->refno }}>
    <input type="hidden" id="name" name="name" value={{ $ticket->name }}>
    <input type="hidden" id="email" name="email" value={{ $ticket->email }}>
    <input type="submit" value="Submit">
</form>
<a href="/tickets/" class="back"> <- Back to all tickets</a>
</div>
@endsection

