<x-app-layout>
    @section('title','Animal para adoção')
    @include('partials.bannertop')
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900" id="form-cadastrare">
                    <div class="flex flex-col items-center pt-2 sm:pt-0" id="div-cadastrar">
                        <div class="w-full sm:max-w-md mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mb-12" id="form-cadastrar">
                            <div>
                                <p class="mb-8 text-xl">Informe os dados abaixo, <strong>{{ Auth::user()->name }}</strong>.</p>
                                <form action="{{ route('adocao.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <!-- User -->
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                    <!-- Espécie -->
                                    <x-input-label for="especie_id" :value="__('Espécie*')" class="mb-2 mt-4" />
                                    <x-select name="especie_id" id="especie_id" :options="$especies" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" autofocus />
                                    <x-input-error :messages="$errors->get('especie_id')" class="mt-2" />

                                    <!-- Raça -->
                                    <x-input-label for="raca_id" :value="__('Raça*')" class="mb-2 mt-4"  />
                                    <x-select name="raca_id" id="raca_id" :options="$racas" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                                    <x-input-error :messages="$errors->get('raca_id')" class="mt-2" />

                                    <!-- Cor -->
                                    <x-input-label for="cor_id" :value="__('Cor*')" class="mb-2 mt-4" />
                                    <x-select name="cor_id" :options="$cores" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                                    <x-input-error :messages="$errors->get('cor_id')" class="mt-2" />

                                    <!-- Tamanho -->
                                    <x-input-label for="tamanho_id" :value="__('Tamanho*')" class="mb-2 mt-4" />
                                    <x-select name="tamanho_id" id="tamanho_id" :options="$tamanhos" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                                    <x-input-error :messages="$errors->get('tamanho_id')" class="mt-2" />

                                    <!-- Data de cadastro -->
                                    <div class="mb-4 mt-4">
                                        <x-input-label for="adDataCadastro" :value="__('Data de cadastro*')" />
                                        <x-text-input id="adDataCadastro" class="block mt-1 w-full" type="text" name="adDataCadastro" :value="$hoje ?? ''" autocomplete="adDataCadastro" required/>
                                        <x-input-error :messages="$errors->get('adDataCadastro')" class="mt-2" />
                                    </div>

                                    <!-- Nome -->
                                    <div class="mb-4">
                                        <x-input-label for="adNome" :value="__('Nome do animal*')" class="mt-4"/>
                                        <x-text-input id="adNome" class="block mt-1 w-full" type="text" name="adNome" :value="old('adNome')" required autocomplete="adNome" />
                                        <x-input-error :messages="$errors->get('adNome')" class="mt-2" />
                                    </div>

                                     <!-- Idade -->
                                     <div class="mb-4">
                                        <x-input-label for="adIdade" :value="__('Idade do animal*')" class="mt-4"/>
                                        <x-text-input id="adIdade" class="block mt-1 w-full" type="text" name="adIdade" :value="old('adIdade')" required autocomplete="adIdade" />
                                        <x-input-error :messages="$errors->get('adIdade')" class="mt-2" />
                                    </div>

                                    <!-- Descrição -->
                                    <div class="mb-4">
                                        <x-input-label for="adDescricao" :value="__('Descrição*')" />
                                        <x-textarea-input class="w-full block mt-1" rows="4" id="adDescricao" type="text" name="adDescricao" :value="old('adDescricao')" autocomplete="adDescricao"></x-textarea-input>
                                        <x-input-error :messages="$errors->get('adDescricao')" class="mt-2" />
                                    </div>

                                    <!-- Contato -->
                                    <div class="mb-4">
                                        <x-input-label for="adContato" :value="__('Contato preferencial*')" />
                                        <x-text-input id="adContato" class="block mt-1 w-full" type="text" name="adContato" :value="old('adContato')" required autocomplete="adContato" />
                                        <x-input-error :messages="$errors->get('adContato')" class="mt-2" />
                                    </div>

                                    <!-- Endereco -->
                                    <div class="mb-4">
                                        <x-input-label for="adEndereco" :value="__('Endereço*')" />
                                        <x-text-input id="adEndereco" class="block mt-1 w-full" type="text" name="adEndereco" :value="old('adEndereco')" required autocomplete="adEndereco" />
                                        <x-input-error :messages="$errors->get('adEndereco')" class="mt-2" />
                                    </div>

                                    <!-- Imagem -->
                                    <x-upload-imagem id="adImagem" inputName="adImagem" class="block mt-1 w-full" required />

                                    <div class="flex items-center justify-end mt-10">
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
</x-app-layout>
