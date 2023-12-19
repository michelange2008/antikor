<x-app-layout>

        <div class="my-2">
            <a href="{{ route('formations.create') }}">
                <x-buttons.generic-button :color="'amber'">+ Ajouter</x-buttons.generic-button>
            </a>

        </div>
    
        <x-titres.titre icone="formations_light.svg" >@lang('titres.liste_formations')</x-titre>

        <x-liste-formations :formations="$formations" :route="$route"></x-liste-formations>

</x-app-layout>