<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title') - Task List App</title>
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn {
            @apply rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700 hover:bg-slate-50
        }

        .link {
            @apply font-medium text-gray-700 underline decoration-pink-500
        }

        .flash-message {
            @apply relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700
        }
    </style>
    {{-- blade-formatter-enable --}}

    <body class="container mx-auto mt-10 mb-10 max-w-lg">
        <h1 class="mb-4 text-2xl">@yield('title')</h1>

        <main class="main">

            @if (session()->has('success'))
                <div x-data="{ isOpen: true }">
                    <div class="flash-message" role="alert" x-show="isOpen">
                        <strong>Success</strong> {{ session('success') }}
                        <button class="absolute top-2 right-2" @click="isOpen = false">X</button>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </body>
</html>
