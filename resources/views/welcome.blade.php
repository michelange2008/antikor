<x-guest-layout>

    <div class="flex flex-col min-h-screen bg-neutral-500">

        <div class="relative bg-center bg-neutral-400 dark:bg-neutral-900">


            @if (Route::has('login'))
                <div class="flex top-0 justify-between items-center px-6 py-3 text-right">
                    <img class="w-32 dark:invert" src="{{ url('storage/img/logo.svg') }}" alt="Logo Antikor">
                    @auth
                        <a href="{{ route('home') }}"
                            class="font-semibold text-gray-600 hover:text-black dark:text-neutral-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Intranet</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-black dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Connexion</a>
                    @endauth
                  </div>
              @endif
            </div>

                        {{-- @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
        @endif --}}

        <div class="flex flex-row flex-wrap justify-center content-center p-1 pb-8 m-auto">
            @foreach ($datas as $data)
                <div class="m-5 text-gray-100 basis-1/4 hover:text-black">
                    <a class="flex flex-col items-center" href="{{ route($data->url) }}">
                        <img class="m-1 w-64 max-w-sm min-w-xs hover:shadow-xl"
                            src="{{ url('storage/img/' . $data->img) }}" alt="{{ $data->texte }}">
                        <p class="">{{ $data->texte }} </p>
                    </a>
                </div>
            @endforeach
        </div>

    </div>

</x-guest-layout>
