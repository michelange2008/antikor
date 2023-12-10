<div class="m-2">

    <x-titres.titre icone="{{ $formation->icone }}">{{ $formation->name }}</x-titre>

        <p class="my-2 text-base font-bold text-gray-600 sm:text-xl md:text-2xl xl:text-3xl">
            {{ $formation->subname }}
        </p>

</div>

<div class="hidden p-3 w-3/12 border md:block bg-neutral-100">

        <div class="flex">
            @foreach ($formation->especes as $espece)
                <img class="w-4/12 lg:w-3/12" src="{{ url('storage/img/icones/' . $espece->icone) }}" alt="{{ $espece->name }}"
                    title="{{ $espece->name }}">
            @endforeach
        </div>

        <div>
            <x-form-modalites :icone="'duree.svg'" :titre="'Durée'" :texte="$formation->duree->nom" multiple="0"></x-form-modalites>
            <x-form-modalites :icone="'public.svg'" :titre="'Public'" :texte="$formation->stagiaire->nom" multiple="0"></x-form-modalites>
            <x-form-modalites :icone="'intervenant.svg'" :titre="'Intervenant'" :texte="$formation->intervenant->nom" multiple="0"></x-form-modalites>
            <x-form-modalites :icone="'modalites.svg'" :titre="'Modalités'" :texte="$formation->modalites" multiple="1"></x-form-modalites>
        </div>

</div>
<div class="m-2 sm:mx-6 lg:mx-12 xl:mx-20 2xl:mx-36">


</div>
