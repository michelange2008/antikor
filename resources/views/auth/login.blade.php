<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <div class="container px-4 py-60 mx-auto my-6 md:w-1/2 xl:w-1/3">
        
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-forms.input-label for="email" :value="__('Email')" />
                <x-forms.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
                <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-forms.input-label for="password" :value="__('auth.password')" />

                <x-forms.text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />

                <x-forms.input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="text-indigo-600 rounded border-gray-300 shadow-sm dark:bg-gray-900 dark:border-gray-700 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('auth.Remember me') }}</span>
                </label>
            </div>

            <div class="flex justify-end items-center mt-4">
                @if (Route::has('password.request'))
                    <a class="mr-3 text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('password.request') }}">
                        {{ __('passwords.Forgot password') }}
                    </a>
                @endif

                <x-buttons.success-button class="m-3">
                    {{ __('auth.log_in') }}
                </x-success-button>
            </div>
        </form>
            <div class="flex justify-end items-center mr-1">
                <x-buttons.route-neutre-button :route="route('front.index')" fa="rotate-left" >Annuler</x-buttons.route-neutre-button>
            </div>
    </div>

</x-guest-layout>


