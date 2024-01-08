<x-guest-layout>
    @section('title','Home')
    @include('partials.bannertop')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Achados") }}
                </div>
            </div>
            <div class="mt-4 grid grid-cols-3 gap-4">
                @foreach ($achados as $achado)
                    <div class="overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg bg-white p-6 text-gray-900 fixed-show-div">
                        <p class="mb-4 text-center"><strong>{{ $achado->anNome }}</strong></p>
                        <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4 fixed-image">
                            <img src="{{ asset('storage/uploads/animais/' . $achado->anFoto) }}" alt="Imagem do animal">
                        </div>
                        <p class="mt-4 text-center"><strong>{{ $achado->especie->esNome }}</strong></p>
                        <a href="{{ route('ver.animal', $achado->id) }}"><p class="text-right">Detalhes<i class="fa-regular fa-square-plus ml-2"></i></p></a>
                    </div>
                @endforeach
                <a href="{{ route('achados') }}">
                    <div class="overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg bg-white p-6 text-gray-900 fixed-show-div col-span-2" >
                        <p class="mb-4 text-center"><strong>Ver Mais</strong></p>
                        <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4 fixed-image">
                            <img src="{{ asset('storage/ver-mais-2.png') }}" alt="Ver mais">
                        </div>
                        <p class="mt-4 text-center"><strong>Ver Mais</strong></p>
                        {{-- <a href=""><p class="text-right">Detalhes<i class="fa-regular fa-square-plus ml-2"></i></p></a> --}}
                    </div>
                </a>
            </div>
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900">
                    {{ __("Perdidos") }}
                </div>
            </div>
            <div class="mt-4 grid grid-cols-3 gap-4">
                @foreach ($perdidos as $perdido)
                    <div class="overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg bg-white p-6 text-gray-900 fixed-show-div">
                        <p class="mb-4 text-center"><strong>{{ $perdido->anNome }}</strong></p>
                        <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4 fixed-image">
                            <img src="{{ asset('storage/uploads/animais/' . $perdido->anFoto) }}" alt="Imagem do animal">
                        </div>
                        <p class="mt-4 text-center"><strong>{{ $perdido->especie->esNome }}</strong></p>
                        <a href="{{ route('ver.animal', $perdido->id) }}"><p class="text-right">Detalhes<i class="fa-regular fa-square-plus ml-2"></i></p></a>
                    </div>
                @endforeach
                <a href="{{ route('perdidos') }}">
                    <div class="overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg bg-white p-6 text-gray-900 fixed-show-div">
                        <p class="mb-4 text-center"><strong>Ver Mais</strong></p>
                        <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4 fixed-image">
                            <img src="{{ asset('storage/ver-mais-2.png') }}" alt="Ver mais">
                        </div>
                        <p class="mt-4 text-center"><strong>Ver Mais</strong></p>
                        {{-- <a href=""><p class="text-right">Detalhes<i class="fa-regular fa-square-plus ml-2"></i></p></a> --}}
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
