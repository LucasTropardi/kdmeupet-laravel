<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar tamanho') }}
        </h2>
    </x-slot>
    @section('title','Editar tamanho')
    @include('partials.bannertop')
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sl sm:rounded-lg">
                <div class="p-6 text-gray-900" id="form-cadastrare">
                    <div class="flex flex-col items-center pt-2 sm:pt-0" id="div-cadastrar">
                        <div class="w-full sm:max-w-md mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mb-12" id="form-cadastrar">
                            <div>
                                <p class="mb-8 text-xl">Altere o tamanho, <strong>{{ Auth::user()->name }}</strong>.</p>
                                <form action="{{ route('tamanho.update', $tamanho->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <!-- User -->
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                    <!-- Espécie -->
                                    <x-input-label for="especie_id" :value="__('Espécie*')" />
                                    <x-select name="especie_id" :options="$especies" :selected="$tamanho->especie_id" />
                                    <x-input-error :messages="$errors->get('especie_id')" class="mt-2" />

                                    <!-- tamanho -->
                                    <div>
                                        <x-input-label for="tamanho" :value="__('Tamanho*')" />
                                        <x-text-input id="tamanho" class="block mt-1 w-full" type="text" name="tamanho" value="{{ $tamanho->tamanho }}" required autofocus autocomplete="tamanho" />
                                        <x-input-error :messages="$errors->get('tamanho')" class="mt-2" />
                                    </div>
                                    <div class="flex items-center justify-end mt-4">
                                        <x-primary-button class="ms-4 butao hover:bg-blue-900">
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
