@extends('layouts.app')

@section('content')    
<div class="wrapper ticket-index">
    <h1>Ticket Status</h1>
    <div class="wrapper create-ticket">
        <h1>Search Ticket</h1>
        @if (!session('comment'))
        <form action="/ticketstatus" method="POST">
            @csrf
            <label for="refno">Reference ID:</label>
            <input type="text" id="refno" name="refno">
            <input type="submit" value="Submit">
        </form>
        @else
        <p class="comment">Recent comment -  {{ session('comment') }}</p>
        @endif
    </div>
</div>
@endsection

