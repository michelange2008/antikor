{{-- -> form_show_user pour utilisateur non connecté ou form_show_admin pour administrateur connecté --}}
{{-- Fiche descriptive de chaque formation qui s'affiche quelque soit le type d'utilisateur avec un titre
un caretoluche à gauche en grand écran, un encart en bas en petit écran et une partie principale à droit 
ou en tête --}}
<div class="m-2">

    <x-titres.titre icone="{{ $formation->icone }}">{{ $formation->name }}</x-titre>

        <p class="my-2 text-base font-bold text-gray-600 sm:text-xl md:text-2xl xl:text-3xl">
            {{ $formation->subname }}
        </p>

</div>

<div class="grid md:grid-cols-3">

    <div class="hidden p-3 border md:block bg-neutral-100">
    
        @include('formations.form_show_cartouche')
     
    </div>
    <div class="md:col-span-2">

        <x-form-main :titre="'Contexte'" :texte="$formation->contexte" type="unique" ></x-form-main>
        <x-form-main :titre="'Objectifs pédagogiques'" :texte="$formation->objectifpedagos" type="multiple" ></x-form-main>
        <x-form-main :titre="'Programme détaillé'" :texte="$formation->programmeforms->groupBy('soustitre')" type="arbre" ></x-form-main>
        
    </div>

</div>

