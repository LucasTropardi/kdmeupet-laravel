<x-app-layout>
    @section('title','Meus animais')
    @include('partials.bannertop')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4 mt-2 text-2xl text-center">Olá, <strong>{{ Auth::user()->name }}</strong>!</p>
                    <p class="text-xl text-center mb-4">Este é o seu painel de animais, onde você publica e acompanha registros para animais achados ou perdidos.</p>
                </div>
                <div class="px-6 text-gray-900 text-left">
                    <x-external-button route="animal.create" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700
                        hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium
                        rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                        Novo animal
                    </x-external-button>
                </div>

                <div class="px-6 py-2 text-gray-900 mb-2">
                    <div class="bg-gray-200 p-1 rounded-lg border border-gray-300 shadow-lg">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-700">
                                <thead class="text-xl text-gray-700 uppercase bg-gray-100">
                                    <tr class="hover:bg-gray-100">
                                        <th class="text-center">Situação</th>
                                        <th class="p-4">Nome</th>
                                        <th>Espécie</th>
                                        <th class="p-4">Raça</th>
                                        <th>Cor</th>
                                        <th>Tamanho</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($animais as $animal)
                                        <tr class="odd:bg-white even:bg-gray-100 border-b text-base font-medium">
                                            <td class="text-center">
                                                @if ($animal->anFinalizado !== 1)
                                                    {{ $animal->situacao->situacao }}
                                                @else
                                                    <div title="Publicação finalizada" class="grid justify-items-center p-1">
                                                        <div>
                                                            <img src="{{ asset('images/finalizado.png') }}" alt="Logo" width="28">
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="p-4">{{ $animal->anNome }}</td>
                                            <td>{{ $animal->especie->esNome }}</td>
                                            <td class="p-4">{{ $animal->raca->racaNome }}</td>
                                            <td>{{ $animal->cor->cor }}</td>
                                            <td>{{ $animal->tamanho->tamanho }}</td>
                                            <td class="text-center p-4 space-x-2">
                                                <a class="bg-white text-green-500 py-2 px-3 rounded border border-green-500 hover:bg-green-500 hover:text-white" href="{{ route('animal.show', $animal->id) }}" title="Visualizar">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                @if ($animal->anFinalizado !== 1)
                                                    <a href="#" title="Finalizar Publicação" class="finalizar-publicacao bg-white text-red-600 py-2 px-3 rounded border border-red-600 hover:bg-red-600 hover:text-white" data-animal-id="{{ $animal->id }}">
                                                        <i class="fa-regular fa-circle-check"></i>
                                                    </a>
                                                    <a class="bg-white text-blue-600 py-2 px-3 rounded border border-blue-600 hover:bg-blue-600 hover:text-white" href="{{ route('animal.edit', $animal->id) }}" title="Editar">
                                                        <i class="fa-solid fa-pencil"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="rounded px-7 mb-4">
                    {{ $animais->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Confirma finalização modal -->
    @include('partials.modals.modal-finalizar-publicacao')
</x-app-layout>
