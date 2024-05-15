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
                <div style="width:100%;text-align:right">
        <a class="btn btn-success py-1 px-4 cursor-pointer" href="{{route('events.restoreall')}}">RESTORE ALL</a>    
    </div>
    <table class="table w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-5 mb-5">
    <thead class="text-xs text-white bg-dark">
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
        <tr class="bg-white text-dark border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4 text-sm">{{$event->id}}</td>
            <td class="px-6 py-4 text-sm">{{$event->name}}</td>
            <td class="px-6 py-4 text-sm">{{$event->type}}</td>
            <td class="px-6 py-4 text-sm">{{$event->desc}}</td>
            <td class="px-6 py-4 text-sm">{{$event->event_start_at}}</td>
            <td class="px-6 py-4 text-sm">{{$event->published_at}}</td>
            <td>
            <button type="submit" class="btn btn-success py-1 px-4 cursor-pointer" onclick="window.location='{{route('events.restore', ['event' => $event])}}'">RESTORE</button>
            </td>
            <td>
                <form method="post" action="{{route('events.force_delete', ['event' => $event])}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger py-1 px-4 cursor-pointer">FORCE DELETE</button>
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