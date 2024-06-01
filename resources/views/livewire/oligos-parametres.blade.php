<div>

    <x-titres.titre icone="modalites_light.svg">Paramètres de l'outil oligoéléments</x-titres.titre>

    <x-oligos.oligos-param-init :stades="$stades" :ateliers="$ateliers" :init="$init" />

    <x-oligos.oligos-param-msi :msi="$msi" :ateliers="$ateliers" />

    <x-oligos.oligos-param-besoins-toxicite :valeurs="$valeurs" :ateliers="$ateliers" :especes="$especes" :oligovitamines="$oligovitamines" />

    {{-- En cours de développement car utilité assez discutable --}}
    {{-- <x-oligos.oligos-param-liste-oligovit :oligovitamines="$oligovitamines" /> --}}

    <x-buttons.route-success-button :route="route('oligos.outil')" fa="calculator">Retour à l'outil</x-buttons.route-success-button>
</div>
