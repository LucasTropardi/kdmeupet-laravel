<nav x-data="{ open: false }" class="bg-gray-100 border-b border-gray-100 fixed-nav">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" wire:navigate title="Dashboard">
                        <img src="{{ asset('images/navbar-logo-black.png') }}" alt="Logo" width="130">
                    </a>
                </div>

                <!-- Navigation Links -->
                <!-- Dashboard do usuário -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('animal.index')" :active="request()->routeIs('animal.index')">
                        {{ __('Animais') }}
                    </x-nav-link>
                </div>

                <!-- Achados -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('logado.achados')" :active="request()->routeIs('logado.achados')">
                        {{ __('Achados') }}
                    </x-nav-link>
                </div>

                <!-- Perdidos -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('logado.perdidos')" :active="request()->routeIs('logado.perdidos')">
                        {{ __('Perdidos') }}
                    </x-nav-link>
                </div>

                <!-- Parcerias -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('parceria.index')" :active="request()->routeIs('parceria.index')">
                        {{ __('Parceria') }}
                    </x-nav-link>
                </div>

                <!-- Adoções -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown >
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>
                                    <span class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-700 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
                                        Adoções
                                    </span>
                                </div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4 pt-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('adocao.index')" :active="request()->routeIs('adocao.gerenciador')">
                                <i class="fa-regular fa-star mr-2"></i> Meus cadastros
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('meus.interesses')" :active="request()->routeIs('meus.interesses')">
                                <i class="fa-regular fa-star mr-2"></i> Meus interesses
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('lista.adocoes')" :active="request()->routeIs('adocao.gerenciador')">
                                <i class="fa-regular fa-star mr-2"></i> Animais disponíveis
                            </x-dropdown-link>

                        </x-slot>
                    </x-dropdown>

                    @can('level')
                        <x-dropdown >
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div>
                                        <span class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-700 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
                                            Gerenciamento
                                        </span>
                                    </div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4 pt-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('user.index')" :active="request()->routeIs('users.index')">
                                    <i class="fa-solid fa-user-gear mr-2"></i> Usuários
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('cor.index')" :active="request()->routeIs('cor.index')">
                                    <i class="fa-solid fa-palette mr-2"></i> Cores
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('especie.index')" :active="request()->routeIs('especie.index')">
                                    <i class="fa-solid fa-otter mr-2"></i> Especies
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('raca.index')" :active="request()->routeIs('raca.index')">
                                    <i class="fa-solid fa-paw mr-2"></i> Raças
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('tamanho.index')" :active="request()->routeIs('tamanho.index')">
                                    <i class="fa-solid fa-up-right-and-down-left-from-center mr-2"></i> Tamanhos
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('situacao.index')" :active="request()->routeIs('situacao.index')">
                                    <i class="fa-regular fa-circle-question mr-2"></i> Situações
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('animal-gerenciador.index')" :active="request()->routeIs('animal-gerenciador.index')">
                                    <i class="fafa-solid fa-dog mr-2"></i> Animais
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('parceria.gerenciador')" :active="request()->routeIs('parceria.gerenciador')">
                                    <i class="fa-regular fa-handshake mr-2"></i> Parcerias
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('adocao.gerenciador')" :active="request()->routeIs('adocao.gerenciador')">
                                    <i class="fa-regular fa-star mr-2"></i> Adoções
                                </x-dropdown-link>

                            </x-slot>
                        </x-dropdown>
                    @endcan
                </div>
            </div>



            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            <i class="fa-solid fa-user-pen mr-2"></i> Perfil
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i class="fa-solid fa-right-from-bracket mr-3"></i> Sair
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

