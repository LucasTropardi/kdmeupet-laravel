<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meus animais') }}
        </h2>
    </x-slot>
    @section('title','Meus animais')
    @include('partials.bannertop')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá, <strong>{{ Auth::user()->name }}</strong>!</p>
                </div>
                <div class="p-6 text-gray-900">
                    <x-external-button route="animal.create" class="butao text-white">Novo animal</x-external-button>
                </div>
            </div>
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg p-6 text-gray-900 mt-4">
                <div class="p-3 bg-white rounded-lg mb-4">
                    {{ $animais->links() }}
                </div>
                <table class="table-auto w-full bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                    <thead class="text-left bg-gray-100">
                        <tr>
                            <th class="text-center">Situação</th>
                            <th class="p-2">Usuário</th>
                            <th>Espécie</th>
                            <th>Raça</th>
                            <th>Cor</th>
                            <th>Tamanho</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($animais as $animal)
                            <tr class="hover:bg-gray-100">
                                @php

                                @endphp
                                <td class="text-center">
                                    @if ($animal->anFinalizado !== 1)
                                        {{ $animal->situacao->situacao }}
                                    @else
                                        <i class="fa-solid fa-circle-check" title="Publicação finalizada"></i>
                                    @endif
                                </td>
                                <td class="p-2">{{ $animal->user->name . ' ' . $animal->user->lastName }}</td>
                                <td>{{ $animal->especie->esNome }}</td>
                                <td>{{ $animal->raca->racaNome }}</td>
                                <td>{{ $animal->cor->cor }}</td>
                                <td>{{ $animal->tamanho->tamanho }}</td>
                                <td class="text-center">
                                    <a href="{{ route('animal.show', $animal->id) }}" title="Visualizar"><i class="fa-solid fa-magnifying-glass m-2"></i></a>
                                    @if ($animal->anFinalizado !== 1)
                                        <a href="#" title="Finalizar Publicação" class="finalizar-publicacao" data-animal-id="{{ $animal->id }}"><i class="fa-regular fa-circle-check m-2"></i></a>
                                    @else
                                        <a href="#" title="Reativar Publicação" class="reativar-publicacao" data-animal-id="{{ $animal->id }}"><i class="fa-solid fa-rotate-left m-2"></i></a>
                                    @endif
                                    <a href="{{ route('animal.edit', $animal->id) }}" title="Editar"><i class="fa-regular fa-pen-to-square m-2"></i></a>
                                    <a href="#" title="Excluir animal" class="excluir-animal" data-animal-id="{{ $animal->id }}"><i class="fa-regular fa-trash-can m-2"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Janelas modal -->
    @include('partials.modals.modal-finalizar-publicacao')
    @include('partials.modals.modal-reativar-publicacao')
    @include('partials.modals.modal-confirma-delete-animal')
</x-app-layout>
