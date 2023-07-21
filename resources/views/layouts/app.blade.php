<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>

    @yield('style')

</head>

<body>
    <div class="">
        @if (session()->has('success'))
            <p>{{ session('success') }}</p>
        @endif
    </div>
    <h1>@yield('title')</h1>
    <div>@yield('content')</div>
</body>

</html>
