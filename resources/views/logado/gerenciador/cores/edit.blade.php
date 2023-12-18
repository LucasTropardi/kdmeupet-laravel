<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar cor') }}
        </h2>
    </x-slot>
    @section('title','Editar cor')
    @include('partials.bannertop')
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900" id="form-cadastrare">
                    <div class="flex flex-col items-center pt-2 sm:pt-0" id="div-cadastrar">
                        <div class="w-full sm:max-w-md mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mb-12" id="form-cadastrar">
                            <div>
                                <p class="mb-8 text-xl">Altere o nome da cor, <strong>{{ Auth::user()->name }}</strong>.</p>
                                <form action="{{ route('cor.update', $cor->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <!-- Cor -->
                                    <div>
                                        <x-input-label for="cor" :value="__('Cor*')" />
                                        <x-text-input id="cor" class="block mt-1 w-full" type="text" name="cor" value="{{ $cor->cor }}" required autofocus autocomplete="cor" />
                                        <x-input-error :messages="$errors->get('cor')" class="mt-2" />
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
