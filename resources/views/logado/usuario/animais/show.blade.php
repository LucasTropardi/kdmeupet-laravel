<x-app-layout>
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
                                            @if ($animal->anFinalizado == 1)
                                                <td>Finalizada</td>
                                            @else
                                                <td>Ativa</td>
                                            @endif
                                        </tr>
                                        @if ($animal->user_id !== Auth::user()->id)
                                            <tr class="hover:bg-gray-100">
                                                <td>Cadastrado por</td>
                                                <td>{{ $animal->user->name . ' ' . $animal->user->lastName }}</td>
                                            </tr>
                                        @endif

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
                            {{-- Mensagem --}}
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4 p-2">
                                <p class="mb-4 text-xl text-center">Mensagens</p>
                                @foreach ($mensagens as $mensagem)
                                    <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4 p-2">
                                        <p class="mt-2"><strong>{{ $mensagem->user->name . ' ' . $mensagem->user->lastName }}</strong> em {{ Carbon\Carbon::parse($mensagem->dataMensagem)->format('d/m/Y \à\s H:i') }}</p>
                                        <p class="mt-4 mb-4">{{ $mensagem->conteudoMensagem }}</p>
                                        @if ($animal->user_id === Auth::user()->id || Auth::user()->level === 'admin' || Auth::user()->id === $mensagem->user_id)
                                            <div class="text-right p-2">
                                                @if ($mensagem->user_id === Auth::user()->id || Auth::user()->level === 'admin')
                                                    <button class="fa-regular fa-pen-to-square" title="Editar" onclick="mostrarEdicao(this, {{ $mensagem->id }})"></button>
                                                @endif
                                                <button class="fa-regular fa-trash-can" title="Excluir" onclick="mostrarDelete(this, {{ $mensagem->id }})"></span>
                                            </div>
                                            <div class="p-2 hidden" id="edicao-{{ $mensagem->id }}">
                                                <form action="{{ route('atualizar.mensagem', $mensagem) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div>
                                                        {{-- Mensagem --}}
                                                        <x-input-label for="conteudoMensagem" :value="__('Escreva uma mensagem')" />
                                                        <x-textarea-input class="w-full block mt-1" rows="4" id="conteudoMensagem" type="text" name="conteudoMensagem" :value="old('conteudoMensagem')" autocomplete="conteudoMensagem">{{ $mensagem->conteudoMensagem }}</x-textarea-input>
                                                    </div>
                                                    <div class="flex items-center justify-end mt-2">
                                                        <x-primary-button type="submit" class="butao hover:bg-blue-900" >
                                                            {{ __('Enviar') }}
                                                        </x-primary-button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="p-2 hidden" id="delete-{{ $mensagem->id }}">
                                                <form action="{{ route('apagar.mensagem', $mensagem) }}" method="post">
                                                    @csrf
                                                    @method('Delete')
                                                    <div>
                                                        {{-- Mensagem --}}
                                                        <p class="p-2 mb-2">Tem certeza que deseja excluir esta mensagem?</p>                                                    </div>
                                                    <div class="flex items-center justify-end mt-2">
                                                        <button type="button" class="bg-green-500 hover:bg-green-700 text-white rounded py-1 px-2 mr-2" onclick="cancelarDelete({{ $mensagem->id }})">
                                                            {{ __('Cancelar') }}
                                                        </button>
                                                        <x-primary-button type="submit" class="bg-red-500 hover:bg-red-700 " >
                                                            {{ __('Excluir') }}
                                                        </x-primary-button>
                                                    </div>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                                @if ($countMsg > 5)
                                    <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4">
                                        {{ $mensagens->links() }}
                                    </div>
                                @endif
                            </div>
                            @if ($animal->anFinalizado == 0)
                                <form action="{{ route('salvar.mensagem') }}" method="POST">
                                    @csrf
                                    <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4">
                                        <!-- User -->
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                        <!-- User -->
                                        <input type="hidden" name="animal_id" value="{{ $animal->id }}">

                                        {{-- Mensagem --}}
                                        <x-input-label for="conteudoMensagem" :value="__('Escreva uma mensagem')" />
                                        <x-textarea-input class="w-full block mt-1" rows="4" id="conteudoMensagem" type="text" name="conteudoMensagem" :value="old('conteudoMensagem')" autocomplete="conteudoMensagem"></x-textarea-input>
                                    </div>
                                    <div class="flex items-center justify-end mt-2">
                                        <x-primary-button type="submit" class="butao hover:bg-blue-900" >
                                            {{ __('Enviar') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            @endif
                            <div class="text-right mt-6">
                                @if (Auth::user()->level === 'admin')
                                    <a href="{{ route('animal-gerenciador.index') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-600 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-1">Voltar</a>
                                @else
                                    @if ($animal->user_id === Auth::user()->id)
                                        <a href="{{ route('animal.index') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-600 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-1">Voltar</a>
                                    @else
                                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-600 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-1">Voltar</a>
                                    @endif
                                @endif
                                @if ((Auth::user()->id === $animal->user_id) || (Auth::user()->level === 'admin'))
                                    <a href="{{ route('animal.edit', $animal->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Editar</a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    @include('partials.js.js-mapa-show-animal')
    <script src="{{ asset('js/show-animal-msg.js') }}"></script>
</x-app-layout>

