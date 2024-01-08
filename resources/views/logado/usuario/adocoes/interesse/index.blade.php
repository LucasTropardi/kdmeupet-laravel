<x-app-layout>
    @section('title','Lista de interesses')
    @include('partials.bannertop')
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá, <strong>{{ Auth::user()->name }}</strong>!</p>
                    <p>Aqui estão todos os interessados em adotrar este pet.</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg p-6 text-gray-900 mt-4">
                <div class="p-3 bg-white rounded-lg mb-4">
                    {{ $interesses->links() }}
                </div>
                <table class="table-auto w-full bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                    <thead class="text-left bg-gray-100">
                        <tr>
                            <th class="text-center">Status</th>
                            <th class="p-2">Nome</th>
                            <th>Animal</th>
                            <th>Contato</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($interesses as $interesse)
                            <tr class="hover:bg-gray-100">
                                <td class="text-center">
                                    @if ($interesse->adiFinalizado == 0)
                                        Pendente
                                    @else
                                        Finalizado
                                    @endif
                                </td>
                                <td class="p-2">{{ $interesse->user->name .' '. $interesse->user->lastName }}</td>
                                <td>{{ $interesse->adocao->adNome }}</td>
                                <td>{{ $interesse->adiContato }}</td>
                                <td class="text-center">
                                    <a href="{{ route('adocao.interesse.show', $interesse) }}" title="Visualizar"><i class="fa-solid fa-magnifying-glass m-2"></i></a>
                                    <a href="{{ route('adocao.interesse.edit', $interesse) }}" title="Editar"><i class="fa-regular fa-pen-to-square m-2"></i></a>
                                    @if ($interesse->adiFinalizado == 0)
                                        <a href="{{ route('interesse.finalizar', $interesse) }}" title="Editar"><i class="fa-regular fa-square-check m-2"></i></a>
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
