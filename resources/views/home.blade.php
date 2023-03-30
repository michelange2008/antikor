<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('commun.Dashboard') }}
        </h2>
        route: {{request()->routeIs('aroma')}}
    </x-slot>

</x-app-layout>
