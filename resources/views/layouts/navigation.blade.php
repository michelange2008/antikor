<nav x-data="{ open: false }" class="px-2 bg-white border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">
    <!-- Primary Navigation Menu -->

    <div class="flex justify-between h-16">
        <div class="flex">
            <div class="flex items-center shrink-0">
                <a href="#">
                    <img class="h-12" src="{{ url('storage/img/logo_fevec.png')}}" alt="">
                </a>
                <a href="{{ route('home') }}">
                    <img class="h-10" src="{{ url('storage/img/logo.png') }}" alt="">
                    {{-- <x-application-logo class="block w-auto h-9 text-gray-800 fill-current dark:text-gray-200" /> --}}
                </a>
            </div>
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <!-- Navigation Links -->
                @auth
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ ucfirst(__('menu.home')) }}
                    </x-nav-link>
                @else
                    <x-nav-link :href="route('front.index')" :active="request()->routeIs('front.index')">
                        {{ ucfirst(__('Accueil')) }}
                    </x-nav-link>
                @endauth

                @role('antikor')
                    <x-dropdown-perso id='aroma' :haut="'aromaliste'" :bas="[
                        ['name' => 'aromaliste', 'route' => 'home'],
                        ['name' => 'produits', 'route' => 'produits.index'],
                        ['name' => 'preps', 'route' => 'preparations.index'],
                        ['name' => 'aromaform', 'route' => 'home'],
                    ]"></x-dropdown-perso>
                    <x-nav-link :href="route('visites')" :active="request()->routeIs('visites')">
                        {{ ucfirst(__('menu.visites')) }}
                    </x-nav-link>
                @endrole

                <x-nav-link :href="route('formations.index')" :active="request()->routeIs('formations.index')">
                    {{ ucfirst(__('menu.formations')) }}
                </x-nav-link>

                <x-nav-link :href="route('oligos.outil')" :active="request()->routeIs('oligos.outil')">
                    {{ ucfirst(__('menu.oligos')) }}
                </x-nav-link>

                <x-nav-link :href="route('front.reproduction')" :active="request()->routeIs('front.reproduction')">
                    {{ ucfirst(__('menu.repro')) }}
                </x-nav-link>

                @haspermission('nuage')
                    <x-nav-link :href="config('links.nextcloud')">
                        Nuage
                    </x-nav-link>
                @endhaspermission
                @role('webmin')
                    <x-dropdown-perso id='admin' :haut="'admin'" :bas="[
                        ['name' => 'users', 'route' => 'users'],
                        ['name' => 'roles', 'route' => 'roles'],
                        ['name' => 'permissions', 'route' => 'permissions'],
                    ]"></x-dropdown-perso>
                @endrole

            </div>
        </div>

        <!-- Settings Dropdown -->
        <div class="hidden sm:flex sm:items-center sm:ml-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 bg-white rounded-md border border-transparent transition duration-150 ease-in-out dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                        <div>{{ Auth::user()->name ?? '' }}</div>

                        <div class="ml-1">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>
                @auth

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('profile.Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('auth.Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                @else
                    <x-slot name="content">
                        <x-dropdown-link :href="route('login')">
                            {{ __('Se connecter') }}
                        </x-dropdown-link>
                    </x-slot>
                @endauth
            </x-dropdown>
        </div>

        <!-- Hamburger -->
        <div class="flex items-center -mr-2 sm:hidden">
            <button @click="open = ! open"
                class="inline-flex justify-center items-center p-2 text-gray-400 rounded-md transition duration-150 ease-in-out dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400">
                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>


    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @auth
                <x-responsive-nav-link :class="'font-bold'" :href="route('home')" :active="request()->routeIs('home')">
                    {{ ucfirst(__('menu.home')) }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link :class="'font-bold'" :href="route('front.index')" :active="request()->routeIs('front.index')">
                    {{ ucfirst(__('Accueil')) }}
                </x-responsive-nav-link>
            @endauth

            @hasrole('antikor')
                <x-responsive-nav-link :class="'font-bold'">
                    {{ ucfirst(__('menu.aromaliste')) }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :class="'ml-2'" href="#" :active="request()->routeIs('visites')">
                    {{ ucfirst(__('menu.aromaliste')) }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :class="'ml-2'" :href="route('produits.index')" :active="request()->routeIs('produits.index')">
                    {{ ucfirst(__('menu.produits')) }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :class="'ml-2'" :href="route('preparations.index')" :active="request()->routeIs('preparations.index')">
                    {{ ucfirst(__('menu.preps')) }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :class="'ml-2'" :href="route('visites')" :active="request()->routeIs('visites')">
                    {{ ucfirst(__('menu.aromaform')) }}
                </x-responsive-nav-link>
            @endhasrole

            <x-responsive-nav-link :class="'font-bold'" :href="route('formations.index')" :active="request()->routeIs('formations.index')">
                {{ ucfirst(__('menu.formations')) }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :class="'font-bold'" :href="route('oligos.outil')" :active="request()->routeIs('oligos.outil')">
                {{ ucfirst(__('menu.oligos')) }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :class="'font-bold'" :href="route('front.reproduction')" :active="request()->routeIs('front.reproduction')">
                {{ ucfirst(__('menu.repro')) }}
            </x-responsive-nav-link>

            @haspermission('nuage')
                <x-responsive-nav-link :class="'font-bold'" :href="config('links.nextcloud')">
                    Nuage
                </x-responsive-nav-link>
            @endhaspermission
        </div>

        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="text-base font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name ?? '' }}
                    </div>
                    <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email ?? '' }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :class="'ml-2'" :href="route('profile.edit')">
                        {{ __('profile.Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :class="'ml-2'" :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @else
            <x-dropdown-link :href="route('login')">
                {{ __('Se connecter') }}
            </x-dropdown-link>
        @endauth
    </div>
</nav>
