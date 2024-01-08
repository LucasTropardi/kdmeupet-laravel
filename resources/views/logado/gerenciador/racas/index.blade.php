<x-app-layout>
    @section('title','Raças')
    @include('partials.bannertop')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4 text-2xl text-center">Olá, <strong>{{ Auth::user()->name }}</strong>!</p>
                    <p class="text-xl text-center">Aqui está a lista de raças cadastradas para os registros de animais.</p>
                </div>
                <div class="px-6 text-gray-900 text-left">
                    <x-external-button route="raca.create" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700
                        hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium
                        rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                        Nova raça
                    </x-external-button>
                </div>

                <div class="px-6 py-2 text-gray-900 mb-6">
                    <div class="bg-gray-200 p-1 rounded-lg border border-gray-300 shadow-lg">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-700">
                                <thead class="text-xl text-gray-700 uppercase bg-gray-100">
                                    <tr class="hover:bg-gray-100">
                                        <th class="py-2 px-12">Raça</th>
                                        <th>Espécie</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($racas as $raca)
                                        <tr class="odd:bg-white even:bg-gray-100 border-b text-base font-medium">
                                            <td class="px-12">{{ ($raca->racaNome) }}</td>
                                            <td>{{ $raca->especie->esNome }}</td>
                                            <td class="text-center p-4 space-x-2">
                                                <a title="Editar" class="bg-white text-blue-600 py-2 px-3 rounded border border-blue-600 hover:bg-blue-600 hover:text-white" href="{{ route('raca.edit', $raca->id) }}">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </a>
                                                <a href="#" title="Excluir" class="excluir-raca bg-white text-red-600 py-2 px-4 rounded border border-red-600 hover:bg-red-600 hover:text-white" data-raca-id="{{ $raca->id }}">
                                                    <i class="fa-regular fa-trash-can" title="Excluir"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="rounded px-7 mb-4">
                    {{ $racas->links() }}
                </div>
            </div>
        </div>
    </div>
    @include('partials.modals.modal-excluir-raca')
    <script src="{{ asset('js/modal-excluir-raca.js') }}"></script>
</x-app-layout>
