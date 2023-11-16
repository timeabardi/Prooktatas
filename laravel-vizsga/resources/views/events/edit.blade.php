<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create event</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="POST" action="{{ route('events.update', ['event' => $event]) }}">
        @csrf
        @method('put')
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{$event->name}}">
        </div>
        <div>
            <label>Type</label>
            <input type="text" name="type" value="{{$event->type}}">
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="desc" value="{{$event->desc}}">
        </div>
        <div>
            <label>Event start at</label>
            <input type="text" name="event_start_at" value="{{$event->event_start_at}}">
        </div>
        <div>
            <label>Published at</label>
            <input type="text" name="published_at" value="{{$event->published_at}}">
        </div>
        <div>
            <input type="submit" value="Update">
        </div>
    </form>
</body>
</html>