@extends('layouts.app')

@section('title', 'Tickets')

@section('content')
    <div class="container">
        <h1>Your Tickets</h1>
        <a href="{{ route('tickets.create') }}" class="btn btn-primary mb-3">Create New Ticket</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->subject }}</td>
                        <td>{{ $ticket->status }}</td>
                        <td>
                            <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-info">View</a>
            
                            @if ($ticket->status == 'open' && auth()->user()->isAdmin())
                                <form action="{{ route('tickets.close', $ticket->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Close</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
