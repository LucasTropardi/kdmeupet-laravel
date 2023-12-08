<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Espécies') }}
        </h2>
    </x-slot>
    @section('title','Espécies')
    @include('partials.bannertop')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá, <strong>{{ Auth::user()->name }}</strong>!</p>
                </div>
                <div class="p-6 text-gray-900">
                    <x-external-button route="especie.create" class="butao text-white">Nova Espécie</x-external-button>
                </div>

                <div class="p-6 text-gray-900">
                    <div class="rounded p-2 mb-4">
                        {{ $especies->links() }}
                    </div>
                    <table class="table-auto w-full">
                        <thead class="bg-gray-100 text-left">
                            <tr class="hover:bg-gray-100">
                                <th class="p-2">Espécie</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($especies as $especie)
                                <tr class="p2 hover:bg-gray-100">
                                    <td class="p-2">{{ ($especie->esNome) }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('especie.show', $especie->id) }}">
                                            <i class="fa-solid fa-eye" title="Visualizar"></i>
                                        </a>
                                        <a href="{{ route('especie.edit', $especie->id) }}">
                                            <i class="fa-solid fa-pen-to-square ml-1 mr-1" title="Editar"></i>
                                        </a>
                                        <a href="{{ route('confirma.delete.especie', ['id' => $especie->id]) }}">
                                            <i class="fa-regular fa-trash-can" title="Excluir"></i>
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
</x-app-layout>
