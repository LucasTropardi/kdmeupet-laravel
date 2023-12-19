<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Localizações dos pets') }}
        </h2>
    </x-slot>
    @section('title','Localizações')
    @include('partials.bannertop')

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 mb-2">
                    <p class="mb-1 text-gray-900 text-xl">Aqui você visualiza de maneira geral as localizações dos animais postados
                        em nosso site, sendo que os ícones verdes representam animais encontrados e os vermelhos
                        animais perdidos!</p>
                </div>
                <div class="p-6 text-gray-900 mb-2">
                    <div id="map" class="overflow-hidden border border-gray-300 shadow-lg sm:rounded-lg">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Leaflet js -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

    {{-- Mapa provisório --}}
    @include('partials.js.js-mapa-cadastro')
</x-guest-layout>
