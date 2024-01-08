<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-2 sm:pt-0 bg-transparent">
        <div class="w-full sm:max-w-md px-6 py-4 border-2 border-gray-300 bg-white shadow-md overflow-hidden sm:rounded-lg" id="form-cadastrar">

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            @section('title','Login')
            {{-- <h3 class="font-semibold text-xl text-gray-800 leading-tight text-center mb-2 mt-2">Log In</h3> --}}
            <div class="grid justify-items-center mb-4">
                <div>
                    <img src="{{ asset('images/user-login.png') }}" alt="Logo" width="110">
                </div>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label class=" text-left" for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label class=" text-left" for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4 text-left">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Lembrar me') }}</span>
                    </label>
                </div>

                <div class="flex items-end justify-end mt-4 mb-2">
                    @if (Route::has('password.request'))
                        <a class="mr-3 underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Esqueceu a senha?') }}
                        </a>
                    @endif

                    <x-primary-button class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        {{ __('Entrar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
