@extends('layouts.app')

@section('content')    
<div class="wrapper ticket-index">
    <h1>Ticket List</h1>

    <form action="/search" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="name" id="name"
                placeholder="Search users"> <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </form>

    @foreach ($tickets as $ticket)
    <div class="ticket-item">
        <span><img src="/img/issue.png" alt="issue icon"></span>
        <span><a href="/tickets/{{ $ticket->id }}">{{ $ticket-> id}}</a></span>
    </div>
    @endforeach
    {!! $tickets->render() !!}
</div>
@endsection

