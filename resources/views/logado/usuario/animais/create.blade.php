<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar novo animal') }}
        </h2>
    </x-slot>
    @section('title','Cadastro de animais')
    @include('partials.bannertop')
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900" id="form-cadastrare">
                    <div class="flex flex-col items-center pt-2 sm:pt-0" id="div-cadastrar">
                        <div class="w-full sm:max-w-md mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mb-12" id="form-cadastrar">
                            <div>
                                <p class="mb-8 text-xl">Informe os dados abaixo, <strong>{{ Auth::user()->name }}</strong>.</p>
                                <form action="{{ route('animal.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <!-- User -->
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                    <!-- Situação -->
                                    <x-input-label for="situacao_id" :value="__('Situação*')" class="mb-2" />
                                    <x-select name="situacao_id" :options="$situacoes" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" autofocus/>
                                    <x-input-error :messages="$errors->get('situacao_id')" class="mt-2" />

                                    <!-- Espécie -->
                                    <x-input-label for="especie_id" :value="__('Espécie*')" class="mb-2 mt-4" />
                                    <x-select name="especie_id" id="especie_id" :options="$especies" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
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

                                    <!-- Nome -->
                                    <div class="mb-4">
                                        <x-input-label for="anNome" :value="__('Nome*')" class="mt-4"/>
                                        <x-text-input id="anNome" class="block mt-1 w-full" type="text" name="anNome" :value="old('anNome')" required autocomplete="anNome" />
                                        <x-input-error :messages="$errors->get('anNome')" class="mt-2" />
                                    </div>

                                    <!-- Descrição -->
                                    <div class="mb-4">
                                        <x-input-label for="anDescricao" :value="__('Descrição*')" />
                                        <x-text-input id="anDescricao" class="block mt-1 w-full" type="text" name="anDescricao" :value="old('anDescricao')" required autocomplete="anDescricao" />
                                        <x-input-error :messages="$errors->get('anDescricao')" class="mt-2" />
                                    </div>

                                    <!-- Contato -->
                                    <div class="mb-4">
                                        <x-input-label for="anContato" :value="__('Contato*')" />
                                        <x-text-input id="anContato" class="block mt-1 w-full" type="text" name="anContato" :value="old('anContato')" required autocomplete="anContato" />
                                        <x-input-error :messages="$errors->get('anContato')" class="mt-2" />
                                    </div>

                                   <!-- Data -->
                                    <div class="mb-4">
                                        <x-input-label for="anData" :value="__('Data*')" />
                                        <x-text-input id="anData" class="block mt-1 w-full" type="text" name="anData" :value="$hoje ?? ''" autocomplete="anData" required/>
                                        <x-input-error :messages="$errors->get('anData')" class="mt-2" />
                                    </div>

                                    <!-- Foto -->
                                    <x-upload-imagem id="anFoto" class="block mt-1 w-full" name="anFoto" required />

                                    <!-- Endereco -->

                                    <!-- Latitude -->
                                    <input type="hidden" name="latitude" id="latitude">
                                    <input type="hidden" name="longitude" id="longitude">
                                    <x-input-label for="" :value="__('Localização*')" class="mt-6" />
                                    <div id="map" class="overflow-hidden border border-gray-300 shadow-lg sm:rounded-lg"></div>
                                    <!-- Longitude -->

                                    <!-- Finalizado -->
                                    <input type="hidden" name="anFinalizado" value="0" >

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
<!-- Leaflet js -->
@include('partials.js.js-mapa-cadastro')
</x-app-layout>
