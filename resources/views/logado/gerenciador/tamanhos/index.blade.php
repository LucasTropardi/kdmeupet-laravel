<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Tamanhos') }}
        </h2>
    </x-slot>
    @section('title','Tamanhos')
    @include('partials.bannertop')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá, <strong>{{ Auth::user()->name }}</strong>!</p>
                </div>
                <div class="p-6 text-gray-900">
                    <x-external-button route="tamanho.create" class="butao text-white">Novo Tamanho</x-external-button>
                </div>

                <div class="p-6 text-gray-900">
                    <div class="rounded p-2 mb-4">
                        {{ $tamanhos->links() }}
                    </div>
                    <table class="table-auto w-full">
                        <thead class="bg-gray-100 text-left">
                            <tr class="hover:bg-gray-100">
                                <th class="p-2">Tamanho</th>
                                <th>Espécie</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tamanhos as $tamanho)
                                <tr class="p2 hover:bg-gray-100">
                                    <td class="p-2">{{ ($tamanho->tamanho) }}</td>
                                    <td>{{ $tamanho->especie->esNome }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('tamanho.show', $tamanho->id) }}">
                                            <i class="fa-solid fa-eye" title="Visualizar"></i>
                                        </a>
                                        <a href="{{ route('tamanho.edit', $tamanho->id) }}">
                                            <i class="fa-solid fa-pen-to-square ml-1 mr-1" title="Editar"></i>
                                        </a>
                                        <a href="#" title="Excluir" class="excluir-tamanho" data-tamanho-id="{{ $tamanho->id }}">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    @include('partials.modals.modal-excluir-tamanho')
    @include('partials.js.js-modal-excluir-tamanho')
</x-app-layout>
