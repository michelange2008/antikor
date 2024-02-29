<div id="{{ $parametre }}" class="mb-3" x-data="{ valeur: @entangle($parametre)}">

    <h3 class="py-1 pl-2 bg-gray-300 text-vert-900 h3 lg:pl-0 lg:text-center">
        {{ $titre }}
        <span class="inline md:hidden">({{ $unite }})</span>
    </h3>
    {{-- Modification de la couleur de fond en fonction de la valeur du champs input --}}
    @if ($valeur == '')
    <div class="bg-brique-700">
        <x-oligos.oligos-outil-qttmsi-saisie :parametre="$parametre" :unite="$unite" :step="$step" />
    </div>
    @elseif ($valeur == 0)
        <div class="bg-orange-700">
            <x-oligos.oligos-outil-qttmsi-saisie :parametre="$parametre" :unite="$unite" :step="$step" />
        </div>
    @else
        <div class="bg-vert-700">
            <x-oligos.oligos-outil-qttmsi-saisie :parametre="$parametre" :unite="$unite" :step="$step" />
        </div>
    @endif

</div>
