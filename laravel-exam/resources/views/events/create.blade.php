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
    <form method="POST" action="{{ route('events.store') }}">
        @csrf
        @method('post')
        <div>
            <label>Name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label>Type</label>
            <input type="text" name="type">
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="desc">
        </div>
        <div>
            <label>Event start at</label>
            <input type="text" name="event_start_at">
        </div>
        <div>
            <label>Published at</label>
            <input type="text" name="published_at">
        </div>
        <div>
            <input type="submit" value="save a new event">
        </div>
    </form>
</body>
</html>