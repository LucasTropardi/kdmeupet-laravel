<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar nova situação') }}
        </h2>
    </x-slot>
    @section('title','Situação')
    @include('partials.bannertop')
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sl sm:rounded-lg">
                <div class="p-6 text-gray-900" id="form-cadastrare">
                    <div class="flex flex-col items-center pt-2 sm:pt-0" id="div-cadastrar">
                        <div class="w-full sm:max-w-md mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mb-12" id="form-cadastrar">
                            <div>
                                <p class="mb-8 text-xl">Digite a situação, <strong>{{ Auth::user()->name }}</strong>.</p>
                                <form action="{{ route('situacao.store') }}" method="post">
                                    @csrf
                                    <!-- User -->
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                    <!-- Situação -->
                                    <div>
                                        <x-input-label for="situacao" :value="__('Situação*')" />
                                        <x-text-input id="situacao" class="block mt-1 w-full" type="text" name="situacao" :value="old('situacao')" required autofocus autocomplete="situacao" />
                                        <x-input-error :messages="$errors->get('situacao')" class="mt-2" />
                                    </div>
                                    <div class="flex items-center justify-end mt-4">
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

