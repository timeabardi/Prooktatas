<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   {{-- <title>Products | @php config('app.name') @endphp</title>--}}
   <title>Products | {{ config('app.name') }}</title>
</head>
<body>
  @yield('content')
</body>
</html>