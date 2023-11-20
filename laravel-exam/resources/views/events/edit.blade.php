<x-app-layout>
    <x-slot name="header">
    <h1 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('Events') }}</h1>
    <div class="inline-flex rounded-md shadow-sm " role="group">
        <button type="button" class="px-4 py-2 text-base font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        <a href="{{route('events.index')}}">List</a>
        </button>
        <button type="button" class="px-4 py-2 text-base font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        <a href="{{route('events.trash')}}">Trash</a>
        </button>
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
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" name="type" value="{{$event->type}}">
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
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" name="event_start_at" value="{{$event->event_start_at}}">
                @error('event_start_at')
                <span class="alert alert-danger text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
            <label>Published at</label>
            </div>
            <div>
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" name="published_at" value="{{$event->published_at}}">
                @error('published_at')
                <span class="alert alert-danger text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
            </div>
            <div>
            <input type="submit" class="bg-green-700 hover:bg-green-600 text-white font-bold w-full py-2 px-4 rounded cursor-pointer" value="Update">
            </div>
        </div>
    </form>


                </div>
    </div>
    </div>
</div>
</x-app-layout>