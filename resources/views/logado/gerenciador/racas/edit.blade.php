<x-app-layout>
    @section('title','Editar raça')
    @include('partials.bannertop')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg pb-8">
                <div class="w-full mx-auto mt-8 sm:max-w-md px-2 py-2 bg-blue-200 shadow-md overflow-hidden sm:rounded-lg mb-2" id="form-cadastrar">
                    <div class="bg-white p-6">
                        <p class="mb-6 font-bold text-2xl">Atualização de registro</strong>.</p>
                        <p class="mb-4 mt-8 text-xl text-left">Informe os dados da raça, <strong>{{ Auth::user()->name }}</strong>.</p>
                        <form action="{{ route('raca.update', $raca->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <!-- User -->
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            <!-- Espécie -->
                            <x-input-label for="especie_id" :value="__('Espécie*')" class="mb-2 text-left" />
                            <x-select class="w-full rounded-lg" name="especie_id" :options="$especies" :selected="$raca->especie_id" />
                            <x-input-error :messages="$errors->get('especie_id')" class="mt-2" />

                            <!-- Raça -->
                            <div class="mt-6">
                                <x-input-label class="text-left" for="racaNome" :value="__('Raça*')" />
                                <x-text-input id="racaNome" class="block mt-1 w-full" type="text" name="racaNome" value="{{ $raca->racaNome }}" required autofocus autocomplete="racaNome" />
                                <x-input-error :messages="$errors->get('racaNome')" class="mt-2" />
                            </div>
                            <div class="flex items-center justify-end mt-6">
                                <x-external-button route="raca.index" class="uppercase text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Voltar</x-secondary-button>
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
</x-app-layout>
