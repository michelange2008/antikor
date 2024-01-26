<div>

    <h1 class="h2 mt-3">Que vaut votre complément minéral ?</h1>

    <div class="flex flex-col lg:flex-row lg:gap-5">

        <div class="flex my-3 flex-col gap-2 lg:flex-auto">

            <div id="espece" class="">
                <h3 class="h3 pl-2 py-1 lg:pl-0 lg:text-center bg-gray-300 text-teal-900">Choisir le type de production
                </h3>
                <div class="flex flex-row gap-2 justify-start lg:justify-center">

                    <div class="flex-auto">

                        @include('components.param-oligo', [
                            'param' => $espece,
                            'val' => 'cp',
                            'parametre' => 'espece',
                            'valeur' => 'Chèvres laitières',
                        ])
                    </div>
                    <div class="flex-auto">

                        @include('components.param-oligo', [
                            'param' => $espece,
                            'val' => 'oa',
                            'parametre' => 'espece',
                            'valeur' => 'Brebis allaitantes',
                        ])
                    </div>
                    <div class="flex-auto">
                        @include('components.param-oligo', [
                            'param' => $espece,
                            'val' => 'ol',
                            'parametre' => 'espece',
                            'valeur' => 'Brebis laitières',
                        ])
                    </div>
                </div>
            </div>
            <div id="stade" class="">
                <div id="stade_chevre">
                    <h3 class="h3 pl-2 py-1 lg:pl-0 lg:text-center bg-gray-300 text-teal-900">Choisir le stade
                        physiologique</h3>
                    <div class="flex flex-row justify-start lg:justify-center gap-2">

                        <div class="flex-auto">
                            @include('components.param-oligo', [
                                'param' => $stade,
                                'val' => 'ge',
                                'parametre' => 'stade',
                                'valeur' => 'Gestation',
                            ])

                        </div>
                        <div class="flex-auto">
                            @include('components.param-oligo', [
                                'param' => $stade,
                                'val' => 'la',
                                'parametre' => 'stade',
                                'valeur' => 'Lactation',
                            ])
                        </div>
                        <div class="flex-auto text-center px-1 md:px-2 lg:px-4">
                            <div id="msi">
                                <h3 class="lg:h3 my-1 text-sm md:text-base ">Ingestion</h3>
                                <p class="text-sm md:text-base font-bold">{{ $msi }} kg/MS par jour</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="quantite">
                <h3 class="h3 pl-2 py-1 lg:pl-0 lg:text-center bg-gray-300 text-teal-900">Choisir la quantité distribuée
                    <span class="inline md:hidden">(g/jour par animal)</span>
                </h3>
                <div class="text-center bg-teal-800 text-white py-1">
                    <input
                        class=" text-teal-900 md:text-lg lg:text-xl inline-block w-32 text-center rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                        type="number" min="0" step="1" value=10 wire:model="quantite"
                        wire:change.debounce = "majQtt"><span class="hidden md:inline md:text-lg lg:text-xl"> g/jour par
                        animal</span>
                </div>
            </div>
        </div>


        <div id="mineral" class="my-3 lg:flex-auto">
            <h2 class="h3 pl-2 py-1 lg:pl-0 lg:text-center bg-gray-300 text-teal-900">Saisir les valeurs du minéral
                (mg/kg
                ou ppm)</h2>
            <table class="w-full my-3 table-auto border-collapse border">
                <thead class="bg-gray-700 text-gray-100 p-2">
                    <tr>
                        <td class="py-3 px-4 border-gray-200 border">
                            Eléments (besoins<span class="hidden md:inline"> en ppm</span>)
                        </td>
                        <td class="py-3 px-2 border-gray-200 border text-center">
                            Minéral
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
                                ({{ $besoins[$oligo] * $msi }})
                            </td>
                            <td class="py-3  px-2 border border-gray-800 text-center">
                                <input id="{{ $oligo }}" name="{{ $oligo }}" type="number" min="0"
                                    step="1" wire:model="{{ $oligo }}" class="text-center w-32"
                                    wire:change.debounce = "maj('{{ $oligo }}')">
                            </td>
                            <td
                                class="py-3 px-2 border border-gray-800 text-center
                            @if ($bilan[$oligo] == 'success') bg-teal-300
                            @elseif ($bilan[$oligo] == 'warning') bg-amber-300
                            @elseif ($bilan[$oligo] == 'death') bg-red-800 text-white
                            @elseif ($bilan[$oligo] == 'danger') bg-red-300 @endif
                        ">
                                {{ round(($mineral[$oligo] * $quantite) / 1000, 2) }}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
