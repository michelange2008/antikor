<div>

    <h1 class="h2 my-3">Besoins des animaux vs valeurs d'un complément en oligo-éléments</h1>

    <div class="flex flex-col gap-2 lg:gap-4 lg:flex-row justify-around">

        <div id="espece" class="lg:basis-1/2">
            <h3 class="h3 my-1 lg:text-center">Choisir le type de production</h3>
            <div class="flex flex-row gap-2 justify-start lg:justify-center">

                @include('components.param-oligo', [
                    'param' => $espece,
                    'val' => 'cp',
                    'parametre' => 'espece',
                    'valeur' => 'Chèvres',
                ])

                @include('components.param-oligo', [
                    'param' => $espece,
                    'val' => 'oa',
                    'parametre' => 'espece',
                    'valeur' => 'Brebis allaitantes',
                ])

                @include('components.param-oligo', [
                    'param' => $espece,
                    'val' => 'ol',
                    'parametre' => 'espece',
                    'valeur' => 'Brebis laitières',
                ])
            </div>
        </div>
        <div id="stade" class="lg:basis-1/2">
            <div id="stade_chevre">
                <h3 class="h3 my-1 lg:text-center">Choisir le stade physiologique</h3>
                <div class="flex flex-row justify-start lg:justify-center gap-2">

                    @include('components.param-oligo', [
                        'param' => $stade,
                        'val' => 'ge',
                        'parametre' => 'stade',
                        'valeur' => 'Gestation',
                    ])


                    @include('components.param-oligo', [
                        'param' => $stade,
                        'val' => 'la',
                        'parametre' => 'stade',
                        'valeur' => 'Lactation',
                    ])

                </div>
            </div>
        </div>
    </div>
    <div>

        <div id="quantite">
            <h3 class="h3 my-1 ">Quantité distribuée</h3>
            <input
            class="mt-1 inline-block w-16 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
            type="number" min="0" step="1" value=10 wire:model="quantite" wire:change.debounce = "majQtt">g/jour par animal
        </div>
        <div id="msi">
            <h3 class="h3 my-1 ">Ingestion</h3>
            <p>{{ $msi }} kg/MS par jour</p>
        </div>
    </div>

    <div id="mineral" class="my-3">

        <h2 class="h2">Composition du minéral</h2>
        <table class="w-full table-auto border-collapse border">
            <thead class="bg-gray-700 text-gray-100 p-2">
                <tr>
                    <td class="py-3 px-4 border-gray-200 border">
                        Eléments
                    </td>
                    <td class="py-3 px-2 border-gray-200 border text-center">
                        Besoins
                    </td>
                    <td class="py-3 px-2 border-gray-200 border text-center">
                        Composition du minéral
                    </td>
                    <td class="py-3 px-2 border-gray-200 border text-center">
                        Apports pour {{ $quantite }} g/j
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($listeOligos as $oligo => $oligoelement)
                    <tr>
                        <td class="py-3 px-4 border border-gray-800 ml-3">
                            {{ ucfirst($oligoelement) }}
                        </td>
                        <td class="py-3 border-b border-gray-800" style='text-align:center'>
                            {{ $besoins[$oligo] * $msi }}
                        </td>
                        <td class="py-3 px-2 border border-gray-800 text-center">
                            <input id="{{ $oligo }}" name="{{ $oligo }}" type="number" min="0"
                                step="0.1" wire:model="{{ $oligo }}" class="text-center"  style="appearance: textfield"
                                wire:change.debounce = "maj('{{ $oligo }}')">
                        </td>
                        <td class="py-3 px-2 border border-gray-800 text-center">
                            {{ round($mineral[$oligo] * $quantite / 1000, 2) }}
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
