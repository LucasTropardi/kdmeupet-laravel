<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar nova Raça') }}
        </h2>
    </x-slot>
    @section('title','Raças')
    @include('partials.bannertop')
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900" id="form-cadastrare">
                    <div class="flex flex-col items-center pt-2 sm:pt-0" id="div-cadastrar">
                        <div class="w-full sm:max-w-md mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mb-12" id="form-cadastrar">
                            <div>
                                <p class="mb-8 text-xl">Informe os dados da raça, <strong>{{ Auth::user()->name }}</strong>.</p>
                                <form action="{{ route('raca.store') }}" method="post">
                                    @csrf
                                    <!-- User -->
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                    <!-- Espécie -->
                                    <x-input-label for="especie_id" :value="__('Espécie*')" class="mb-2" />
                                    <x-select name="especie_id" :options="$especies" />
                                    <x-input-error :messages="$errors->get('especie_id')" class="mt-2" />
                                    <!-- Raça -->
                                    <div>
                                        <x-input-label for="racaNome" :value="__('Raça*')" />
                                        <x-text-input id="racaNome" class="block mt-1 w-full" type="text" name="racaNome" :value="old('racaNome')" required autofocus autocomplete="racaNome" />
                                        <x-input-error :messages="$errors->get('racaNome')" class="mt-2" />
                                    </div>
                                    <div class="flex items-center justify-end mt-4">
                                        <a href="{{ route('raca.index') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-600 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Voltar</a>
                                        <x-primary-button class="ms-4 bg-blue-800 hover:bg-blue-900">
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
