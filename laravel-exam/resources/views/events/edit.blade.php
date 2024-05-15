<x-app-layout>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <x-slot name="header">
    <h1 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('Events') }}</h1>
    <div class="inline-flex rounded-md shadow-sm " role="group">
    <button type="submit" class="btn btn-outline-light text-dark py-2 px-4 cursor-pointer" onclick="window.location='{{route('events.index')}}'">List</button>
    <button type="submit" class="btn btn-outline-light text-dark py-2 px-4 cursor-pointer" onclick="window.location='{{route('events.trash')}}'">Trash</button>
    </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight pb-10">Edit event</h1>

    <form method="POST" action="{{ route('events.update', ['event' => $event]) }}">
        @csrf
        @method('put')
        <div class="grid grid-cols-2 gap-2 w-full max-w-lg">
            <div>
            <label>Name</label>
            </div>
            <div>
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" name="name" value="{{$event->name}}">
                @error('name')
                <span class="alert alert-danger text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
            <label>Type</label>
            </div>
            <div>
            <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="type">
                <option value="kültéri" @selected($event->type == 'kültéri')>kültéri</option>
                <option value="beltéri" @selected($event->type == 'beltéri')>beltéri</option>
            </select>
                @error('type')
                <span class="alert alert-danger text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
            <label>Description</label>
            </div>
            <div>
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" name="desc" value="{{$event->desc}}">
                @error('desc')
                <span class="alert alert-danger text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
            <label>Event start at</label>
            </div>
            <div>
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="datetime-local" step="1" name="event_start_at"  value="{{$event->event_start_at}}">
                @error('event_start_at')
                <span class="alert alert-danger text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
            <label>Published at</label>
            </div>
            <div>
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="datetime-local" step="1" name="published_at"  value="{{$event->published_at}}">
                @error('published_at')
                <span class="alert alert-danger text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
            </div>
            <div>
            <input type="submit" class="bg-success text-white font-bold w-full py-2 px-4 rounded cursor-pointer" value="Update">
            </div>
        </div>
    </form>


                </div>
    </div>
    </div>
</div>
</x-app-layout>