<x-app-layout>
    @section('title','Lista de usuários')
    @include('partials.bannertop')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4 text-2xl text-center">Olá, <strong>{{ Auth::user()->name }}</strong>!</p>
                    <p class="text-xl text-center">Aqui está a lista de usuários cadastrados na plataforma.</p>
                </div>

                <div class="px-6 py-2 text-gray-900">
                    <div class="bg-gray-200 p-1 rounded-lg border border-gray-300 shadow-lg mb-4">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-700">
                                <thead class="text-xl text-gray-700 uppercase bg-gray-100">
                                    <tr class="hover:bg-gray-100">
                                        <th class="text-center">Nível</th>
                                        <th class="p-2">Nome</th>
                                        <th>E-mail</th>
                                        <th>Telefone</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="odd:bg-white even:bg-gray-100 border-b text-base font-medium">
                                            <td class="text-center">
                                                @if ($user->level === 'admin')
                                                    <div title="Gerenciador" class="grid justify-items-center p-1">
                                                        <div>
                                                            <img src="{{ asset('images/admin-index.png') }}" alt="Logo" width="35">
                                                        </div>
                                                    </div>
                                                @else
                                                    <div title="Usuário" class="grid justify-items-center p-1">
                                                        <div>
                                                            <img src="{{ asset('images/user-index.png') }}" alt="Logo" width="35">
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="px-2">{{ $user->name . ' ' . $user->lastName }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->telefone }}</td>
                                            <td class="text-center p-4 space-x-2">
                                                <a title="Editar perfil" class="bg-white text-blue-600 py-2 px-3 rounded border border-blue-600 hover:bg-blue-600 hover:text-white" href="{{ route('edit.profile', $user->id) }}">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </a>
                                                <a href="#" title="Excluir usuario" class="excluir-usuario bg-white text-red-600 py-2 px-4 rounded border border-red-600 hover:bg-red-600 hover:text-white" data-usuario-id="{{ $user->id }}">
                                                    <i class="fa-regular fa-trash-can" title="Excluir"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="rounded mb-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.modals.modal-excluir-usuario')
    <script src="{{ asset('js/modal-excluir-usuario.js') }}"></script>
</x-app-layout>
