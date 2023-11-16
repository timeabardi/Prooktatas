<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index() {
        $events = Event::all();
        return view('events.index', ['events'=> $events]);
    }
    public function create() {
        return view('events.create');
    }
    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'desc' => 'required',
            'event_start_at' => 'required|date_format:Y-m-d H:i:s',
            'published_at' => 'required|date_format:Y-m-d H:i:s'
        ]);

        $newEvent = Event::create($data);
        return redirect(route('events.index'));
    }
    public function edit(Event $event) {
       return view('events.edit', ['event' => $event]);
    }
    public function update(Event $event, Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'desc' => 'required',
            'event_start_at' => 'required|date_format:Y-m-d H:i:s',
            'published_at' => 'required|date_format:Y-m-d H:i:s'
        ]);
        $event->update($data);
        
        return redirect(route('events.index'))->with('success', 'Event updated successfully');
    }

    public function delete(Event $event) {
        $event->delete();

        return redirect(route('events.index'))->with('success', 'Event deleted successfully');
    }
    public function trash(Event $event) {
        $events = Event::onlyTrashed()->get();
        return view('events.trash', ['events'=> $events]);
    }
    public function restore(Request $request) {
        $data = Event::where('id', $request->event);
        $data->restore();
        return redirect(route('events.index'))->with('success', 'Event restored successfully');
    }
    public function force_delete(Request $request) {
        $data = Event::where('id', $request->event);
        $data->forceDelete();

        return redirect(route('events.index'))->with('success', 'Event totally deleted from database');
    }
}
