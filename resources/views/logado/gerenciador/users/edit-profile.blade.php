<x-app-layout>
    @section('title','Meu cadastro')
    @include('partials.bannertop')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-gray-300 shadow sm:rounded-lg p-1">
                <div class="p-4 sm:p-8 bg-white sm:rounded-lg">
                    @include('logado.gerenciador.users.partials.update-profile-information-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
