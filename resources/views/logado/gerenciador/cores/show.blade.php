<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Cores') }}
        </h2>
    </x-slot>
    @section('title','Cor')
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
                            Cor: <strong>{{ $cor->cor }}</strong>
                        </p>
                        <p class="mb-4">
                            Id da cor no banco de dados: <strong>{{ $cor->id }}</strong>
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('cor.index') }}" class="bg-blue-800 text-white py-2 px-3 rounded hover:bg-blue-900">Cores</a>
                        <a href="{{ route('cor.edit', $cor->id) }}" class="bg-orange-500 text-white py-2 px-3 rounded hover:bg-orange-700 ml-1">Editar</a>
                        <a href="#" class="excluir-cor bg-red-500 text-white py-2 px-3 rounded hover:bg-red-700 ml-1" data-cor-id="{{ $cor->id }}">Excluir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.modals.modal-excluir-cor')
    @include('partials.js.js-modal-excluir-cor')
</x-app-layout>

