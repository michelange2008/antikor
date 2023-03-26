<x-app-layout>

    <div class="mx-2 sm:mx-6 lg:mx-12 xl:mx-20 2xl:mx-36">
    
        <x-titre :titre="$titre->titre" :icone="$titre->icone" ></x-titre>

        <x-liste-formations :formations="$formations"></x-liste-formations>

    </div>    

   
</x-app-layout>