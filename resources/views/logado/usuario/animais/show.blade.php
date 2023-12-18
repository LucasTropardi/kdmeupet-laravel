<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Animal cadastrado') }}
        </h2>
    </x-slot>
    @section('title','Animal')
    @include('partials.bannertop')
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900" id="form-cadastrare">
                    <div class="flex flex-col items-center pt-2 sm:pt-0" id="div-cadastrar">
                        <div class="w-full sm:max-w-md mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mb-12" id="form-cadastrar">
                            <div>
                                <table class="table-auto w-full bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                                    <thead class="text-left bg-gray-100">
                                        <tr class="">
                                            <th>Atributos</th>
                                            <th>Dados</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr class="hover:bg-gray-100">
                                            <td>Situação</td>
                                            <td>{{ $animal->situacao->situacao }}</td>
                                        </tr>
                                        <tr class="hover:bg-gray-100">
                                            <td>Nome</td>
                                            <td>{{ $animal->anNome }}</td>
                                        </tr>
                                        <tr class="hover:bg-gray-100">
                                            <td>Espécie</td>
                                            <td>{{ $animal->especie->esNome }}</td>
                                        </tr>
                                        <tr class="hover:bg-gray-100">
                                            <td>Raça</td>
                                            <td>{{ $animal->raca->racaNome }}</td>
                                        </tr>
                                        <tr class="hover:bg-gray-100">
                                            <td>Cor</td>
                                            <td>{{ $animal->cor->cor }}</td>
                                        </tr>
                                        <tr class="hover:bg-gray-100">
                                            <td>Tamanho</td>
                                            <td>{{ $animal->tamanho->tamanho }}</td>
                                        </tr>
                                        <tr class="hover:bg-gray-100">
                                            <td>Contato</td>
                                            <td>{{ $animal->anContato }}</td>
                                        </tr>
                                        <tr class="hover:bg-gray-100">
                                            <td>Data</td>
                                            <td>{{ $dataCadastrada }}</td>
                                        </tr>
                                        <tr class="hover:bg-gray-100">
                                            <td>Publicação</td>
                                            @if ($animal->anFinalizado === 1)
                                                <td>Finalizada</td>
                                            @else
                                                <td>Ativa</td>
                                            @endif
                                        </tr>
                                        @can('level')
                                            <tr class="hover:bg-gray-100">
                                                <td>Usuário</td>
                                                <td>{{ $animal->user->name . ' ' . $animal->user->lastName }}</td>
                                            </tr>
                                        @endcan
                                    </tbody>
                                </table>
                                <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4">
                                    <p>Descrição</p>
                                    <p>{{ $animal->anDescricao }}</p>
                                </div>

                                <!-- foto -->
                                <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4">
                                    <img src="{{ asset('storage/uploads/animais/' . $animal->anFoto) }}" alt="Imagem do animal">
                                </div>

                                <!-- localização mapa -->
                                <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4">
                                    <div id="mapa" style="height: 400px;"></div>
                                </div>
                            </div>
                            <div class="text-right mt-6">
                                @if (Auth::user()->level === 'admin')
                                    <a href="{{ route('animal-gerenciador.index') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-600 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-1">Voltar</a>
                                @else
                                    <a href="{{ route('animal.index') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-600 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-1">Voltar</a>
                                @endif
                                <a href="{{ route('animal.edit', $animal->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Editar</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    @include('partials.js.js-mapa-show-animal')
</x-app-layout>

