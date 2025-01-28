<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
{{-- Flash Messages --}}
@include('partials.flash')

{{-- Header --}}
@include('partials.header')

<main class="flex p-4">
    @if (!isset($noSidebar) || !$noSidebar)
        <aside class="hidden md:block w-1/4 bg-gray-200 dark:bg-gray-800 p-2">
            @yield('sidebar')
        </aside>
    @endif
    <div class="w-full">
        @yield('content')
    </div>
</main>

<footer>
    @include('partials.footer')
</footer>
</body>
</html>
