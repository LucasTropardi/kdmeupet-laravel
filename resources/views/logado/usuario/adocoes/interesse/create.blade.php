<x-app-layout>
    @section('title','Interesse em adotar')
    @include('partials.bannertop')
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900" id="form-cadastrare">
                    <div class="flex flex-col items-center pt-2 sm:pt-0" id="div-cadastrar">
                        <div class="w-full sm:max-w-md mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mb-12" id="form-cadastrar">
                            <div>
                                <p class="mb-8 text-xl">Preencha o formulário que será enviado ao autor da publicação, <strong>{{ Auth::user()->name }}</strong>?</p>
                                <form action="{{ route('adocao.interesse.store') }}" method="post" >
                                    @csrf
                                    <!-- Usuário -->
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                    <!-- Adocao -->
                                    <input type="hidden" name="adocao_id" value="{{ $adocao->id }}">

                                    <!-- Data de cadastro -->
                                    <div class="mb-4 mt-4">
                                        <x-input-label for="adiDataCadastro" :value="__('Data de cadastro*')" />
                                        <x-text-input id="adiDataCadastro" class="block mt-1 w-full" type="text" name="adiDataCadastro" :value="$hoje ?? ''" autocomplete="adiDataCadastro" required/>
                                        <x-input-error :messages="$errors->get('adiDataCadastro')" class="mt-2" />
                                    </div>

                                    <!-- Contato -->
                                    <div class="mb-4">
                                        <x-input-label for="adiContato" :value="__('Contato preferencial*')" />
                                        <x-text-input id="adiContato" class="block mt-1 w-full" type="text" name="adiContato" :value="old('adiContato')" required autocomplete="adiContato" />
                                        <x-input-error :messages="$errors->get('adiContato')" class="mt-2" />
                                    </div>

                                    <!-- Mensagem -->
                                    <div class="mb-4">
                                        <x-input-label for="adiMensagem" :value="__('Envie uma mensagem ao autor da publicação')" />
                                        <x-textarea-input class="w-full block mt-1" rows="4" id="adiMensagem" type="text" name="adiMensagem" :value="old('adiMensagem')" autocomplete="adiMensagem"></x-textarea-input>
                                        <x-input-error :messages="$errors->get('adiMensagem')" class="mt-2" />
                                    </div>

                                    <div class="flex items-center justify-end mt-10">
                                        @if (Auth::user()->level === 'admin')
                                            <a href="{{ route('adocao.gerenciador') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-600 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-2">Voltar</a>
                                        @else
                                            <a href="{{ route('adocao.show', $adocao->id) }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-600 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-2">Voltar</a>
                                        @endif
                                        <x-primary-button class="butao hover:bg-blue-900" >
                                            {{ __('Finalizar') }}
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
