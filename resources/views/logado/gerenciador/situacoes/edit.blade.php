<x-app-layout>
    @section('title','Editar situacao')
    @include('partials.bannertop')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg pb-8">
                <div class="w-full mx-auto mt-8 sm:max-w-md px-2 py-2 bg-blue-200 shadow-md overflow-hidden sm:rounded-lg mb-2" id="form-cadastrar">
                    <div class="bg-white p-6">
                        <p class="mb-8 font-bold text-2xl">Atualização de registro</strong>.</p>
                        <p class="mt-10 text-xl text-left">Digite o nome da situação, <strong>{{ Auth::user()->name }}</strong>.</p>
                        <form action="{{ route('situacao.update', $situacao->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <!-- User -->
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            <!-- Cor -->
                            <div class="p-2">
                                <x-text-input-float id="situacao" class="block mt-1 w-full" type="text" name="situacao" value="{{ $situacao->situacao }}" required autofocus autocomplete="situacao" />
                                <x-input-error :messages="$errors->get('situacao')" class="mt-2" />
                            </div>
                            <div class="flex items-center justify-end mt-6">
                                <x-external-button route="situacao.index" class="uppercase text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Voltar</x-secondary-button>
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
