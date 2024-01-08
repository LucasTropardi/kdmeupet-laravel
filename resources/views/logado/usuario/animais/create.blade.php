<x-app-layout>
    @section('title','Cadastro de Animais')
    @include('partials.bannertop')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-gray-300 shadow sm:rounded-lg p-1.5">
                <div class="bg-blue-300 shadow sm:rounded-lg p-1.5">
                    <div class="p-4 sm:p-8 bg-white sm:rounded-lg">
                        <p class="text-center pt-2 pb-4 text-2xl font-bold">Cadastro de animal</p>
                        <p class="mb-12 text-xl">Informe abaixo os dados do animal, <strong>{{ Auth::user()->name }}</strong>.</p>
                        <form action="{{ route('animal.store') }}" method="post" enctype="multipart/form-data">
                            <div class="mt-6 grid grid-cols-12 gap-4 content-center">
                                @csrf
                                <!-- User -->
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                <!-- Situação -->
                                <div class="col-span-6">
                                    <x-input-label class="text-left mb-2" for="situacao_id" :value="__('Situação*')" />
                                    <x-select name="situacao_id" :options="$situacoes" class="w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" autofocus/>
                                    <x-input-error :messages="$errors->get('situacao_id')" class="mt-2" />
                                </div>

                                <!-- Espécie -->
                                <div class="col-span-6">
                                    <x-input-label class="text-left mb-2" for="especie_id" :value="__('Espécie*')" />
                                    <x-select name="especie_id" id="especie_id" :options="$especies" class="w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                                    <x-input-error :messages="$errors->get('especie_id')" class="mt-2" />
                                </div>

                                <!-- Raça -->
                                <div class="col-span-6">
                                    <x-input-label for="raca_id" :value="__('Raça*')" class="mb-2 text-left"  />
                                    <x-select name="raca_id" id="raca_id" :options="$racas" class="w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                                    <x-input-error :messages="$errors->get('raca_id')" class="mt-2" />
                                </div>

                                <!-- Cor -->
                                <div class="col-span-6">
                                    <x-input-label for="cor_id" :value="__('Cor*')" class="mb-2 text-left" />
                                    <x-select name="cor_id" :options="$cores" class="w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                                    <x-input-error :messages="$errors->get('cor_id')" class="mt-2" />
                                </div>

                                <!-- Tamanho -->
                                <div class="col-span-6">
                                    <x-input-label for="tamanho_id" :value="__('Tamanho*')" class="mb-2 text-left" />
                                    <x-select name="tamanho_id" id="tamanho_id" :options="$tamanhos" class="w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                                    <x-input-error :messages="$errors->get('tamanho_id')" class="mt-2" />
                                </div>

                                <!-- Nome -->
                                <div class="col-span-6">
                                    <div class="pt-1">
                                        <x-input-label for="anNome" :value="__('Nome*')" class=" text-left"/>
                                        <x-text-input id="anNome" class="block mt-1 w-full" type="text" name="anNome" :value="old('anNome')" required autocomplete="anNome" />
                                        <x-input-error :messages="$errors->get('anNome')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Contato -->
                                <div class="col-span-6">
                                    <div class="pt-1">
                                        <x-input-label for="anContato" :value="__('Contato*')" class="text-left" />
                                        <x-text-input id="anContato" class="block mt-1 w-full" type="text" name="anContato" :value="old('anContato')" required autocomplete="anContato" />
                                        <x-input-error :messages="$errors->get('anContato')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Data -->
                                <div class="col-span-6">
                                    <div class="pt-1">
                                        <x-input-label for="anData" :value="__('Data*')" class="text-left" />
                                        <x-text-input id="anData" class="block mt-1 w-full" type="text" name="anData" :value="$hoje ?? ''" autocomplete="anData" required/>
                                        <x-input-error :messages="$errors->get('anData')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Descrição -->
                                <div class="col-span-12">
                                    <div class="pt-1">
                                        <x-input-label for="anDescricao" :value="__('Descrição*')" class="text-left" />
                                        <x-textarea-input class="w-full block mt-1" rows="4" id="anDescricao" type="text" name="anDescricao" :value="old('anDescricao')" autocomplete="anDescricao"></x-textarea-input>
                                    </div>
                                </div>

                                <!-- Foto -->
                                <div class="col-span-12 mt-2">
                                    <x-upload-imagem id="anFoto" inputName="anFoto" class="block mt-2 w-full" required />
                                </div>

                                <!-- Endereco -->

                                <!-- Latitude -->
                                <div class="col-span-12">
                                    <input type="hidden" name="latitude" id="latitude">
                                    <input type="hidden" name="longitude" id="longitude">
                                    <x-input-label for="" :value="__('Localização*')" class="mb-2 text-left" />
                                    <div id="map" class="overflow-hidden border-2 border-gray-300 shadow-lg sm:rounded-lg"></div>
                                </div>
                                <!-- Longitude -->

                                <!-- Finalizado -->
                                <input type="hidden" name="anFinalizado" value="0" >

                            </div>
                            <div class="flex items-center justify-end mt-6">
                                <x-external-button route="animal.index" class="uppercase text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Voltar</x-secondary-button>
                                <x-primary-button class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                    {{ __('Salvar') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Leaflet js -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>
<script src="{{ asset('js/mapa-cadastro.js') }}"></script>
</x-app-layout>
