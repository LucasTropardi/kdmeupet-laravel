<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Parceria cadastrada') }}
        </h2>
    </x-slot>
    @section('title','Parceria')
    @include('partials.bannertop')
    <div class="py-8">
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
                                            <td>
                                                @if ($parceria->parFinalizado == 1)
                                                    Finalizada
                                                @else
                                                    Ativa
                                                @endif
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100">
                                            <td>Aprovação</td>
                                            <td>
                                                @if ($parceria->parAprovado == 1)
                                                    Aprovado
                                                @else
                                                    Em análise
                                                @endif
                                            </td>
                                        </tr>
                                        @if (Auth::user()->level === 'admin')
                                            <tr class="hover:bg-gray-100">
                                                <td>Cadastrado por</td>
                                                <td>{{ $parceria->user->name . ' ' . $parceria->user->lastName }}</td>
                                            </tr>
                                        @endif
                                        <tr class="hover:bg-gray-100">
                                            <td>Data de cadastro</td>
                                            <td>{{ $dataCadastrada }}</td>
                                        </tr>
                                        <tr class="hover:bg-gray-100">
                                            <td>Nome</td>
                                            <td>{{ $parceria->parNome }}</td>
                                        </tr>
                                        <tr class="hover:bg-gray-100">
                                            <td>E-mail</td>
                                            <td>{{ $parceria->parEmail }}</td>
                                        </tr>
                                        <tr class="hover:bg-gray-100">
                                            <td>Telefone</td>
                                            <td>{{ $parceria->parTelefone }}</td>
                                        </tr>
                                        <tr class="hover:bg-gray-100">
                                            <td>Endereço</td>
                                            <td>{{ $parceria->parEndereco }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Descrição -->
                                <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4">
                                    <p>Descrição</p>
                                    <p>{{ $parceria->parDescricao }}</p>
                                </div>

                                <!-- Mensagem -->
                                <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4">
                                    <p>Mensagem</p>
                                    <p>{{ $parceria->parMensagem }}</p>
                                </div>

                                <!-- foto -->
                                <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4">
                                    <img src="{{ asset('storage/uploads/parcerias/' . $parceria->parImagem) }}" alt="Imagem da parceria">
                                </div>

                            </div>


                            <div class="text-right mt-6">
                                @if (Auth::user()->level === 'admin')
                                    <a href="{{ route('parceria.gerenciador') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-600 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-1">Voltar</a>
                                @else
                                    <a href="{{ route('parceria.index') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-600 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-1">Voltar</a>
                                @endif
                                <a href="{{ route('parceria.editar', $parceria->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Editar</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>

