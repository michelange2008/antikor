<div x-data="{ infosBesoins: false }">
    <div x-show="infosBesoins" x-cloak>
        <x-oligos.infos-besoins :oligovitamines="$oligovitamines" :valeurs="$valeurs"></x-oligo.infos-besoins>
    </div>
    <x-titres.titre icone="mineraux_light.svg">Oligo-éléments et vitamines: apports et besoins</x-titres.titre>
    <a href="{{ route('oligos.avertissement') }}">
        <p class="mx-1 text-red-900">
            <i class="fa-solid fa-square-arrow-up-right"></i>
            Avertissement à lire avant d'utiliser l'outil ci-dessous
        </p>
    </a>
    <div class="lg:grid lg:grid-cols-8 lg:gap-5">

        <div class="flex flex-col gap-2 justify-between my-3 lg:col-span-4 xl:col-span-3">

            <div id="espece" class="mb-3">
                <h3 class="py-1 pl-2 bg-gray-300 text-vert-900 h3 lg:pl-0 lg:text-center">1 - Choisir l'espèce
                </h3>
                <div class="flex flex-row gap-2 justify-start lg:justify-center lg:my-2">

                    @foreach ($especes as $esp)
                        <div class="flex-auto" wire:click = "setEspece( '{{ $esp }}' )">

                            @include('components.param-oligo', [
                                'element_courant' => $espece,
                                'element' => $esp,
                                'parametre' => 'espece',
                            ])
                        </div>
                    @endforeach

                </div>
            </div>

            <div id="atelier" class="mb-3">
                <h3 class="py-1 pl-2 bg-gray-300 text-vert-900 h3 lg:pl-0 lg:text-center">2 - Choisir le type d'atelier
                </h3>
                <div class="flex flex-row gap-2 justify-start lg:justify-center lg:my-2">

                    @foreach ($ateliers[$espece] as $at)
                        <div class="flex-auto">

                            @if ($ateliersActifs[$at])
                                <div wire:click = "setAtelier( '{{ $at }}' )">
                                    @include('components.param-oligo', [
                                        'element_courant' => $atelier,
                                        'element' => $at,
                                        'parametre' => 'atelier',
                                    ])
                                </div>
                            @else
                                <div class="px-2 py-2 my-2 text-sm text-center text-gray-400 bg-gray-200 cursor-not-allowed md:py-3 md:px-4 md:text-base"
                                    title="En cours d'implémentation">
                                    <span>{{ ucfirst($at) }}</span>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <div id="stade" class="mb-3">
                <h3 class="py-1 pl-2 bg-gray-300 text-vert-900 h3 lg:pl-0 lg:text-center">3 - Choisir le stade
                    physiologique</h3>
                <div class="flex flex-row gap-2 justify-start lg:justify-center lg:my-2">

                    @foreach ($stades as $st)
                        @if ($stadesActif[$st])
                            <div class="flex-auto" wire:click=" setStade('{{ $st }}') ">
                                @include('components.param-oligo', [
                                    'element_courant' => $stade,
                                    'element' => $st,
                                    'parametre' => 'stade',
                                    'nom' => $st,
                                ])
                            </div>
                        @else
                            <div class="px-2 py-2 my-2 text-sm text-center text-gray-400 bg-gray-200 cursor-not-allowed basis-1/3 md:py-3 md:px-4 md:text-base"
                                title="Non applicable">
                                <span>{{ ucfirst($st) }}</span>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>

            <x-oligos.oligos-outil-qttmsi titre="4 - Modifier éventuellement la matière sèche ingérée"
                unite="kg/MSI/jour par animal" step="0.1" :valeur="$msi" parametre="msi" />

            <x-oligos.oligos-outil-qttmsi titre="5 - Indiquer la quantité de minéral distribuée"
                unite="g/jour par animal" step="1" :valeur="$quantite" parametre="quantite" />

            <div id="choix" class="px-4 py-3 bg-gray-200">
                <h2 class="h2">
                    @if ($atelier == 'aucun')
                        <span class="italic font-light">Choisir un atelier ...</span>
                    @else
                        {{ ucfirst(__( 'oligos.' . $atelier)) }}

                        @if ($stade != 'aucun')
                            en {{ $stade }}
                        @endif
                    @endif
                </h2>
            </div>

            @role('antikor')
                <div class="hidden lg:block">
                    <x-buttons.route-success-button :route="route('oligos.parametres')"
                        fa="gear">Paramètres</x-buttons.route-success-button>
                </div>
            @endrole

        </div>


        <div id="mineral" class="my-3 lg:col-span-4 xl:col-span-5">
            <h2 class="py-1 pl-2 bg-gray-300 text-vert-900 h3 lg:pl-0 lg:text-center">
                6 - Saisir les valeurs du minéral
            </h2>
            <table class="my-3 w-full text-xs border border-collapse table-auto sm:text-base">
                <thead class="p-2 text-gray-100 bg-gray-800">
                    <tr>
                        <td class="px-1 py-3 border border-gray-800 sm:px-4 border-r-gray-200">
                            <span class="hidden sm:inline">Oligo-éléments et vitamines (besoins supplémentaires)</span>
                            <span class="inline sm:hidden">Besoins</span>
                            <span class="ml-1 text-lg cursor-pointer" title="Plus d'informations"
                                x-on:click="infosBesoins = true"><i class="fa fa-circle-info"></i></span>
                        </td>
                        <td class="px-1 py-3 text-center border border-x-gray-200 border-y-gray-800">
                            Minéral (mg/kg&nbspou&nbspppm)
                        </td>
                        <td class="px-1 py-3 text-center border border-gray-800 sm:px-2 border-l-200">
                            Apports pour {{ $quantite }}&nbspg/j
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($oligovitamines as $type => $oligoOuVitamines)
                        @foreach ($oligoOuVitamines as $element)
                            <tr class="font-bold">
                                @if ($type == 'vitamines')
                                    <td class="px-1 py-3 ml-1 border border-gray-800 text-brique-900 sm:px-2">
                                        {{ ucfirst(__('oligos.'.$element)) }}
                                        <br class="block sm:hidden" />
                                        <span class="text-sm sm:text-base text-nowrap">({{ $besoinsTotaux[$element] }}&nbspUI/kg)</span>
                                    </td>
                                @else
                                    <td class="px-1 py-3 ml-1 border border-gray-800 sm:px-2 text-vert-900">
                                        <a target="_blank" href="{{ url('storage/pdf/'. $element.'.pdf')}}" title="Voir la fiche">
                                            <i class="text-gray-400 hover:text-red-900 fa-solid fa-file-lines"></i>
                                        </a>
                                        {{ ucfirst(__('oligos.'.$element)) }}
                                        <br class="block sm:hidden" />
                                        <span class="text-sm sm:text-base text-nowrap">({{ $besoinsTotaux[$element] }}&nbspmg/kg)</span>
                                    </td>
                                @endif
                                <td class="px-1 py-3 text-center border border-gray-800 sm:px-2">
                                    <input id="{{ $element }}" name="{{ $element }}" type="number"
                                        min="0" step="1" class="w-32 text-center"
                                        wire:model="mineral.{{ $element }}" wire:change.debounce = "maj">
                                </td>
                                <td class="px-1 py-3 sm:px-2 border border-gray-800 text-center {{ $bilan[$element] }}">
                                    @if ($bilan[$element] == 'toxicite')
                                        <i class="text-white fa-solid fa-skull"></i>
                                    @endif
                                    {{ $apports_mineral[$element] }}
                                </td>

                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
            <div class="flex flex-row gap-4 justify-around px-2 py-4 mt-2 bg-gray-200">
                <div class="flex flex-row gap-1">
                    <div class="w-5 h-5 equilibre"></div>
                    Equilibre
                </div>
                <div class="flex flex-row gap-1">
                    <div class="w-5 h-5 carence"></div>
                    Carence
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
            <x-buttons.route-success-button :route="route('oligos.parametres')" fa="gear">
                Paramètres
            </x-buttons.route-success-button>
        </div>
    @endrole

</div>
