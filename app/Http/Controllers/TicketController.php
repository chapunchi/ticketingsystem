<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketDetail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class TicketController extends Controller
{
    /**
     * Return Ticket view
     */
    public function index(){
        $tickets = Ticket::paginate(5);

        return view('tickets.index', [
            'tickets' => $tickets,
            ]);
    }

    /**
     * Show Ticket details
     */
    public function show($id){
        $ticket = Ticket::findOrFail($id);
        return view('tickets.show', [ 'ticket' => $ticket]);
    }

    /**
     * Return view to create new tickets
     */
    public function create(){
        return view('tickets.create');
    }

    /**
     * 
     */
    public function store(){
        /**
         * Generate random key for user ticket
         */
        $reference = Str::random(40);

        /**
         * Create new ticket and store in the database
         */
        $ticket=  new Ticket();
        $ticket->name = request('name');
        $ticket->desc = request('desc');
        $ticket->email = request('email');
        $ticket->contact = request('contact');
        $ticket->comment = "";
        $ticket->refno= $reference;
        $ticket->save();

        $data = array(
            'name'      =>   $ticket->name,
            'refno'   =>   $ticket->refno
        );
    
        /**
         * Send email for customer with the new key
         */
        Mail::to($ticket->email)->send(new SendMail($data));

        /**
         * Success message displayed in the welcome page
         */
        return redirect('/')->with('mssg', 'Thanks for contacting us!');
    }
}
