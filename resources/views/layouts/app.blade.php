<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title') - Task List App</title>
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    </head>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn {
            @apply rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700 hover:bg-slate-50
        }

        .link {
            @apply font-medium text-gray-700 underline decoration-pink-500
        }
    </style>
    {{-- blade-formatter-enable --}}

    <body class="container mx-auto mt-10 mb-10 max-w-lg">
        <h1 class="mb-4 text-2xl">@yield('title')</h1>

        <main class="main">
            @if (session()->has('success'))
                {{ session('success') }}
            @endif

            @yield('content')
        </main>
    </body>
</html>
