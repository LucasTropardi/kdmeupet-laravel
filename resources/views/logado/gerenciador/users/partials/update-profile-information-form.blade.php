
<header>
    <h2 class="text-2xl font-medium text-gray-900">
        {{ __('Dados cadastrais') }}
    </h2>

    <p class="mt-4 text-xl text-gray-600">
        {{ __("Atualize as informações cadastrais do usuário.") }}
    </p>
</header>

<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ route('update.profile', $user) }}" class="mt-6 space-y-6">
    @csrf
    @method('PUT')

    <div class="mt-6 grid grid-cols-12 gap-4 content-center">
        <div class="col-span-6">
            <x-input-label class="text-left" for="name" :value="__('Nome*')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="col-span-6">
            <x-input-label class="text-left" for="lastName" :value="__('Sobrenome*')" />
            <x-text-input id="lastName" name="lastName" type="text" class="mt-1 block w-full" :value="old('lastName', $user->lastName)" required autocomplete="lastName" />
            <x-input-error class="mt-2" :messages="$errors->get('lastName')" />
        </div>

        <div class="col-span-6">
            <x-input-label class="text-left mb-1" for="level" :value="__('Nível de acesso*')" />
            <select name="level" id="level" class="w-full border-gray-500 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="user" {{ $user->level === 'user' ? 'selected' : '' }}>Usuário</option>
                <option value="admin" {{ $user->level === 'admin' ? 'selected' : '' }}>Gerenciador</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('telefone')" />
        </div>

        <div class="col-span-6">
            <x-input-label class="text-left" for="telefone" :value="__('Telefone*')" />
            <x-text-input id="telefone" name="telefone" type="text" class="mt-1 block w-full" :value="old('telefone', $user->telefone)" required autocomplete="telefone" />
            <x-input-error class="mt-2" :messages="$errors->get('telefone')" />
        </div>

        <div class="col-span-12">
            <x-input-label class="text-left" for="email" :value="__('E-mail*')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="col-span-12">
            <x-input-label class="text-left" for="endereco*" :value="__('Endereço')" />
            <x-text-input id="endereco" name="endereco" type="text" class="mt-1 block w-full" :value="old('endereco', $user->endereco)" required autocomplete="endereco" />
            <x-input-error class="mt-2" :messages="$errors->get('endereco')" />
        </div>

        <div class="col-span-12 flex items-center justify-end mt-6">
            <x-external-button route="user.index" class="uppercase text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Voltar</x-secondary-button>
            <x-primary-button class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                {{ __('Salvar') }}
            </x-primary-button>
        </div>
    </div>
</form>

