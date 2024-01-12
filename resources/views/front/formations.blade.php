<x-guestin-layout>

    <x-titres.titre icone="formations_light.svg">@lang('titres.liste_formations')</x-titre>

    <x-formations.liste-formations :formations="$formations" :route="$route" />

</x-guestin-layout>
