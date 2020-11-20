<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Str;


class TicketStatusController extends Controller
{
    public function index(){
        $tickets = Ticket::where('refno','54DK9SxzEszxMFlLj33iBz2eOcWB7dXyEePkaU3Z')->get();
    
        return view('ticketstatus.index', [
            'tickets' => $tickets,
            ]);
    }

    /**
     * Show the status of the generated key
     */
    public function show($id){

        $ticket = Ticket::where('refno','54DK9SxzEszxMFlLj33iBz2eOcWB7dXyEePkaU3Z')->get();

        return view('ticketstatus.show', [ 'ticket' => $ticket]);
    }

    /**
     * Get ticket status for the customer based on the key generated
     */
    public function store(){
        $tickets = Ticket::where('refno',request('refno'))->get();

        if($tickets[0]->comment=="")
        {
            $tickets[0]->comment= "-1";
        }

        return redirect('/ticketstatus')->with('comment', $tickets[0]->comment);
    }

}
