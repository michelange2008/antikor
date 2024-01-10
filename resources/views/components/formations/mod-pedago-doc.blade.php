<div id="{{ $table }}">

    <x-formations.formation-liste-choix fa="fa-warehouse" nom="{{ $nom }}" table="{{ $table }}"
        :choix="$choix" :liste="$liste" nomListe="{{ $nomListe }}">
    </x-formations.formation-liste-choix>

</div>
