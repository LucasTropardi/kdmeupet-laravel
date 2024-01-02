<x-app-layout>
    <div><br></div>
    @section('title','Animal para adoção')
    @include('partials.bannertop')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900" id="form-cadastrare">
                    <div>
                        <!-- Nome -->
                        <div class="bg-white overflow-hidden sm:rounded-lg mt-4 p-2 text-center">
                            <h3 class="text-3xl text-gray-900 font-semibold">{{ $adocao->adNome }}</h3>
                        </div>

                        <!-- foto -->
                        <div class="max-w-5xl mx-auto bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4">
                            <img src="{{ asset('storage/uploads/adocoes/' . $adocao->adImagem) }}" alt="Imagem do animal">
                        </div>

                        <!-- Descrição -->
                        <div class="max-w-5xl mx-auto bg-white overflow-hidden border border-gray-300 sm:rounded-lg mt-4 p-2 mb-4">
                            <p class="mb-4">Descrição</p>
                            <p class="text-xl text-gray-900 font-normal">{{ $adocao->adDescricao }}</p>
                        </div>

                        <div class="max-w-5xl mx-auto">
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-900">
                                    <thead class="text-lg text-gray-900 uppercase bg-gray-300">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">Características</th>
                                            <th scope="col" class="px-6 py-3">Dados</th>
                                        </tr>
                                    </thead>

                                    <tbody class="text-lg">
                                        <tr scope="row" class="odd:bg-white even:bg-gray-100 border-b">
                                            <td scope="col" class="px-6 py-3">Situação</td>
                                            @if ($adocao->adFinalizado == 1)
                                                <td scope="col" class="px-6 py-3">Publicação finalizada</td>
                                            @else
                                                <td scope="col" class="px-6 py-3">Disponível</td>
                                            @endif
                                        </tr>
                                        <tr scope="row" class="odd:bg-white even:bg-gray-100 border-b">
                                            <td scope="col" class="px-6 py-3">Data de cadastro</td>
                                            <td scope="col" class="px-6 py-3">{{ $dataCadastrada }}</td>
                                        </tr>
                                        <tr scope="row" class="odd:bg-white even:bg-gray-100 border-b">
                                            <td scope="col" class="px-6 py-3">Espécie</td>
                                            <td scope="col" class="px-6 py-3">{{ $adocao->especie->esNome }}</td>
                                        </tr>
                                        <tr scope="row" class="odd:bg-white even:bg-gray-100 border-b">
                                            <td scope="col" class="px-6 py-3">Raça</td>
                                            <td scope="col" class="px-6 py-3">{{ $adocao->raca->racaNome }}</td>
                                        </tr>
                                        <tr scope="row" class="odd:bg-white even:bg-gray-100 border-b">
                                            <td scope="col" class="px-6 py-3">Cor</td>
                                            <td scope="col" class="px-6 py-3">{{ $adocao->cor->cor }}</td>
                                        </tr>
                                        <tr scope="row" class="odd:bg-white even:bg-gray-100 border-b">
                                            <td scope="col" class="px-6 py-3">Tamanho</td>
                                            <td scope="col" class="px-6 py-3">{{ $adocao->tamanho->tamanho }}</td>
                                        </tr>
                                        <tr scope="row" class="odd:bg-white even:bg-gray-100 border-b">
                                            <td scope="col" class="px-6 py-3">Idade</td>
                                            <td scope="col" class="px-6 py-3">{{ $adocao->adIdade }}</td>
                                        </tr>
                                        <tr scope="row" class="odd:bg-white even:bg-gray-100 border-b">
                                            <td scope="col" class="px-6 py-3">Contato</td>
                                            <td scope="col" class="px-6 py-3">{{ $adocao->adContato }}</td>
                                        </tr>
                                        <tr scope="row" class="odd:bg-white even:bg-gray-100 border-b">
                                            <td scope="col" class="px-6 py-3">Endereço</td>
                                            <td scope="col" class="px-6 py-3">{{ $adocao->adEndereco }}</td>
                                        </tr>
                                        <tr scope="row" class="odd:bg-white even:bg-gray-100 border-b">
                                            <td scope="col" class="px-6 py-3">Cadastrado por</td>
                                            <td scope="col" class="px-6 py-3">{{ $adocao->user->name . ' ' . $adocao->user->lastName }}</td>
                                        </tr>
                                        <tr scope="row" class="odd:bg-white even:bg-gray-100 border-b">
                                            <td scope="col" class="px-6 py-3">E-mail</td>
                                            <td scope="col" class="px-6 py-3">{{ $adocao->user->email }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="max-w-5xl mx-auto">
                            @if ($adocao->adFinalizado == 1 && $adocao->adComentario)
                                <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4 p-2">
                                    <p>Comentário ao finalizar</p><br>
                                    <p>{{ $adocao->adComentario }}</p>
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="max-w-5xl mx-auto">
                        <!-- Mensagem -->
                        @if ($countMsg > 0)
                            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4 p-2">
                                <p class="mb-4 text-xl text-center">Mensagens</p>
                                @foreach ($mensagens as $mensagem)
                                    <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-4 p-2">
                                        <p class="mt-2"><strong>{{ $mensagem->user->name . ' ' . $mensagem->user->lastName }}</strong> em {{ Carbon\Carbon::parse($mensagem->admData)->format('d/m/Y \à\s H:i') }}</p>
                                        <p class="mt-4 mb-4">{{ $mensagem->admConteudo }}</p>
                                        @if ($adocao->user_id === Auth::user()->id || Auth::user()->level === 'admin' || Auth::user()->id === $mensagem->user_id)
                                            <div class="text-right p-2">
                                                @if ($mensagem->user_id === Auth::user()->id || Auth::user()->level === 'admin')
                                                    <button class="fa-regular fa-pen-to-square" title="Editar" onclick="mostrarEdicao(this, {{ $mensagem->id }})"></button>
                                                @endif
                                                <button class="fa-regular fa-trash-can" title="Excluir" onclick="mostrarDelete(this, {{ $mensagem->id }})"></span>
                                            </div>
                                            <div class="p-2 hidden" id="edicao-{{ $mensagem->id }}">
                                                <form action="{{ route('atualizar.mensagem.adocao', $mensagem) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div>
                                                        <!-- Mensagem -->
                                                        <x-input-label for="admConteudo" :value="__('Atualize a mensagem')" />
                                                        <x-textarea-input class="w-full block mt-1" rows="4" id="admConteudo" type="text" name="admConteudo" :value="old('admConteudo')" autocomplete="admConteudo">{{ $mensagem->admConteudo }}</x-textarea-input>
                                                    </div>
                                                    <div class="flex items-center justify-end mt-2">
                                                        <x-primary-button type="submit" class="butao hover:bg-blue-900" >
                                                            {{ __('Enviar') }}
                                                        </x-primary-button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="p-2 hidden" id="delete-{{ $mensagem->id }}">
                                                <form action="{{ route('apagar.mensagem.adocao', $mensagem) }}" method="post">
                                                    @csrf
                                                    @method('Delete')
                                                    <div>
                                                        <!-- Mensagem -->
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
                        @endif
                    </div>
                    @if ($adocao->adFinalizado == 0)
                        <form action="{{ route('salvar.mensagem.adocao') }}" method="POST" class="max-w-5xl mx-auto">
                            @csrf
                            <div class="mb-4 border border-gray-200 rounded-lg bg-gray-100 mt-4">
                                <div class="px-4 py-2 bg-white rounded-t-lg">
                                    <!-- User -->
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                    <!-- User -->
                                    <input type="hidden" name="adocao_id" value="{{ $adocao->id }}">

                                    <!-- Mensagem -->
                                    <x-input-label for="admConteudo" :value="__('Escreva uma mensagem')" class="text-lg"/>
                                    <x-textarea-input class="w-full block mt-1" rows="4" id="admConteudo" type="text" name="admConteudo" :value="old('admConteudo')" autocomplete="admConteudo"></x-textarea-input>
                                </div>
                                <div class="flex items-center justify-between px-3 py-2 border-t">
                                    <x-primary-button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800" >
                                        {{ __('Enviar') }}
                                    </x-primary-button>
                                </div>
                            </div>
                        </form>
                    @endif
                    <div class="max-w-5xl mx-auto">
                        <div class="text-right mt-6">
                            @if (Auth::user()->level === 'admin')
                                <a href="{{ route('adocao.gerenciador') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-600 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-1">Voltar</a>
                            @else
                                @if ($adocao->user_id === Auth::user()->id)
                                    <a href="{{ route('adocao.index') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-600 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-1">Voltar</a>
                                @else
                                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-600 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-1">Voltar</a>
                                @endif
                            @endif
                            @if ($adocao->user_id != Auth::user()->id)
                                <a href="{{ route('adocao.interesse.create', $adocao->id) }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-600 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-1">Eu quero</a>
                            @endif
                            @if ($adocao->user_id == Auth::user()->id || Auth::user()->level === 'admin')
                                <a href="{{ route('adocao.interesse.index', $adocao->id) }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-600 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-1">Interesses</a>
                            @endif

                            @if ((Auth::user()->id === $adocao->user_id) || (Auth::user()->level === 'admin'))
                                <a href="{{ route('adocao.edit', $adocao->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Editar</a>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="{{ asset('js/show-animal-msg.js') }}"></script>
</x-app-layout>

