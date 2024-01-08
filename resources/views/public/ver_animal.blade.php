<x-guest-layout>
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
                                            <td>Postado por</td>
                                            <td>{{ $animal->user->name . ' ' . $animal->user->lastName }}</td>
                                        </tr>
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
                                <!-- div para os comentários -->
                                <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4">
                                    <p class="mb-2 text-xl text-center">Mensagens</p>
                                    <p class="text-center">É necessário estar logado para escrever uma mensagem.</p>
                                    @foreach ($mensagens as $mensagem)
                                        <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4">
                                            <p class="mt-2"><strong>{{ $mensagem->user->name . ' ' . $mensagem->user->lastName }}</strong> em {{ Carbon\Carbon::parse($mensagem->dataMensagem)->format('d/m/Y \à\s H:i') }}</p>
                                            <p class="mt-4">{{ $mensagem->conteudoMensagem }}</p>
                                        </div>
                                    @endforeach
                                    @if ($countMsg > 5)
                                        <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4">
                                            {{ $mensagens->links() }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    @include('partials.js.js-mapa-show-animal')
</x-guest-layout>

