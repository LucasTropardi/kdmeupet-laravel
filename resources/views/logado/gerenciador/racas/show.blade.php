<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes da raça') }}
        </h2>
    </x-slot>
    @section('title','Raça')
    @include('partials.bannertop')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="bg-gray-100 rounded">
                        <p class="mb-4">Olá, <strong>{{ Auth::user()->name }}</strong>, veja os detalhes deste registro.</p>
                    </div>
                    <div>
                        <p class="mb-4">
                            Espécie: <strong>{{ $raca->especie->esNome }}</strong>
                        </p>
                        <p class="mb-4">
                            Raça: <strong>{{ $raca->racaNome }}</strong>
                        </p>
                        <p class="mb-4">
                            Id da raça no banco de dados: <strong>{{ $raca->id }}</strong>
                        </p>
                        <p class="mb-4">
                            Usuário que cadastrou: <strong>{{ $raca->user->name }}</strong>
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('raca.index') }}" class="bg-blue-800 text-white py-2 px-3 rounded hover:bg-blue-900">Raças</a>
                        <a href="{{ route('raca.edit', $raca->id) }}" class="bg-orange-500 text-white py-2 px-3 rounded hover:bg-orange-700 ml-1">Editar</a>
                        <a href="{{ route('confirma.delete.raca', $raca->id) }}" class="bg-red-500 text-white py-2 px-3 rounded hover:bg-red-700 ml-1">Excluir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

