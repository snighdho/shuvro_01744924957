@extends('layouts.app')

@section('title', 'Create Ticket')

@section('content')
    <div class="container">
        <h1>Create a New Ticket</h1>
        <form action="{{ route('tickets.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Ticket</button>
        </form>
    </div>
@endsection
