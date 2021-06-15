<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.2/main.css" integrity="sha256-RCJT6YvohmGy+rWQe3hpPZez8iaPnirFVfiwaBVCk1k=" crossorigin="anonymous">
        @livewireStyles
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- Scripts -->
       <script src="https://code.jquery.com/git/jquery-git.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.2/main.min.js" integrity="sha256-yirUYbNvdsLHfZcQDyDMB51pfQ0Mn8siGDZOvtBgCFw=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-dropdown')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')
        <script src="{{asset('js/calendar.js')}}" defer></script>
        @livewireScripts
    </body>
    <script>
        document.getElementById("moda").onclick = function() {
            bgChange()
        };

        function bgChange() {
            document.getElementById("modal").classList.toggle("hidden");
        }
    </script>
</html>