<div>

    <h1 class="mt-3 h2">Que vaut votre complément minéral ?</h1>
    <a href="{{ route('oligos.avertissement')}}">
        <p class="mx-2 text-red-900">
            <i class="fa-solid fa-square-arrow-up-right"></i>
            Avertissement à lire avant d'utiliser l'outil ci-dessous
        </p>
    </a>
    <div class="flex flex-col mt-2 lg:flex-row lg:gap-5">

        <div class="flex flex-col gap-2 my-3 lg:flex-auto">

            <div id="atelier" class="mb-6">
                <h3 class="py-1 pl-2 text-teal-900 bg-gray-300 h3 lg:pl-0 lg:text-center">1 - Choisir le type de
                    production
                </h3>
                <div class="flex flex-row gap-2 justify-start lg:justify-center">

                    <div class="flex-auto">

                        @include('components.param-oligo', [
                            'param' => $atelier,
                            'val' => 'cp_lait',
                            'parametre' => 'atelier',
                            'valeur' => 'Chèvres laitières',
                        ])
                    </div>
                    <div class="flex-auto">

                        @include('components.param-oligo', [
                            'param' => $atelier,
                            'val' => 'ov_all',
                            'parametre' => 'atelier',
                            'valeur' => 'Brebis allaitantes',
                        ])
                    </div>
                    <div class="flex-auto">
                        @include('components.param-oligo', [
                            'param' => $atelier,
                            'val' => 'ov_lait',
                            'parametre' => 'atelier',
                            'valeur' => 'Brebis laitières',
                        ])
                    </div>
                </div>
            </div>
            <div id="stade" class="mb-6">
                <div id="stade_chevre">
                    <h3 class="py-1 pl-2 text-teal-900 bg-gray-300 h3 lg:pl-0 lg:text-center">2 - Choisir le stade
                        physiologique</h3>
                    <div class="flex flex-row gap-2 justify-start lg:justify-center">

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
                        <div id="msi"
                            class="flex flex-col flex-auto justify-center px-1 my-2 text-center bg-gray-200 md:px-2 lg:px-4">
                            <h3 class="mb-0 text-sm lg:h3 md:text-base">Ingestion</h3>
                            <p class="mb-0 text-sm font-bold md:text-base">{{ $msi }} kg/MS par jour</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="quantite">
                <h3 class="py-1 pl-2 text-teal-900 bg-gray-300 h3 lg:pl-0 lg:text-center">3 - Choisir la quantité
                    distribuée
                    <span class="inline md:hidden">(g/jour par animal)</span>
                </h3>
                <div class="py-1 my-2 text-center text-white bg-teal-800">
                    <input
                        class="inline-block w-32 text-center text-teal-900 bg-gray-100 rounded-md border-transparent md:text-lg lg:text-xl focus:border-gray-500 focus:bg-white focus:ring-0"
                        type="number" min="0" step="1" value=10 wire:model="quantite"
                        wire:change.debounce = "maj"><span class="hidden md:inline md:text-lg lg:text-xl"> g/jour par
                        animal</span>
                </div>
            </div>
            @role('antikor')
            <div class="hidden lg:block">
                <a href="{{ route('oligos.parametres')}}">
                    <x-buttons.success-button><i class="mr-1 fa-solid fa-gear"></i>Paramètres</x-buttons.success-button>
                </a>
            </div>
            @endrole
        
        </div>


        <div id="mineral" class="my-3 lg:flex-auto">
            <h2 class="py-1 pl-2 text-teal-900 bg-gray-300 h3 lg:pl-0 lg:text-center">4 - Saisir les valeurs du minéral
                (mg/kg
                ou ppm)</h2>
            <table class="my-3 w-full border border-collapse table-auto">
                <thead class="p-2 text-gray-100 bg-gray-700">
                    <tr>
                        <td class="px-4 py-3 border border-gray-200">
                            Eléments (besoins<span class="hidden md:inline"> en ppm</span>)
                        </td>
                        <td class="px-2 py-3 text-center border border-gray-200">
                            Minéral
                        </td>
                        <td class="px-2 py-3 text-center border border-gray-200">
                            Apports pour {{ $quantite }} g/j
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listeOligos as $oligo => $oligoelement)
                        <tr>
                            <td class="px-4 py-3 ml-3 border border-gray-800">
                                {{ ucfirst($oligoelement) }}
                                ({{ $besoins[$oligo] * $msi }})
                            </td>
                            <td class="px-2 py-3 text-center border border-gray-800">
                                <input id="{{ $oligo }}" name="{{ $oligo }}" type="number" min="0"
                                    step="1" wire:model="min.{{ $oligo }}" class="w-32 text-center"
                                    wire:change.debounce = "majMineral()">
                            </td>
                            <td class="py-3 px-2 border border-gray-800 text-center {{ $bilan[$oligo] }}">
                                @if ($bilan[$oligo] == 'toxicite')
                                    <i class="text-white fa-solid fa-skull"></i>
                                @endif
                                @if ($mineral[$oligo] == 0)
                                    -
                                @else
                                    {{ round(($mineral[$oligo] * $quantite) / 1000, 2) }}
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex flex-row gap-4 justify-around px-3 py-5 my-2 bg-gray-200 border-2">
                <div class="flex flex-row gap-1">
                    <div class="w-5 h-5 equilibre"></div>
                    Equilibre
                </div>
                <div class="flex flex-row gap-1">
                    <div class="w-5 h-5 carence"></div>
                    Carence
                </div>
                <div class="flex flex-row gap-1">
                    <div class="w-5 h-5 exces"></div>
                    Excès
                </div>
                <div class="flex flex-row gap-1">
                    <div class="w-5 h-5 toxicite"></div>
                    Toxicité
                </div>
            </div>
        </div>
    </div>
    @role('antikor')
    <div class="block lg:hidden">
        <a href="{{ route('oligos.parametres')}}">
            <x-buttons.success-button><i class="mr-1 fa-solid fa-gear"></i>Paramètres</x-buttons.success-button>
        </a>
    </div>
    @endrole
</div>
