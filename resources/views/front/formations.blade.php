<x-guestin-layout>

<div class="mx-2 sm:mx-8 lg:mx-16 xl:mx-24 2xl:mx-40">

    <x-titre :texte="$titre->texte" :icone="$titre->icone" ></x-titre>
    
    <x-liste-formations :formations="$formations" ></x-liste-formations>
    
</div>

</x-guestin-layout>