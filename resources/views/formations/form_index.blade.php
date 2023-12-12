<x-app-layout>

    <div class="m-2">
        <div class="my-1">
            <a href="{{ route('formations.create') }}">
                <x-buttons.generic-button :color="'amber'">+ Ajouter</x-buttons.generic-button>
            </a>

        </div>
    
        <x-titres.titre icone="formations_light.svg" >@lang('titres.liste_formations')</x-titre>


        <x-liste-formations :formations="$formations" :route="$route"></x-liste-formations>

    </div>    



   
</x-app-layout>