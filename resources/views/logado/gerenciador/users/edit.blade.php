<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edição de usuário') }}
        </h2>
    </x-slot>
    @section('title','Dashboard')
    @include('partials.bannertop')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 mb-2">
                    <p class="mb-4">Olá, <strong>{{ Auth::user()->name }}</strong>! Você está editando o nível de acesso de <strong>{{ $user->name . ' ' . $user->lastName }}</strong>.</strong></p>
                    <p>Nível de acesso atual:
                        <strong>
                            @if($user->level === 'admin')
                                Gerenciador
                            @else
                                Usuário
                            @endif
                        </strong>
                    </p>
                </div>
                <div class="p-6 text-gray-900">
                    <form action="{{ route('user.update', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <x-input-label for="level" :value="__('Selecione o nível')" class="mb-2 text-lg" />
                            <select name="level" id="level" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                <option value="user" {{ $user->level === 'user' ? 'selected' : '' }}>Usuário</option>
                                <option value="admin" {{ $user->level === 'admin' ? 'selected' : '' }}>Gerenciador</option>
                            </select>
                        </div>
                        <div>
                            <x-primary-button>{{ __('Alterar') }}</x-primary-button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
