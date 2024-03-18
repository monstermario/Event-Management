<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Display a listing of the events.
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    // Show the form for creating a new event.
    public function create()
    {
        return view('events.create');
    }

    // Store a newly created event in storage.
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    // Remove the specified event from storage.
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
