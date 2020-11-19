@extends('layouts.app')

@section('content')
<div class="wrapper create-ticket">
    <h1>Create a New Ticket</h1>
    <form action="/tickets" method="POST">
        @csrf
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name">
        <label for="desc">Problem Description:</label>
        <input type="text" id="desc" name="desc">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <label for="contact">Phone number:</label>
        <input type="text" id="contact" name="contact">
        <input type="submit" value="Submit">
    </form>
</div>
@endsection

