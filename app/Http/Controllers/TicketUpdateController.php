<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Str;


class TicketStatusController extends Controller
{
    public function index(){
    
        // $tickets = Ticket::all();
        // $tickets = Ticket::orderBy('name')->get();
        $tickets = Ticket::where('refno','54DK9SxzEszxMFlLj33iBz2eOcWB7dXyEePkaU3Z')->get();
        // $tickets = Ticket::latest()->get();

    
        return view('ticketstatus.index', [
            'tickets' => $tickets,
            ]);
    }

    public function show($id){

        // $ticket = Ticket::findOrFail($id);
        $ticket = Ticket::where('refno','54DK9SxzEszxMFlLj33iBz2eOcWB7dXyEePkaU3Z')->get();

        error_log($id);
        return view('ticketstatus.show', [ 'ticket' => $ticket]);
    }

    // public function create(){
    //     return view('tickets.create');
    // }

    public function store(){
        // $ticket=  new Ticket();
        // $ticket->name = request('name');
        // $ticket->desc = request('desc');
        // $ticket->email = request('email');
        // $ticket->contact = request('contact');
        // $ticket->comment = "";
        // $ticket->refno= $reference;

        // $ticket->save();
        error_log("qwqwq");
        error_log(request('refno'));

        $tickets = Ticket::where('refno',request('refno'))->get();
        error_log("qwqwq");
        error_log($tickets[0]->comment);

        return redirect('/ticketstatus')->with('comment', $tickets[0]->comment);
    }

}
