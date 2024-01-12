<div>

    <div class="my-2">
        <a href="{{ route('formations.create') }}">
            <x-buttons.generic-button :color="'amber'"><i class="fa-solid fa-square-plus"></i> Ajouter</x-buttons.generic-button>
        </a>

    </div>

    <x-titres.titre icone="formations_light.svg">@lang('titres.liste_formations')</x-titre>

    <x-formations.liste-formations :formations="$formations" route="formations.show" />

</div>
