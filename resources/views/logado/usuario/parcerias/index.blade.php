<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Parceria') }}
        </h2>
    </x-slot>
    @section('title','Parcerias')
    @include('partials.bannertop')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá, <strong>{{ Auth::user()->name }}</strong>!</p>
                </div>
                <div class="p-6 text-gray-900">
                    <x-external-button route="parceria.create" class="butao text-white">Nova Parceria</x-external-button>
                </div>
            </div>
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg p-6 text-gray-900 mt-4">
                <div class="p-3 bg-white rounded-lg mb-4">
                    {{ $parcerias->links() }}
                </div>
                <table class="table-auto w-full bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                    <thead class="text-left bg-gray-100">
                        <tr>
                            <th class="text-center">Situação</th>
                            <th class="p-2">Nome</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Aprovação</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($parcerias as $parceria)
                            <tr class="hover:bg-gray-100">
                                <td class="text-center">
                                    @if ($parceria->parFinalizado == '0')
                                        Ativa
                                    @else
                                        Finalizada
                                    @endif
                                </td>
                                <td class="p-2">{{ $parceria->parNome }}</td>
                                <td>{{ $parceria->parEmail }}</td>
                                <td>{{ $parceria->parTelefone }}</td>
                                <td>
                                    @if ($parceria->parAprovado == 0)
                                        Aguardando aprovação
                                    @else
                                        Aprovado
                                    @endif
                                </td>
                                <td class="text-center space-x-2">
                                    <a href="{{ route('parceria.show', $parceria->id) }}"><i class="fa-solid fa-magnifying-glass" title="Visualizar"></i></a>
                                    @if ($parceria->parFinalizado == '0' || Auth::user()->level === 'admin')
                                        <a href=""><span class="fa-regular fa-pen-to-square" title="Editar"></span></a>
                                    @endif
                                    @if ($parceria->parFinalizado == '0')
                                        <a href=""><span class="fa-regular fa-square-check" title="Finalizar"></span></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
