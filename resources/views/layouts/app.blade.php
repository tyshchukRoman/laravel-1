<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title') - Task List App</title>
    </head>

    <body>
        <h1>@yield('title')</h1>

        <main class="main">
            @if (session()->has('success'))
                {{ session('success') }}
            @endif

            @yield('content')
        </main>
    </body>
</html>
