<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visualizar informações') }}
        </h2>
    </x-slot>
    @section('title','Parceria')
    @include('partials.bannertop')
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900" id="form-cadastrare">
                    <div class="flex flex-col items-center pt-2 sm:pt-0" id="div-cadastrar">
                        <div class="w-full sm:max-w-md mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mb-12" id="form-cadastrar">
                            <div>
                                <p class="mb-8 text-xl">Atualize os dados da entidade/parceiro abaixo, <strong>{{ Auth::user()->name }}</strong>, levando em conta que isso exigirá uma nova aprovação para a parceria.</p>
                                <form action="{{ route('parceria.atualizar', $parceria) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <!-- User -->
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                    <!-- Data -->
                                    <div class="mb-4">
                                        <x-input-label for="parDataCadastro" :value="__('Data*')" />
                                        <x-text-input id="parDataCadastro" class="block mt-1 w-full" type="text" name="parDataCadastro" :value="$dataCadastrada ?? ''" autocomplete="parDataCadastro" required/>
                                        <x-input-error :messages="$errors->get('parDataCadastro')" class="mt-2" />
                                    </div>

                                    <!-- Nome -->
                                    <div class="mb-4">
                                        <x-input-label for="parNome" :value="__('Nome*')" class="mt-4"/>
                                        <x-text-input id="parNome" class="block mt-1 w-full" type="text" name="parNome" value="{{ $parceria->parNome }}" required autofocus autocomplete="parNome" />
                                        <x-input-error :messages="$errors->get('parNome')" class="mt-2" />
                                    </div>

                                    <!-- E-mail -->
                                    <div class="mb-4">
                                        <x-input-label for="parEmail" :value="__('E-mail*')" class="mt-4"/>
                                        <x-text-input id="parEmail" class="block mt-1 w-full" type="text" name="parEmail" value="{{ $parceria->parEmail }}" required autocomplete="parEmail" />
                                        <x-input-error :messages="$errors->get('parEmail')" class="mt-2" />
                                    </div>

                                    <!-- Telefone -->
                                    <div class="mb-4">
                                        <x-input-label for="parTelefone" :value="__('Telefone*')" class="mt-4"/>
                                        <x-text-input id="parTelefone" class="block mt-1 w-full" type="text" name="parTelefone" value="{{ $parceria->parTelefone }}" required autocomplete="parTelefone" />
                                        <x-input-error :messages="$errors->get('parTelefone')" class="mt-2" />
                                    </div>

                                    <!-- Endereço -->
                                    <div class="mb-4">
                                        <x-input-label for="parEndereco" :value="__('Endereço*')" class="mt-4"/>
                                        <x-text-input id="parEndereco" class="block mt-1 w-full" type="text" name="parEndereco" value="{{ $parceria->parEndereco }}" required autocomplete="parEndereco" />
                                        <x-input-error :messages="$errors->get('parEndereco')" class="mt-2" />
                                    </div>

                                    <!-- Descrição -->
                                    <div class="mb-4">
                                        <x-input-label for="parDescricao" :value="__('Descrição*')" class="mt-4"/>
                                        <x-textarea-input class="w-full block mt-1" rows="4" id="parDescricao" type="text" name="parDescricao" :value="old('parDescricao')" autocomplete="parDescricao">{{ $parceria->parDescricao }}</x-textarea-input>
                                    </div>

                                    <!-- Mensagem-->
                                    <div class="mb-4">
                                        <x-input-label for="parMensagem" :value="__('Mensagem para o administrador do site')" />
                                        <x-textarea-input class="w-full block mt-1" rows="4" id="parMensagem" type="text" name="parMensagem" :value="old('parMensagem')" autocomplete="parMensagem">{{ $parceria->parMensagem }}</x-textarea-input>
                                    </div>

                                    <!-- Imagem -->
                                    <div class="mb-4">
                                        <x-upload-imagem id="parImagem" inputName="parImagem" class="block mt-1 w-full" name="parImagem"/>
                                    </div>

                                   <!-- Data Inicio -->
                                    <!-- Data Fim -->

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
</x-app-layout>
