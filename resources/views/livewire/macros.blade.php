<div>


    <x-titres.titre icone="mineraux_light.svg">Dois-je donner des minéraux à mes animaux ?</x-titres.titre>

    <div id="principal" class="flex flex-col gap-3">

        <div id="parametres" class="w-1/2">

            {{-- atelier / Poids --}}
            <div id="troupeau">
                <div class="px-2 py-3 text-white bg-brique">
                    <h2 class="h2">Le troupeau</h2>
                </div>
                <div class="my-3">
                    <h3 class="h3">Choisir le type de troupeau</h3>
                    <div class="flex flex-row gap-3">
                        @foreach ($ateliers as $abbreviation => $atelier)
                            <div class="cursor-pointer" wire:click="choixAtelier('{{ $abbreviation }}')">
                                @if ($abbreviation == $troupeau['atelier'])
                                    <img class="shadow-lg shadow-gray-800"
                                        src="{{ url('storage/img/icones/' . $atelier['icone']) }}" alt="">
                                @else
                                    <img class="font-bold brightness-75"
                                        src="{{ url('storage/img/icones/' . $atelier['icone']) }}" alt="">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="my-3">
                    <h3 class="h3">Choisir les paramètres</h3>
                    <div class="flex flex-col gap-3">
                        <x-forms.input-number-blur id="poids" model="troupeau.poids" name="Poids moyen (kg)" />
                        @if ($troupeau['production'] == 'lait')
                            <x-forms.input-number-blur id="poids" model="troupeau.quantite" step="0.1"
                                name="Production laitière quotidienne (litres/jour)" />
                        @endif
                    </div>
                </div>
                <div id="besoins" class="grid grid-cols-2 my-3 divide-x-2 divide-y-2 divide-white h2">
                    <div class="col-span-2 px-2 py-3 bg-gray-400">
                        <h2>Les besoins (grammes/jour)</h2>
                    </div>
                    <div class="flex flex-col gap-1 items-center px-2 py-3 bg-blue-400">
                        <p>Phosphore</p>
                        <p>{{ $besoins['p'] }}</p>
                    </div>
                    <div class="flex flex-col gap-1 items-center px-2 py-3 bg-orange-400">
                        <p>Calcium</p>
                        <p>{{ $besoins['ca'] }}</p>
                    </div>
                </div>
            </div>

            <div id="ration">
                <div class="px-2 py-3 text-white bg-brique">
                    <h2 class="h2">La ration</h2>
                </div>
            </div>

        </div>


        <div id="apports">

        </div>

    </div>
</div>
