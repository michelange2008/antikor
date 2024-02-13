{{-- -> form_show_user pour utilisateur non connecté ou form_show_admin pour administrateur connecté --}}
{{-- Fiche descriptive de chaque formation qui s'affiche quelque soit le type d'utilisateur avec un titre
un caretoluche à gauche en grand écran, un encart en bas en petit écran et une partie principale à droit 
ou en tête --}}
<x-titres.titre icone="{{ $formation->icone }}">{{ $formation->name }}
    @if ($formation->subname != null)
        ({{ mb_convert_case($formation->subname, MB_CASE_LOWER_SIMPLE) }})
    @endif
    </x-titre>

    <p class="my-2 text-base font-bold text-gray-600 sm:text-xl md:text-2xl xl:text-3xl">
    </p>


    <div class="grid mt-8 grid-col-1 md:grid-cols-3">

        <div class="mb-2 border md:p-3 bg-neutral-100">

            <x-formations.formation-show-cartouche :formation="$formation" />

        </div>

        <div class="md:col-span-2">

            <x-formations.formation-bloc :titre="'Contexte'" :texte="$formation->contexte" type="unique" />
            <x-formations.formation-bloc :titre="'Objectifs pédagogiques'" :texte="$formation->objectifpedagos" type="multiple" />
            <x-formations.formation-bloc :titre="'Programme détaillé'" :texte="$programme" type="arbre" />
        </div>

    </div>
