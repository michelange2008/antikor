<div>

    <x-titres.titre icone="modalites_light.svg">Paramètres de l'outil oligoéléments</x-titres.titre>

    <div class="flex md:flex-row flex-col gap-2 md:gap-4">

        <div class="flex flex-col w-full md:w-2/4 lg:w-1/3">


            <x-oligos.oligos-param-init :stades="$stades" :ateliers="$ateliers" />

        </div>


        <x-oligos.oligos-param-msi :msi="$msi" :ateliers="$ateliers" :stades="$stades" />


    </div>
    <x-oligos.oligos-param-tolerance :tolerance="$tolerance" />

    <x-oligos.oligos-param-besoins-toxicites :besoins="$besoins" :toxicites="$toxicites" :ateliers="$ateliers" :especes="$especes"
        :oligovitamines="$oligovitamines" />

    <x-oligos.oligos-param-liste-oligovit :oligovitamines="$oligovitamines" />

    <x-buttons.route-success-button :route="route('oligos.outil')" fa="calculator">Retour à l'outil</x-buttons.route-success-button>
</div>
