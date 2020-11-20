<?php
use App\Ticket;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function filter(Request $request, Ticket $ticket)
    {
        // Search for a user based on their name.
        if ($request->has('name')) {
            return $ticket->where('name', $request->input('name'))->get();
        }
        return Ticket::all();
    }
}
