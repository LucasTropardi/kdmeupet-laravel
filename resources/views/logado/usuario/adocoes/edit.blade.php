<x-app-layout>
    @section('title','Editar animal')
    @include('partials.bannertop')
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900" id="form-cadastrare">
                    <div class="flex flex-col items-center pt-2 sm:pt-0" id="div-cadastrar">
                        <div class="w-full sm:max-w-md mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mb-12" id="form-cadastrar">
                            <div>
                                <p class="mb-8 text-xl">Atualize os dados abaixo, <strong>{{ Auth::user()->name }}</strong>. Note que isso fará a publicação ficar ativa, caso esteja finalizada.</p>
                                <form action="{{ route('adocao.update', $adocao->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <!-- Espécie -->
                                    <x-input-label for="especie_id" :value="__('Espécie*')" class="mb-2 mt-4" />
                                    <x-select name="especie_id" id="especie_id" :options="$especies" selected="{{ $adocao->especie_id }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                                    <x-input-error :messages="$errors->get('especie_id')" class="mt-2" />

                                    <!-- Raça -->
                                    <x-input-label for="raca_id" :value="__('Raça*')" class="mb-2 mt-4"  />
                                    <x-select name="raca_id" id="raca_id" :options="$racas" selected="{{ $adocao->raca_id }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                                    <x-input-error :messages="$errors->get('raca_id')" class="mt-2" />

                                    <!-- Cor -->
                                    <x-input-label for="cor_id" :value="__('Cor*')" class="mb-2 mt-4" />
                                    <x-select name="cor_id" :options="$cores" selected="{{ $adocao->cor_id }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                                    <x-input-error :messages="$errors->get('cor_id')" class="mt-2" />

                                    <!-- Tamanho -->
                                    <x-input-label for="tamanho_id" :value="__('Tamanho*')" class="mb-2 mt-4" />
                                    <x-select name="tamanho_id" id="tamanho_id" :options="$tamanhos" selected="{{ $adocao->tamanho_id }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                                    <x-input-error :messages="$errors->get('tamanho_id')" class="mt-2" />

                                    <!-- Data -->
                                    <div class="mb-4 mt-4">
                                        <x-input-label for="adDataCadastro" :value="__('Data de cadastro*')" />
                                        <x-text-input id="adDataCadastro" class="block mt-1 w-full" type="text" name="adDataCadastro" :value="$dataCadastrada ?? ''" autocomplete="adDataCadastro" />
                                        <x-input-error :messages="$errors->get('adDataCadastro')" class="mt-2" />
                                    </div>

                                    <!-- Nome -->
                                    <div class="mb-4">
                                        <x-input-label for="adNome" :value="__('Nome*')" class="mt-4"/>
                                        <x-text-input id="adNome" class="block mt-1 w-full" type="text" name="adNome" :value="$adocao->adNome" required autocomplete="adNome" />
                                        <x-input-error :messages="$errors->get('anNome')" class="mt-2" />
                                    </div>

                                    <!-- Idade -->
                                    <div class="mb-4">
                                        <x-input-label for="adIdade" :value="__('Idade*')" class="mt-4"/>
                                        <x-text-input id="adIdade" class="block mt-1 w-full" type="text" name="adIdade" :value="$adocao->adIdade" required autocomplete="adIdade" />
                                        <x-input-error :messages="$errors->get('adIdade')" class="mt-2" />
                                    </div>

                                    <!-- Contato -->
                                    <div class="mb-4">
                                        <x-input-label for="adContato" :value="__('Contato preferencial*')" />
                                        <x-text-input id="adContato" class="block mt-1 w-full" type="text" name="adContato" :value="$adocao->adContato" required autocomplete="adContato" />
                                        <x-input-error :messages="$errors->get('adContato')" class="mt-2" />
                                    </div>

                                    <!-- Endereco -->
                                    <div class="mb-4">
                                        <x-input-label for="adEndereco" :value="__('Endereço*')" />
                                        <x-text-input id="adEndereco" class="block mt-1 w-full" type="text" name="adEndereco" :value="$adocao->adEndereco" required autocomplete="adEndereco" />
                                        <x-input-error :messages="$errors->get('adEndereco')" class="mt-2" />
                                    </div>

                                    <!-- Descrição -->
                                    <div class="mb-4">
                                        <x-input-label for="adDescricao" :value="__('Descrição*')" />
                                        <x-textarea-input class="w-full block mt-1" rows="4" id="adDescricao" type="text" name="adDescricao" :value="old('adDescricao')" autocomplete="adDescricao">{{ $adocao->adDescricao }}</x-textarea-input>
                                        <x-input-error :messages="$errors->get('anDescricao')" class="mt-2" />
                                    </div>

                                    <!-- Foto -->
                                    <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg mt-6 mb-6">
                                        <img src="{{ asset('storage/uploads/adocoes/' . $adocao->adImagem) }}" alt="Imagem do animal">
                                    </div>

                                    <!--Enviar nova foto -->
                                    <x-upload-imagem id="adImagem" class="block mt-1 w-full" inputName="adImagem" />

                                    <!-- Finalizado -->
                                    <input type="hidden" name="adFinalizado" value="0" >

                                    <div class="flex items-center justify-end mt-10">
                                        @if (Auth::user()->level === 'admin')
                                            <a href="{{ route('adocao.gerenciador') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-600 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-2">Voltar</a>
                                        @else
                                            <a href="{{ route('adocao.index') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-600 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-2">Voltar</a>
                                        @endif
                                        <x-primary-button class="butao hover:bg-blue-900" >
                                            {{ __('Salvar') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<!-- Leaflet js -->
{{-- @include('partials.js.js-mapa-edicao') --}}
</x-app-layout>
