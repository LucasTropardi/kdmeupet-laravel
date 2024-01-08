<x-app-layout>
    @section('title','Finalizar interesse em adoção')
    @include('partials.bannertop')
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900" id="form-cadastrare">
                    <div class="flex flex-col items-center pt-2 sm:pt-0" id="div-cadastrar">
                        <div class="w-full sm:max-w-md mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mb-12" id="form-cadastrar">
                            <div>
                                <p class="mb-8 text-xl">Deseja finalizar este registro, <strong>{{ Auth::user()->name }}</strong>?</p>
                                <form action="{{ route('interesse.finalizar', $interesse) }}" method="post">
                                    @csrf
                                    @method('PUT')

                                    <!-- Resposta -->
                                    <div class="mb-4">
                                        <x-input-label for="adiResposta" :value="__('Envie uma resposta sobre a finalização*')" />
                                        <x-textarea-input class="w-full block mt-1" rows="4" id="adiResposta" type="text" name="adiResposta" :value="old('adiResposta')" autocomplete="adiResposta"></x-textarea-input>
                                        <x-input-error :messages="$errors->get('adiResposta')" class="mt-2" />
                                    </div>

                                    <div class="flex items-center justify-end mt-10">
                                        <a href="{{ route('adocao.interesse.show', $interesse->id) }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-600 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-2">Voltar</a>
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
