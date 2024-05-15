<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
         @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Styles -->
        <style>
          
        </style>
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                    @endauth
                </div>
            @endif

            <div class="p-6 text-gray-900"> 
            <div class="row m-5">
   
    <form class="form-inline" method="GET">
    <div class="row">
    <div class="col">
      <label for="start-date" class="font-semibold text-xl text-gray-800 leading-tight">Published at from</label>
    </div>
    <div class="col">
      <input type="datetime-local" step="1" class="form-control" id="start_date" name="start_date" value="{{Request('start_date')}}">
            @error('start_date')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
    </div>
    <div class="col">
      <button type="submit" class="btn btn-primary py-2 px-4">Filter</button>
      <a href="{{ request()->url() }}" class="btn btn-primary py-2 px-4">All</a>
    </div>
    </div>
    </form>
    
  </div>
  <div class="row m-5">
   
  </div>

    <table class="table w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-5">
    <thead class="text-xs text-white bg-dark">
        <tr>
            <th scope="col" class="px-6 py-3 text-sm uppercase">ID</th>
            <th scope="col" class="px-6 py-3 text-sm uppercase">Name</th>
            <th scope="col" class="px-6 py-3 text-sm uppercase">Type</th>
            <th scope="col" class="px-6 py-3 text-sm uppercase">Description</th>
            <th scope="col" class="px-6 py-3 text-sm uppercase">Event start at</th>
            <th scope="col" class="px-6 py-3 text-sm uppercase">Published at</th>
        </tr>
        @foreach($events as $event)
        <tr class="bg-white text-dark border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4 text-sm">{{$event->id}}</td>
            <td class="px-6 py-4 text-sm">{{$event->name}}</td>
            <td class="px-6 py-4 text-sm">{{$event->type}}</td>
            <td class="px-6 py-4 text-sm">{{$event->desc}}</td>
            <td class="px-6 py-4 text-sm">{{$event->event_start_at}}</td>
            <td class="px-6 py-4 text-sm">
            @if(!empty($event->published_at))
                hozzáadva
                 @endif
            </td>
        </tr>
        @endforeach
    </table>
   
    </div>
        </div>
    </body>
</html>
