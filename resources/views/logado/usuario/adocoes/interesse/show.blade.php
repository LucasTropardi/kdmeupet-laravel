<x-app-layout>
    <div><br></div>
    @section('title','Interessado em adotar')
    @include('partials.bannertop')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900" id="form-cadastrare">
                    <div class="flex flex-col items-center pt-2 sm:pt-0" id="div-cadastrar">
                        <div class="w-full sm:max-w-md mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mb-12" id="form-cadastrar">
                            <div>
                                <table class="table-auto w-full bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                                    <thead class="text-left bg-gray-100">
                                        <tr class="">
                                            <th class="p-2">Atributos</th>
                                            <th>Dados</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr class="hover:bg-gray-100">
                                            <td class="p-2">Situação</td>
                                            @if ($interesse->adiFinalizado == 1)
                                                <td>Finalizado</td>
                                            @else
                                                <td>Pendente</td>
                                            @endif
                                        </tr>
                                        <tr class="hover:bg-gray-100">
                                            <td class="p-2">Data de cadastro</td>
                                            <td>{{ $dataCadastrada }}</td>
                                        </tr>
                                        <tr class="hover:bg-gray-100">
                                            <td class="p-2">Usuário interessado</td>
                                            <td>{{ $interesse->user->name . ' ' . $interesse->user->lastName }}</td>
                                        </tr>
                                        <tr class="hover:bg-gray-100">
                                            <td class="p-2">Contato</td>
                                            <td>{{ $interesse->adiContato }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4 p-2">
                                    <p class="mb-4">Mensagem do interessado</p>
                                    <p>{{ $interesse->adiMensagem }}</p>
                                </div>
                                @if ($interesse->adiFinalizado == 1)
                                    <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4 p-2">
                                        <p class="mb-4">Finalização em {{ Carbon\Carbon::parse($interesse->adiDataResposta)->format('d/m/Y') }}</p>
                                        <p>{{ $interesse->adiResposta }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="text-right mt-6">
                                @if (Auth::user()->level === 'admin' || $interesse->adocao->user_id === Auth::user()->id)
                                    <a href="{{ route('adocao.interesse.index', $interesse->adocao_id) }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-600 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-1">Voltar</a>
                                @else
                                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-600 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-1">Voltar</a>
                                @endif
                                @if (((Auth::user()->id === $interesse->user_id) && ($interesse->adiFinalizado == 0)) || (Auth::user()->level === 'admin'))
                                    <a href="{{ route('adocao.interesse.edit', $interesse) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Editar</a>
                                @endif
                                @if ($interesse->adiFinalizado == 0)
                                    @if ((Auth::user()->id === $interesse->user_id) || (Auth::user()->level === 'admin') || (Auth::user()->id === $interesse->adocao->user_id))
                                        <a href="{{ route('adocao.interesse.finalizar', $interesse) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Finalizar</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>

