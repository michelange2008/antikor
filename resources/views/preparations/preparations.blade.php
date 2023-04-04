<x-app-layout>

    <x-titre :texte="'liste_preps'" :icone="'preps.svg'"></x-titre>

    @livewire('preparations-liste', ['liste' => $preparations])
    {{-- <livewire:preparations-liste :collection="$preparations"/> --}}

</x-app-layout>