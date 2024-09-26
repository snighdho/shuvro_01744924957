<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Mail\TicketCreated;
use App\Mail\TicketClosed;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('user')->get(); // Get all tickets with user info
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    


    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Create a new ticket and associate it with the authenticated user
        $ticket = Ticket::create([
            'user_id' => auth()->id(),
            'subject' => $request->subject,
            'description' => $request->description,
            'status' => 'open', // Set the initial status
        ]);

        // Send email to admin
        // Mail::to('admin@example.com')->send(new TicketCreated($ticket));

        return redirect('tickets')->with('success', 'Ticket created successfully!');
    }

    public function show(Ticket $ticket)
    {
        // return $ticket;
        return view('tickets.show', compact('ticket'));
    }

    public function close(Ticket $ticket)
    {
        // Update the ticket status to closed
        $ticket->update(['status' => 'closed']);

        // Notify customer
        Mail::to($ticket->user->email)->send(new TicketClosed($ticket));

        return redirect()->route('tickets.index')->with('success', 'Ticket closed successfully!');
    }
    
    public function detail(Ticket $ticket)
    {
        return tickets;
        return view('tickets.show', compact('ticket'));
    }
}
