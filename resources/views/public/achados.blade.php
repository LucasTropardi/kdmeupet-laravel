<x-guest-layout>
    @section('title','Achados')
    @include('partials.bannertop')

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 mb-2">
                    <p class="mb-4">Achou, miseravi!</p>
                </div>
            </div>
            <div class="mt-4 grid grid-cols-3 gap-4">
                @foreach ($animais as $animal)
                    <div class="overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg bg-white p-6 text-gray-900 fixed-show-div">
                        <p class="mb-4 text-center"><strong>{{ $animal->anNome }}</strong></p>
                        <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4 fixed-image">
                            <img src="{{ asset('storage/uploads/animais/' . $animal->anFoto) }}" alt="Imagem do animal">
                        </div>
                        <p class="mt-4 text-center"><strong>{{ $animal->especie->esNome }}</strong></p>
                        <a href="{{ route('ver.animal', $animal->id) }}"><p class="text-right">Detalhes<i class="fa-regular fa-square-plus ml-2"></i></p></a>
                    </div>
                @endforeach
            </div>
            @if ($countAnimais > 9)
                <div class="p-3 bg-gray-100 rounded-lg mb-4 text-right">
                    {{ $animais->links() }}
                </div>
            @endif
        </div>
    </div>
</x-guest-layout>
