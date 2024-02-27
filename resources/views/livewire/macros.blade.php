<div>


    <x-titres.titre icone="mineraux_light.svg">Dois-je donner des minéraux à mes animaux ?</x-titres.titre>

    <div id="principal" class="">

        <div id="valeurs" class="flex flex-col gap-3 lg:flex-row">
            {{-- atelier / Poids --}}
            <div id="troupeau" class="border lg:w-1/2 border-brique-900">
                <div class="px-2 py-3 text-white bg-brique">
                    <h2 class="h2">Le troupeau</h2>
                </div>
                <div class="p-1">
                    <div id="atelier" class="my-3">
                        <h3 class="py-1 pl-2 bg-gray-300 text-vert-900 h3 lg:pl-0 lg:text-center">1 - Choisir le type de
                            troupeau</h3>

                        <div class="flex flex-row gap-8 my-1 lg:justify-center">
                            @foreach ($ateliers as $abbreviation => $atelier)
                                <div class="cursor-pointer" wire:click="choixAtelier('{{ $abbreviation }}')">
                                    @if ($abbreviation == $troupeau['atelier'])
                                        <img class="w-16 border-2 shadow-lg border-vert shadow-vert-900"
                                            src="{{ url('storage/img/icones/' . $atelier['icone']) }}" alt="">
                                    @else
                                        <img class="w-16 brightness-75"
                                            src="{{ url('storage/img/icones/' . $atelier['icone']) }}" alt="">
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="stade" class="mb-3">
                        <h3 class="py-1 pl-2 bg-gray-300 text-vert-900 h3 lg:pl-0 lg:text-center">2 - Choisir le stade
                            physiologique</h3>
                        <div class="flex flex-row gap-4 justify-center lg:mx-4 lg:justify-center lg:my-2">

                            @foreach ($stades as $st)
                                <div class="flex-auto" wire:click=" setStade('{{ $st }}') ">
                                    @include('components.param-oligo', [
                                        'abbreviation_courante' => $troupeau['stade'],
                                        'abbreviation' => $st,
                                        'parametre' => 'stade',
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
            </div>

            <div id="ration" class="flex flex-col border lg:w-1/2 border-brique">
                <div class="px-2 py-3 text-white bg-brique">
                    <h2 class="h2">La ration</h2>
                </div>
                <div class="p-1">
                    <livewire:rations></livewire:rations>

                </div>
            </div>

        </div>


        <div id="bilan" class="flex flex-col gap-3 my-3 lg:flex-row">
            <div id="besoins" class="grid grid-cols-2 lg:w-1/2 h2">
                <div class="col-span-2 px-2 py-2 bg-gray-400 border-b border-gray-500">
                    <h3 class="h3">Les besoins (grammes/jour d'élément <span class="underline">absorbable</span>)
                    </h3>
                </div>
                <div class="flex flex-col gap-1 justify-between items-center px-2 py-2 text-lg bg-blue-400 border-r border-gray-500">
                    <p>Phosphore</p>
                    <p>{{ $besoins['P'] }}</p>
                </div>
                <div class="flex flex-col gap-1 items-center px-2 py-2 text-lg bg-orange-400">
                    <p>Calcium</p>
                    <p>{{ $besoins['Ca'] }}</p>
                </div>
            </div>

            <div id="apports" class="grid grid-cols-2 lg:w-1/2 h2">
                <div class="col-span-2 px-2 py-2 bg-gray-400 border-b border-gray-500">
                    <h3 class="h3">Les apports (grammes/jour d'élément <span class="underline">absorbable</span>)
                    </h3>
                </div>
                <div class="flex flex-col gap-1 justify-between items-center px-2 py-2 text-lg bg-blue-400 border-r border-gray-500">
                    <p>Phosphore</p>
                    <p>{{ $apports['P'] }}</p>
                </div>
                <div class="flex flex-col gap-1 items-center px-2 py-2 text-lg bg-orange-400">
                    <p>Calcium</p>
                    <p>{{ $apports['Ca'] }}</p>
                </div>
            </div>
        </div>

        <div id="mineral">
            <div class="px-2 py-3 text-white bg-brique">
                <h2 class="h2">Quel minéral&nbsp;?</h2>
            </div>
        </div>

    </div>
</div>
