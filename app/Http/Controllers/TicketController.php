<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketDetail;
use Illuminate\Support\Str;


class TicketController extends Controller
{
    public function index(){
    
        // $tickets = Ticket::all();
        // $tickets = Ticket::orderBy('name')->get();
        // $tickets = Ticket::where('name','shawn')->get();
        $tickets = Ticket::latest()->get();

    
        return view('tickets.index', [
            'tickets' => $tickets,
            ]);
    }

    public function show($id){

        $ticket = Ticket::findOrFail($id);

        return view('tickets.show', [ 'ticket' => $ticket]);
    }

    public function create(){
        return view('tickets.create');
    }

    public function store(){
        $reference = Str::random(40);

        $ticket=  new Ticket();
        $ticket->name = request('name');
        $ticket->desc = request('desc');
        $ticket->email = request('email');
        $ticket->contact = request('contact');
        $ticket->comment = "";
        $ticket->refno= $reference;

        $ticket->save();

        return redirect('/')->with('mssg', 'Thanks for your order');
    }

    public function updateComment(){
        $ticket = Ticket::where('name','shawn')->get();
        
        $ticket->comment = request('comment');
        
    }

}
