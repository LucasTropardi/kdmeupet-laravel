<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Excluir tamanho') }}
        </h2>
    </x-slot>
    @section('title','Excluir tamanho')
    @include('partials.bannertop')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá, <strong>{{ Auth::user()->name }}</strong>!</p>
                    <p class="mb-4">Confirma a exclusão do tamanho {{ $tamanho->tamanho }}?</p>
                </div>
                <div>
                    <form action="{{ route('tamanho.destroy', $tamanho->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <x-primary-button class="ms-4 bg-red-500 hover:bg-red-700">
                            {{ __('Excluir') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
