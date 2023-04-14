<x-app-layout>

    <div class="mx-2 sm:mx-6 lg:mx-12 xl:mx-20 2xl:mx-36">
    
        <x-titres.titre icone="formations_light.svg" >@lang('titres.liste_formations')</x-titre>

        <x-liste-formations :formations="$formations"></x-liste-formations>

    </div>    

   
</x-app-layout>