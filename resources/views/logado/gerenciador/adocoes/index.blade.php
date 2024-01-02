<x-app-layout>
    <div><br></div>
    @section('title','Animais para adoção')
    @include('partials.bannertop')
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá, <strong>{{ Auth::user()->name }}</strong>!</p>
                    <p>Aqui estão todos os animais cadastrados para adoção.</p>
                </div>
                <div class="p-6 text-gray-900">
                    <x-external-button route="adocao.gerenciador.interesse" class="butao text-white">Lista geral de interesses</x-external-button>
                </div>
            </div>
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg p-6 text-gray-900 mt-4">
                <div class="p-3 bg-white rounded-lg mb-4">
                    {{ $adocoes->links() }}
                </div>
                <table class="table-auto w-full bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                    <thead class="text-left bg-gray-100">
                        <tr>
                            <th class="text-center">Status</th>
                            <th class="p-2">Nome</th>
                            <th>Usuário</th>
                            <th>Espécie</th>
                            <th>Raça</th>
                            <th>Cor</th>
                            <th>Tamanho</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($adocoes as $adocao)
                            <tr class="hover:bg-gray-100">
                                <td class="text-center">
                                    @if ($adocao->adFinalizado == 0)
                                        Disponível
                                    @else
                                        Finalizado
                                    @endif
                                </td>
                                <td class="p-2">{{ $adocao->adNome }}</td>
                                <td>{{ $adocao->user->name . ' ' . $adocao->user->lastName }}</td>
                                <td>{{ $adocao->especie->esNome }}</td>
                                <td>{{ $adocao->raca->racaNome }}</td>
                                <td>{{ $adocao->cor->cor }}</td>
                                <td>{{ $adocao->tamanho->tamanho }}</td>
                                <td class="text-center">
                                    <a href="{{ route('adocao.show', $adocao->id) }}" title="Visualizar"><i class="fa-solid fa-magnifying-glass m-2"></i></a>
                                    <a href="{{ route('adocao.edit', $adocao->id) }}" title="Editar"><i class="fa-regular fa-pen-to-square m-2"></i></a>
                                    @if ($adocao->adFinalizado == 0)
                                        <a href="{{ route('adocao.finalizar', $adocao) }}" title="Editar"><i class="fa-regular fa-square-check m-2"></i></a>
                                    @endif
                                    <a href="#" title="Excluir registro" class="excluir-adocao" data-adocao-id="{{ $adocao->id }}"><i class="fa-regular fa-trash-can m-2"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('partials.modals.modal-adocao-gerenciador')
    <script src="{{ asset('js/modal-logado-adocao.js') }}"></script>
</x-app-layout>
