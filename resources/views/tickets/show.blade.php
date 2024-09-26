@extends('layouts.app')

@section('title', 'Ticket Details')

@section('content')
    <div class="container">
        <h1>Ticket Details</h1>
        <p><strong>Subject:</strong> {{ $ticket->subject }}</p>
        <p><strong>Description:</strong> {{ $ticket->description }}</p>
        <p><strong>Status:</strong> {{ $ticket->status }}</p>
        @if ($ticket->status == 'open' && auth()->user()->isAdmin())
            <form action="{{ route('tickets.close', $ticket->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Close Ticket</button>
            </form>
        @endif
    </div>
@endsection
