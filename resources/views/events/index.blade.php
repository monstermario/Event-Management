@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Events</h1>
        <a href="{{ route('events.create') }}" class="btn btn-primary">Add Event</a>
    </div>

    @foreach ($events as $event)
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">{{ $event->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $event->start_time->format('D, M j') }} - {{ $event->end_time->format('D, M j') }}</h6>
                <p class="card-text">{{ $event->description }}</p>
                <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection
