<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar raça') }}
        </h2>
    </x-slot>
    @section('title','Editar raça')
    @include('partials.bannertop')
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sl sm:rounded-lg">
                <div class="p-6 text-gray-900" id="form-cadastrare">
                    <div class="flex flex-col items-center pt-2 sm:pt-0" id="div-cadastrar">
                        <div class="w-full sm:max-w-md mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mb-12" id="form-cadastrar">
                            <div>
                                <p class="mb-8 text-xl">Altere a raça, <strong>{{ Auth::user()->name }}</strong>.</p>
                                <form action="{{ route('raca.update', $raca->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <!-- User -->
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                    <!-- Espécie -->
                                    <x-select name="especie_id" :options="$especies" :selected="$raca->especie_id" />

                                    <!-- Raça -->
                                    <div>
                                        <x-input-label for="racaNome" :value="__('Raça*')" />
                                        <x-text-input id="racaNome" class="block mt-1 w-full" type="text" name="racaNome" value="{{ $raca->racaNome }}" required autofocus autocomplete="racaNome" />
                                        <x-input-error :messages="$errors->get('racaNome')" class="mt-2" />
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
