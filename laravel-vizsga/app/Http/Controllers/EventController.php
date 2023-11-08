<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index() {
        return view('events.index');
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
}
