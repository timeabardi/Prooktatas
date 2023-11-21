<x-app-layout>
    <x-slot name="header">
    <h1 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('Events') }}</h1>
    <div class="inline-flex rounded-md shadow-sm" role="group">
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
            <div>
        @if(session()->has('success'))
        <div class="bg-green-700 text-center font-bold text-white py-4">
            {{session('success')}}
        </div>
        @endif
    </div>
                <div class="p-6 text-gray-900"> 
                <div style="width:100%;text-align:right">
                <a class="bg-green-700 text-sm hover:bg-green-600 text-white font-bold py-2 px-4 rounded" href="{{route('events.create')}}">CREATE EVENT</a>
                </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-5">
    <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3 text-sm uppercase">ID</th>
            <th scope="col" class="px-6 py-3 text-sm uppercase">Name</th>
            <th scope="col" class="px-6 py-3 text-sm uppercase">Type</th>
            <th scope="col" class="px-6 py-3 text-sm uppercase">Description</th>
            <th scope="col" class="px-6 py-3 text-sm uppercase">Event start at</th>
            <th scope="col" class="px-6 py-3 text-sm uppercase">Published at</th>
            <th colspan=2></th>
        </tr>
        @foreach($events as $event)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4 text-sm">{{$event->id}}</td>
            <td class="px-6 py-4 text-sm">{{$event->name}}</td>
            <td class="px-6 py-4 text-sm">{{$event->type}}</td>
            <td class="px-6 py-4 text-sm">{{$event->desc}}</td>
            <td class="px-6 py-4 text-sm">{{$event->event_start_at}}</td>
            <td class="px-6 py-4 text-sm">{{$event->published_at}}</td>
            <td class="px-6 py-4 text-sm">
                <a href="{{route('events.edit', ['event' => $event])}}" class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded cursor-pointer">EDIT</a>
            </td>
            <td>
                <form method="post" action="{{route('events.delete', ['event' => $event])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 rounded cursor-pointer" value="DELETE">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
   
    </div>
    </div>
    </div>
</div>
</x-app-layout>