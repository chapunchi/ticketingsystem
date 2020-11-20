<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailUpdate;

class TicketUpdateController extends Controller
{
    public function index(){
        $tickets = Ticket::where('refno','54DK9SxzEszxMFlLj33iBz2eOcWB7dXyEePkaU3Z')->get();
        return view('ticketstatus.index', [
            'tickets' => $tickets,
            ]);
    }

    public function show($id){
        $ticket = Ticket::where('refno','54DK9SxzEszxMFlLj33iBz2eOcWB7dXyEePkaU3Z')->get();

        return view('ticketstatus.show', [ 'ticket' => $ticket]);
    }

    /**
     * Update status of the ticket
     */
    public function store(){
        $tickets = Ticket::where('refno',request('refno'))->get();

        $tickets[0]->comment = request('comment');
        $tickets[0]->save();

        $data = array(
            'name'    =>  request('name'),
            'refno'   =>   request('refno'),
            'updated' => 1
        );
    
        /**
         * Send an email regarding the ticket being updated
         */
        Mail::to(request('email'))->send(new SendMailUpdate($data));

        return redirect('/')->with('mssg', 'Ticket Updated!');

        return redirect('/tickets')->with('name', 1);
    }

}
