<x-guestin-layout>

    <x-titres.titre icone="formations_light.svg">@lang('titres.liste_formations')</x-titre>

    <x-liste-formations :formations="$formations" :route="$route"></x-liste-formations>

</x-guestin-layout>
