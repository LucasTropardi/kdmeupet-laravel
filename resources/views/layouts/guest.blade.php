<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- Flowbite --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

        {{-- Leaflet css --}}
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>

        <!-- Leaflet js -->
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>

        <!-- Datepicker -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css">

        {{-- Ícones fontawesome --}}
        <script src="https://kit.fontawesome.com/352682b758.js" crossorigin="anonymous"></script>

        <!-- Scripts -->
        @vite([
            'resources/css/app.css',
            'resources/js/app.js',
            ])
    </head>
    <body class="font-sans antialiased bg-gray-100 relative">
        <!-- Gradient div com posicionamento absoluto -->
        <div class="bg-gradient-to-b to-blue-100 from-blue-600 absolute top-0 left-0 z-0 w-full h-full"></div>

        <div class="h-full relative z-10">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
                <div class="mb-4">
                    @include('layouts.navbar')
                </div>

                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-gray-100">
                        <div class="py-8">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                                    <div class="p-6 text-gray-900 mb-2">
                                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                            {{ $header }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>

        <script src="{{ asset('js/modals-logado.js') }}"></script>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js"></script>

        {{-- Flowbite --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    </body>

</html>
