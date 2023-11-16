<x-app-layout>
    <x-slot name="header">
    <h1 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('Events') }}</h1>
    <div>
        <h2><a href="{{route('events.index')}}">List</a></h2>
        <h2><a href="{{route('events.trash')}}">Trash</a></h2>
    </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
    <table class="table" style="width:100%;text-align:center">
        <tr>
            <th scope="col">ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Description</th>
            <th>Event start at</th>
            <th>Published at</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($events as $event)
        <tr>
            <td>{{$event->id}}</td>
            <td>{{$event->name}}</td>
            <td>{{$event->type}}</td>
            <td>{{$event->desc}}</td>
            <td>{{$event->event_start_at}}</td>
            <td>{{$event->published_at}}</td>
            <td>
                <a href="{{route('events.edit', ['event' => $event])}}">Edit</a>
            </td>
            <td>
                <form method="post" action="{{route('events.delete', ['event' => $event])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a class="btn btn-primary" href="{{route('events.create')}}">Create an event</a>
    </div>
    <div style="text-align:center;">
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
    </div>
    </div>
    </div>
    </div>
</div>
</x-app-layout>