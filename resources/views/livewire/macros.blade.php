<div>
    <x-titres.titre icone="mineraux_light.svg">Dois-je donner des minéraux à mes animaux ?</x-titres.titre>

    <div id="principal" class="">

        <div id="valeurs" class="flex flex-col gap-3 lg:flex-row">

            {{-- atelier / Poids --}}
            <div id="troupeau" class="flex flex-col justify-between border lg:w-1/3 border-brique-900">
                <div class="px-2 py-3 text-white bg-brique-700">
                    <h2 class="h2">Le troupeau</h2>
                </div>
                <div class="p-1">
                    <div id="atelier" class="mt-1 mb-2">
                        <h3 class="py-1 pl-2 bg-gray-300 text-vert-900 h3 lg:pl-0 lg:text-center">1 - Choisir le type de
                            troupeau</h3>

                        <div class="flex flex-row gap-8 justify-center my-1">
                            @foreach ($ateliers as $abbreviation => $atelier)
                                <div class="cursor-pointer" wire:click="choixAtelier('{{ $abbreviation }}')">
                                    @if ($abbreviation == $troupeau['atelier'])
                                        <img class="w-16 border-2 shadow-lg border-vert-700 shadow-vert-900"
                                            src="{{ url('storage/img/icones/' . $atelier['icone']) }}" alt="">
                                    @else
                                        <img class="w-16 brightness-75"
                                            src="{{ url('storage/img/icones/' . $atelier['icone']) }}" alt="">
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="stade" class="mb-2">
                        <h3 class="py-1 pl-2 bg-gray-300 text-vert-900 h3 lg:pl-0 lg:text-center">2 - Choisir le stade
                            physiologique</h3>
                        <div class="flex flex-row gap-4 justify-center lg:mx-4 lg:justify-center lg:my-2">

                            @foreach ($stades as $st)
                                <div class="flex-auto" wire:click=" setStade('{{ $st }}') ">
                                    @include('components.param-troupeau', [
                                        'parametre_courant' => $troupeau['stade'],
                                        'parametre' => $st,
                                        'type_parametre' => 'stade',
                                        'nom' => $st,
                                    ])
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div id="parametres" class="my-3">
                        <h3 class="py-1 pl-2 bg-gray-300 text-vert-900 h3 lg:pl-0 lg:text-center">3 - Ajuster les
                            paramètres</h3>
                        <div class="flex flex-row gap-3 justify-around p-2 my-1 bg-gray-100 lg:my:2">
                            <x-forms.input-number-change id="poids" model="troupeau.parametres.poids"
                                name="Poids moyen des animaux (kg)" />
                            @if ($troupeau['stade'] == 'gestation')
                                <x-forms.input-number-change id="prolificite" model="troupeau.parametres.prolificite"
                                    step="0.1" name="Prolificité" />
                            @else
                                <x-forms.input-number-change id="production" model="troupeau.parametres.quantite"
                                    step="0.1" name="Production laitière quotidienne (litres/jour)" />
                            @endif
                        </div>
                    </div>
                </div>
                <div id="besoins" class="grid grid-cols-2 mx-1 mb-1 text-center h2">
                    <div class="col-span-2 px-2 py-2 bg-gray-400 border-b border-gray-500">
                        <h3 class="h3">Les besoins (g/j d'él<span class="text-sm align-top">t</span> <span class="underline">absorbable</span>)
                        </h3>
                    </div>
                    <div
                        class="flex flex-col gap-1 justify-between items-center px-2 py-2 text-lg bg-blue-400 border-r border-gray-500">
                        <p>Phosphore: {{ $besoins['P'] }}</p>
                    </div>
                    <div class="flex flex-col gap-1 items-center px-2 py-2 text-lg bg-orange-400">
                        <p>Calcium: {{ $besoins['Ca'] }}</p>
                    </div>
                </div>
    
            </div>

            <div id="ration" class="flex flex-col justify-between border lg:w-2/3 border-brique-900">
                <div class="px-2 py-3 text-white bg-brique-700">
                    <h2 class="h2">La ration</h2>
                </div>
                <div class="p-1">
                    <livewire:rations></livewire:rations>

                </div>
                <div id="apports" class="grid grid-cols-2 mx-1 mb-1 text-center h2">
                    <div class="col-span-2 px-2 py-2 bg-gray-400 border-b border-gray-500">
                        <h3 class="h3">Les apports (g/j d'él<span class="text-sm align-top">t</span> <span class="underline">absorbable</span>)
                        </h3>
                    </div>
                    <div
                        class="flex flex-col gap-1 justify-between items-center px-2 py-2 text-lg bg-blue-400 border-r border-gray-500">
                        <p>Phosphore: {{ $apports['P'] }}</p>
                    </div>
                    <div class="flex flex-col gap-1 items-center px-2 py-2 text-lg bg-orange-400">
                        <p>Calcium: {{ $apports['Ca'] }}</p>
                    </div>
                </div>
                </div>

        </div>
        
        <div id="correction" class="px-1 mt-2">
            @if ($bilanOk)
                <h2 class="h2 text-vert-900">{{ $bilan }}</h2>
            @else
                <h2 class="h2 text-brique-900">{{ $bilan }}</h2>
                <livewire-choix-mineral></livewire-choix-mineral>
            @endif
        </div>
    </div>
</div>
