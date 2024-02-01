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

    <div class="flex flex-row my-3 p-5 bg-gray-300 shadow shadow-gray-900">
        <div class="basis-1/3">
            <h2 class="h2">Liste de oligoéléments</h2>
            <table class="w-full my-3 p-4 ">
                <thead class="text-left">
                    <th class="border p-3">Abbréviation</th>
                    <th class="border p-3">Nom</th>
                </thead>
                <tbody>
                    @foreach ($oligovitamines as $oligo => $oligoelement)
                        <tr>
                            <td class="border p-3">
                                {{ $oligo }}
                            </td>
                            <td class="p-3 border">
                                {{ $oligoelement }}
                            </td>
                        </tr>
                    @endforeach
                    <form wire:submit="addOligo()">

                        <tr>
                            <td class="border p-3">
                                <input type="text" wire:model="nouvelOligo.abbreviation" placeholder="Abbréviation">
                            </td>
                            <td class="border p-3">
                                <input type="text" wire:model="nouvelOligo.nom" placeholder="Nom">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit">Plus</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </div>

    <x-buttons.route-success-button :route="route('oligos.outil')" fa="calculator">Retour à l'outil</x-buttons.route-success-button>
</div>
