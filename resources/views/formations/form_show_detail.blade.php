<div class="m-2">

    <x-titres.titre icone="{{ $formation->icone }}">{{ $formation->name }}</x-titre>

        <p class="my-2 text-base font-bold text-gray-600 sm:text-xl md:text-2xl xl:text-3xl">
            {{ $formation->subname }}
        </p>

</div>

<div class="hidden md:block">

    @include('formations.form_show_cartouche')
 
</div>

<div class="m-2 sm:mx-6 lg:mx-12 xl:mx-20 2xl:mx-36">


</div>
