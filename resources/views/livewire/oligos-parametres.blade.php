<div>

    <x-titres.titre icone="modalites_light.svg">Paramètres de l'outil oligoéléments</x-titres.titre>

    <div class="flex flex-row gap-6">

        <div class="flex flex-col w-full sm:w-1/3 md:w-1/4">

            <x-oligos.oligos-param-tolerance :tolerance="$tolerance" />

            <x-oligos.oligos-param-init :stades="$stades" :ateliers="$ateliers" />

        </div>


            <x-oligos.oligos-param-msi :msi="$msi" :ateliers="$ateliers" :stades="$stades" />

    </div>


    <x-buttons.route-success-button :route="route('oligos.outil')" fa="calculator">Retour à l'outil</x-buttons.route-success-button>
</div>
